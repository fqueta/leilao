<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\PostController;
use App\Models\lance;
use App\Models\Post;
use App\Qlib\Qlib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use stdClass;

class LanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $routa;
    public $label;
    public $view;
    public $tab;
    public function __construct()
    {
        $this->middleware('auth');
        $this->routa = 'lances';
        $this->label = 'Lance';
        $this->view = 'padrao';
        $this->tab = $this->routa;
        //$this->listarEvent();
    }
    public function queryLances($get=false)
    {
        $ret = false;
        $get = isset($_GET) ? $_GET:[];
        $ano = date('Y');
        $mes = date('m');
        //$todasFamilias = Familia::where('excluido','=','n')->where('deletado','=','n');
        $type = isset($get['type']) ? $get['type'] : 'lance';
        $config = [
            'limit'=>isset($get['limit']) ? $get['limit']: 50,
            'order'=>isset($get['order']) ? $get['order']: 'desc',
            'type'=>$type,
            'acao_massa'=>[['link'=>'javascript:lib_abrirListaOcupantes();','event'=>false,'icon'=>'fa fa-list','label'=>__('Lista de ocupantes')]],
        ];

        if(isset($get['term'])){
            //Autocomplete
            if(isset($get['leilao_id']) && !empty($get['leilao_id']) && isset($get['author']) && !empty($get['author'])){
               $sql = "SELECT * FROM lances WHERE (nome LIKE '%".$get['term']."%') AND leilao_id=".$get['leilao_id']." AND author=".$get['author']." AND ".Qlib::compleDelete();
            }elseif(isset($get['leilao_id']) && !empty($get['leilao_id'])){
                $sql = "SELECT * FROM lances WHERE (nome LIKE '%".$get['term']."%') AND leilao_id=".$get['leilao_id']." AND ".Qlib::compleDelete();
            // }else{
            //     $sql = "SELECT l.*,q.nome author_valor FROM lances as l
            //     JOIN authors as q ON q.id=l.author
            //     WHERE (l.nome LIKE '%".$get['term']."%' OR q.nome LIKE '%".$get['term']."%' ) AND ".Qlib::compleDelete('l');
            }
            // $lance = DB::select($sql);
            // if(isset($get['familias'])&&$get['familias']=='s' && is_array($lance)){
            //     foreach ($lance as $k => $v) {
            //         $sqlF = "SELECT f.*,b.nome,b.cpf FROM familias As f
            //         JOIN beneficiarios As b ON b.id=f.id_beneficiario
            //         WHERE f.lanceamento LIKE '%\"".$v->id."\"%' AND ".Qlib::compleDelete('f')." AND ".Qlib::compleDelete('b');
            //         $lance[$k]->familias = DB::select($sqlF);
            //     }
            // }
            // $ret['lance'] = $lance;
            // return $ret;
        }else{
            $lance =  lance::where('excluido','=','n')->where('deletado','=','n')->orderBy('id',$config['order']);
        }

        //$lance =  DB::table('lances')->where('excluido','=','n')->where('deletado','=','n')->orderBy('id',$config['order']);
        $lance_totais = new stdClass;
        $campos = $this->campos();
        $tituloTabela = 'Lista de lances';
        $arr_titulo = false;
        // Adiciona um filtro para que fora do backend os usuarios so podem ver os seus lances.
        if(Qlib::is_backend()){

        }else{
            $lance->where('author','LIKE', Auth::id());
        }
        if(isset($get['filter'])){
                $titulo_tab = false;
                $i = 0;
                foreach ($get['filter'] as $key => $value) {
                    if(!empty($value)){
                        if($key=='id' || $key=='author'){
                            $lance->where($key,'LIKE', $value);
                            $titulo_tab .= 'Todos com *'. $campos[$key]['label'] .'% = '.$value.'& ';
                            $arr_titulo[$campos[$key]['label']] = $value;
                        }else{
                            if(is_array($value)){
                                // dd($value);
                            }else{
                                $lance->where($key,'LIKE','%'. $value. '%');
                                if($campos[$key]['type']=='select'){
                                    $value = $campos[$key]['arr_opc'][$value];
                                }
                                $arr_titulo[$campos[$key]['label']] = $value;
                                $titulo_tab .= 'Todos com *'. $campos[$key]['label'] .'% = '.$value.'& ';
                            }
                        }
                        $i++;
                    }
                }
                if($titulo_tab){
                    $tituloTabela = 'Lista de: &'.$titulo_tab;
                                //$arr_titulo = explode('&',$tituloTabela);
                }
                $fm = $lance;
                if($config['limit']=='todos'){
                    $lance = $lance->get();
                }else{
                    $lance = $lance->paginate($config['limit']);
                }
        }else{
            $fm = $lance;
            if($config['limit']=='todos'){
                $lance = $lance->get();
            }else{
                $lance = $lance->paginate($config['limit']);
            }
        }
        $lance_totais->todos = $fm->count();
        $lance_totais->esteMes = $fm->whereYear('created_at', '=', $ano)->whereMonth('created_at','=',$mes)->get()->count();
        $lance_totais->ativos = $fm->where('ativo','=','s')->get()->count();
        $lance_totais->inativos = $fm->where('ativo','=','n')->get()->count();

        $ret['lance'] = $lance;
        $ret['lance_totais'] = $lance_totais;
        $ret['arr_titulo'] = $arr_titulo;
        $ret['campos'] = $campos;
        $ret['config'] = $config;
        $ret['tituloTabela'] = $tituloTabela;
        $ret['config']['resumo'] = [
            'todos_registro'=>['label'=>'Todos cadastros','value'=>$lance_totais->todos,'icon'=>'fas fa-calendar'],
            'todos_mes'=>['label'=>'Cadastros recentes','value'=>$lance_totais->esteMes,'icon'=>'fas fa-calendar-times'],
            'todos_ativos'=>['label'=>'Cadastros ativos','value'=>$lance_totais->ativos,'icon'=>'fas fa-check'],
            'todos_inativos'=>['label'=>'Cadastros inativos','value'=>$lance_totais->inativos,'icon'=>'fas fa-archive'],
        ];
        return $ret;
    }
    public function index($config=false)
    {
        $ajax = isset($_GET['ajax'])?$_GET['ajax']:'n';
        $view = isset($_GET['view'])?$_GET['view']:$this->view;
        $this->authorize('ler', $this->routa);
        $title = 'lances Cadastrados';
        $titulo = $title;
        $queryLance = $this->querylance($_GET);
        $ret = [
            'dados'=>$queryLance['lote'],
            'title'=>$title,
            'titulo'=>$titulo,
            'campos_tabela'=>$queryLance['campos'],
            'lote_totais'=>$queryLance['lote_totais'],
            'titulo_tabela'=>$queryLance['tituloTabela'],
            'arr_titulo'=>$queryLance['arr_titulo'],
            'config'=>$queryLance['config'],
            'routa'=>$this->routa,
            'view'=>$view,
            'i'=>0,
        ];
        if($ajax=='s'){
            return response()->json($ret);
        }else{
            return view($view.'.index',$ret);
        }
    }
    /**
     * Metodo para listar lances
     * @param integer || array $param
     * @return array $ret
     */
    public function get_lances($param=false){
        $ret = false;
        if(is_array($param)){
            $author = Auth::id();
            $ret = DB::table('lances')->
            select('users.nome','lances.*')->
            join('users','users.id','=','lances.author')->
            where('lances.author',$author)->
            where('lances.excluido','n')->
            where('lances.ativo','s')->
            orderBy('lances.created_at','Asc')->
            get()->toArray();
        }elseif(is_integer($param)){
            $leilao_id = $param;
            $ret = DB::table('lances')->
            select('users.*','lances.*')->
            join('users','users.id','=','lances.author')->
            where('lances.leilao_id',$leilao_id)->
            where('lances.type','lance')->
            where('lances.excluido','n')->
            where('lances.ativo','s')->
            orderBy('lances.created_at','Asc')->
            get()->toArray();
            if(is_array($ret)){
                foreach ($ret as $kl => $vlo) {
                    // $dt = explode('T',$vl['created_at']);
                    $dt = explode(' ',$vlo->created_at);
                    $ret[$kl]->data = Qlib::dataExibe(@$dt[0]);
                    if(isset($dt[1])){
                        $ret[$kl]->data .= ' às '.$dt[1];
                    }
                }
            }
        }
        return $ret;
    }
    /**
     * Metodo para gerar campos para edição de lances
     */
    public function campos($id=false,$data=false){
        $user = Auth::user();
        if($id && !$data){
            $data = Post::Find($id);
        }

        $post = new PostController();
        // $arr_opc_ocupantes = Qlib::qoption('opc_declara_posse','array');
        // $bairro = new BairroController($user);

        return [
            'id'=>['label'=>'Id','active'=>true,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'token'=>['label'=>'token','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'created_at'=>['label'=>'Data e hora','active'=>true,'type'=>'date','exibe_busca'=>'d-block','event'=>'','tam'=>'12','value'=>@$data['bairro']],
            'leilao_id'=>[
                'label'=>'Leilão',
                'active'=>true,
                'type'=>'select',
                'arr_opc'=>Qlib::sql_array("SELECT ID,post_type FROM posts WHERE post_status='publish' AND post_type='leiloes_adm'",'post_type','ID'),'exibe_busca'=>'d-block',
                'event'=>'',
                //'event'=>'onchange=carregaMatricula($(this).val())',
                'tam'=>'12',
                // 'value'=>@$_GET['bairro'],
            ],
            'author'=>[
                'label'=>'Responsável',
                'active'=>true,
                'type'=>'select',
                'arr_opc'=>Qlib::sql_array("SELECT id,name FROM users WHERE ativo='s' AND id_permission>'1'",'name','id'),'exibe_busca'=>'d-block',
                'event'=>'required',
                'tam'=>'12',
                'exibe_busca'=>true,
                'option_select'=>true,
                'class'=>'select2',
            ],
            'valor_lance'=>['label'=>'Valor do lance','active'=>true,'placeholder'=>'','type'=>'moeda','exibe_busca'=>'d-block','event'=>'required','tam'=>'6','title'=>'Valor do reembolso'],
            'type'=>['label'=>'Type','active'=>true,'placeholder'=>'','type'=>'hidden','exibe_busca'=>'d-block','event'=>'required','tam'=>'6','title'=>''],
            'obs'=>['label'=>'Descrição','active'=>false,'type'=>'textarea','exibe_busca'=>'d-block','event'=>'','tam'=>'12','class_div'=>'','class'=>'editor-padrao summernote','placeholder'=>__('Escreva seu conteúdo aqui..')],

        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function gravar_lance($d=false,$autolance=true){
        $ret['exec'] = false;
        if($d){
            $d['token'] = isset($d['token']) ? $d['token'] :uniqid();
            // Qlib::lib_print($d);
            $s = lance::create($d);
            if($s->id && isset($d['leilao_id']) && ($leilao_id = $d['leilao_id'])){
                $ret['exec'] = true;
                $ret['id'] = $s->id;
                $marca_lance_superado = $this->marca_lance_superado($leilao_id);
                //ativa os lances automaticos
                if($autolance)
                    $ret['auto_lance'] = $this->lance_automatico($leilao_id);

            }
        }
        return $ret;
    }
    public function store(Request $request)
    {
        $d = $request->all();
        $origem = isset($d['origem']) ? $d['origem'] : false;
        $leilao_id = isset($d['leilao_id']) ? $d['leilao_id'] : false;
        $type = isset($d['type']) ? $d['type'] : 'lance';  // serve para marcar os tipos de lances existem 2 tipos de lances type=lance ou type=reserva
        $d['token'] = isset($d['token']) ? $d['token'] : uniqid();
        $d_user = Auth::user();
        $d['author'] = $d_user->id;
        $d['type'] = $type;
        $ret['exec'] = false;
        $ret['code_mens'] = false;
        $ret['mens'] = Qlib::formatMensagemInfo('Erro ao gravar o lance, por favor entre em contato com o nosso suporte','danger');
        if(!isset($d['valor_lance']) || !isset($d['author']) || !isset($d['leilao_id'])){
            return $ret;
        }
        if($d['valor_lance']<0){
            $ret['mens'] = Qlib::formatMensagemInfo('Erro o valor do lance é nulo, por favor selecione outro','danger');
            return $ret;
        }
        //Verifica se usuario tem permissão para dar o lance
        $al = $this->autoriza_lance($leilao_id);
        if(!$al['exec']){
            $ret['mens'] = Qlib::formatMensagemInfo(@$al['mens'],'danger');
            return $ret;
        }
        //verificar se o lance é igual a algum lance ja dado
        $verifica = Lance::where('valor_lance','=',$d['valor_lance'])
                    ->where('leilao_id','=',$d['leilao_id'])
                    ->where('type','=',$d['type'])
                    ->count();
        if($verifica>0){
            $ret['code_mens'] = 'enc';
            $ret['mens'] = Qlib::formatMensagemInfo('<b>Erro</b> Valor de lance, <b>'.Qlib::valor_moeda($d['valor_lance']).'</b> já foi encontrado tente novamente com outro valor','danger');
            return $ret;
        }

        if($origem=='front'){
            //Verificar
            $v_reserva = $this->salvar_reserva($d,$d['leilao_id']);
            $ret['v_reserva'] = $v_reserva;
            if($v_reserva['exec'] && isset($v_reserva['proximo_lance']) && $v_reserva['proximo_lance']>0){
                //Nesse caso salvou a reserva e resgatamos o proximo lance
                $d['valor_lance'] = $v_reserva['proximo_lance'];
            }
            //Antes de gravar novo lance verifica se o ultimo lance foi do que está dando lance atualmente
            $d_ultimo_lance = $this->ultimo_lance($leilao_id,true);//dados do ultimo lance
            if(isset($d_ultimo_lance['author']) && ($dono_ultimo_l = $d_ultimo_lance['author'])){
                if($dono_ultimo_l==$d['author']){
                    $ret['code_mens'] = 'dulance';
                    $ret['mens'] = Qlib::formatMensagemInfo('<b>Erro</b> O seu lance precisa ser vencido antes de dar o próximo lance','danger');
                    return $ret;
                }
            }
            $ret = $this->gravar_lance($d);
            if($ret['exec']){
                $ret['idCad'] = @$ret['id'];
                $ret['mens'] = Qlib::formatMensagemInfo('Lance cadastrado com sucesso','success',70000);
            }
        }
        return $ret;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lance  $lance
     * @return \Illuminate\Http\Response
     */
    public function show(lance $lance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lance  $lance
     * @return \Illuminate\Http\Response
     */
    public function edit(lance $lance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lance  $lance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lance $lance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lance  $lance
     * @return \Illuminate\Http\Response
     */
    public function destroy(lance $lance)
    {
        //
    }
    /**
     * Metodo para marcar uma reseva como superada
     * @param integer $leilao_id,integer $id_ultimo_lance
     * @return integer $ret
     */

    public function penultimo_lance($leilao_id=false){
        $d = Lance::where('leilao_id',$leilao_id)->
            where('type','lance')->
            where('excluido','n')->
            orderBy('id', 'desc')->
            take(2)->
            get()->toArray();
        $ret = false;
        if(isset($d[1]['id'])){
            $ret = $d[1];
        }
        return $ret;
    }
        /**
     * Metodo para marcar uma reseva como superada
     * @param integer $leilao_id,integer $id_ultimo_lance
     * @return integer $ret
     */
    public function marca_lance_superado($leilao_id=false){
        $ret['exec'] = false;
        $d = $this->penultimo_lance($leilao_id);
        if(isset($d['id'])){
            $ds = [
                'superado'=>'s'
            ];
            $r = Lance::where('id',$d['id'])->update($ds);
            // $d = $this->penultimo_lance($leilao_id);
            if($r){
                $ret['exec'] = true;
                $ret['dados'] = $this->penultimo_lance($leilao_id);
                //Enviar notificação
                //$this->notifica_superado
            }
        }
        return $ret;
    }
    /**
     * Metodo para retornar o proximo ultimo lance dado
     * @param integer $leilao_id
     * @return integer $ret
     */
    public function ultimo_lance($leilao_id=false,$exibe_data=false){
        $ret = 0;
        $l = lance::where('leilao_id',$leilao_id)->where('type','lance')->where('excluido','n')->orderBy('id', 'desc')->first();
        if($l){
            if($exibe_data){
                $ret = $l;
            }else{
                $ret = $l['valor_lance'];
            }
        }
        return $ret;
    }
    /**
     * Metodo para retornar o proximo lance
     * @param integer $leilao_id
     * @return integer $ret
     */
    public function proximo_lance($leilao_id=false){
        $ret = 0;
        $lance_atual = $this->ultimo_lance($leilao_id);
        $dl = Post::Find($leilao_id);
        $campo_valor = 'valor_r';
        if(isset($dl['config']['incremento']) && ($inc = $dl['config']['incremento'])){
            if($lance_atual==0 && isset($dl['config'][$campo_valor])){
                $lance_atual = Qlib::precoBanco($dl['config'][$campo_valor]);
            }
            $inc = Qlib::precoBanco($inc);
            if($inc>0){
                $ret = $lance_atual+$inc;
            }
        }
        //$incremento =
        return $ret;
    }
    /**
     * Metodo para salver um lance de reserve
     * @param array $dadosForm, int $leilao_id
     * @return array $ret
     */
    public function salvar_reserva($dadosForm=false,$leilao_id=false){
        $ret['exec'] = false;
        $ret['proximo_lance'] = 0;
        if(isset($dadosForm['valor_lance']) && ($vl=$dadosForm['valor_lance']) && $leilao_id){
            $proximo_lance = $this->proximo_lance($leilao_id);
            if($vl>$proximo_lance){
                //nesse momento o sistema entede que precisa gravar o este lance tbm como reserva
                $ret['proximo_lance'] = $proximo_lance;
                $dadosForm['type'] = 'reserva';
                //verifica se ja tem uma reserva criada se sim ele atualiza com o valor
                $vr = lance::where('leilao_id',$leilao_id)
                    ->where('type','reserva')
                    ->where('excluido','n')
                    ->where('author',$dadosForm['author'])
                    ->get();
                if($vr->count()){
                    //se encontrou vamos atualizar
                    if(isset($vr[0]['id']) && $id=$vr[0]['id']){
                        unset($dadosForm['_token'],$dadosForm['origem'],$dadosForm['ajax']);
                        $salvar = lance::where('id',$id)->update($dadosForm);
                        if($salvar){
                            $ret['exec'] = true;
                        }
                    }
                }else{
                    //se não encontrou vamos gravar novo
                    $salvar = lance::create($dadosForm);
                    if(isset($salvar->id) && $salvar->id){
                        $ret['exec'] = true;
                    }
                }
                if($ret['exec']){
                    $auto_lance = $this->lance_automatico($leilao_id);
                    $ret['auto_lance'] = $auto_lance;
                }
            }
        }
        return $ret;
    }
    /**
     * Metodo para dar lances automaticos dos registro na reserva
     * @param integer $leilao_id
     * @return array $ret
     */
    public function lance_automatico($leilao_id=false){
        $ret['exec'] = false;
        if($leilao_id){
            $proximo_lance = $this->proximo_lance($leilao_id);
            $reservas = lance::where('leilao_id',$leilao_id)
            ->where('type','reserva')
            ->where('excluido','n')
            ->where('valor_lance','>=',$proximo_lance)
            ->orderBy('id','ASC')
            ->get()
            ->toArray();
            $ret['proximo_lance'] = $proximo_lance;
            $ret['reservas'] = count($reservas);
            $d_ultimo_lance = $this->ultimo_lance($leilao_id,true);//dados do ultimo lance
            if(is_array($reservas) && isset($d_ultimo_lance['author'])){
                foreach ($reservas as $k => $v) {
                    //o autor no momento da inserção não pode ser o autor do ultimo lance
                    if($v['author'] != $d_ultimo_lance['author']){
                        unset($v['id'],$v['token'],$v['created_at'],$v['updated_at']);
                        $v['type'] = 'lance';
                        $r = $v['valor_lance'];
                        $proximo_lance1 = $this->proximo_lance($leilao_id);
                        if((double)$proximo_lance1 <= (double)$r){
                            // $v['valor_lance'] = $this->proximo_lance($leilao_id);
                            $v['valor_lance'] = $proximo_lance1;
                            $v['config'] = Qlib::lib_array_json(['type' => 'auto','token_reserve'=>$v['token']]); //Marca que é um lance automatico
                            $salv[$k] = $this->gravar_lance($v,$autolance=false);
                            $v['count'] = count($reservas);
                            $v['reserva'] = $r;
                            $v['proximo_lance1'] = $proximo_lance1;
                            $debug = $v;
                            // Qlib::lib_print($debug);
                            $d_ultimo_lance = $this->ultimo_lance($leilao_id,true);//dados do ultimo lance
                        }elseif((string)$proximo_lance1==(string)$r){
                            $v['valor_lance'] = $proximo_lance1;
                            $v['config'] = Qlib::lib_array_json(['type' => 'auto']); //Marca que é um lance automatico
                            $salv[$k] = $this->gravar_lance($v,$autolance=false);
                            $v['count'] = count($reservas);
                            $v['reserva'] = $r;
                            $v['proximo_lance1'] = $proximo_lance1;
                            $debug = $v;
                            // Qlib::lib_print($debug);
                            $d_ultimo_lance = $this->ultimo_lance($leilao_id,true);//dados do ultimo lance
                        }else{
                            $v['valor_lance'] = $proximo_lance1;
                            $salv[$k] = $this->gravar_lance($v,$autolance=false);
                            $v['count'] = count($reservas);
                            $v['reserva'] = $r;
                            $v['proximo_lance1'] = $proximo_lance1;
                            $v['res'] = 'Não posso mais';
                            // Qlib::lib_print($v);
                        }
                    }
                }
                if(count($reservas)>1){
                    //Roda o lance automatico novamente se existirem mais de um cliente com lance automatico
                    $ret['auto_lance'] = $this->lance_automatico($leilao_id);
                }
            }
                // Qlib::lib_print($ret);
        }
        return $ret;
    }
    /**
     * Metodo para listar os lances dos usuarios no site o paramentro post_id se refere ai id da áginas e o paramentro dados os dados da página
     * @param integer $post_id o
     */
    public function list_lances($post_id=false,$dados=false){
        if(Gate::allows('is_admin2')||Gate::allows('is_customer_logado')){
            $pst = false;
        }else{
            return false;
        }
        // $pst = new PostController;
        $get = isset($_GET['get']) ? $_GET['get'] : [];

        $queryLances = $this->queryLances($get);
        $queryLances['config']['exibe'] = 'html';
        $title = 'Lances';
        $titulo = $title;
        $view   = url('/').Qlib::get_slug_post_by_id(3);
        $route = $view;
        //if(isset($queryLances['post']));
        $lancesSuperdos =
        $ret = [
            'dados'=>$queryLances['lance'],
            'title'=>$title,
            'titulo'=>$titulo,
            'campos_tabela'=>$queryLances['campos'],
            'lance_totais'=>$queryLances['lance_totais'],
            'titulo_tabela'=>$queryLances['tituloTabela'],
            'arr_titulo'=>$queryLances['arr_titulo'],
            'config'=>$queryLances['config'],
            'routa'=>'lances',
            'view'=>$view,
            'i'=>0,
        ];

        //REGISTRAR EVENTOS
        // (new EventController)->listarEvent(['tab'=>$this->tab,'this'=>$this]);

        return view('site.leiloes.lances.list_lances',$ret);
    }
    /**
     * Metodo para informar ao usuario sobre a reserva que ele fez para lances automaticos
     * @param int $leilao_id
     * @return string $ret
     */
    public function info_reserva($leilao_id=false){
        $ret = false;
        if($leilao_id){
            $dr = Lance::where('author','=',Auth::id())
            ->where('excluido','=','n')
            ->where('leilao_id','=',$leilao_id)
            ->where('type','=','reserva')->
            get()->toArray();
            if(isset($dr[0]['valor_lance']) && ($vl=$dr[0]['valor_lance'])){
                // dd($vl);
                $ret = '<div id="info-reserva"><span class="valor-reserva"><span>'.__('Valor de Reserva').':</span><b> '.Qlib::valor_moeda($vl,'R$ ').'</b></span> <button onclick="excluirReserva(\''.$dr[0]['token'].'\')" class="btn btn-outline-secondary" type="button"><i class="fa fa-trash"></i> '.__('Excluir').'</button></div>';
            }
        }
        return $ret;
    }
    public function excluir_reserva(Request $request){
        $pst = $request->all();
        $ret['exec'] = false;
        $ret['me'] = 'Erro ao excluir entre em contato com o nosso suporte';
        $ret['mens'] = Qlib::formatMensagemInfo($ret['me'],'danger');
        if(isset($pst['token'])){
            $d = [
                'excluido'=>'s',
                'reg_excluido'=>Qlib::lib_array_json(['excluido_por'=>Auth::id(),'data_excluido'=>Qlib::dataLocal()]),
            ];
            $ret['exec'] = Lance::where('token',$pst['token'])->update($d);
            if($ret['exec']){
                $ret['me'] = 'Excluido com sucesso';
                $ret['mens'] = Qlib::formatMensagemInfo($ret['me'],'success');
            }
        }
        return response()->json($ret);
    }
    /**
     * Metodo para verificar se o usuario está liberado para dar um lance
     */
    public function autoriza_lance($leilao_id=false){
        $ret['exec'] = false;
        $ret['mens'] = false;
        if($leilao_id){
            //Verifica se o usuário tem tempo suficiente cadastro
            $d = Post::Find($leilao_id);
            if($d){
                $arr = Qlib::lib_json_array($d['config']);
                if(isset($arr['pode_lance']) && $cf=$arr['pode_lance']){
                    $tgmens = Qlib::buscaValorDb0('tags','id',$cf,'nome');
                    $ret['mens'] = __('Somente '.$tgmens.' podem dar lances.');
                    $arr = [
                        6=>'',
                        7=>48, //48 horas
                        8=>168,//7 dias = 168 horas
                        9=>720,//1 mês = 168 horas
                        10=>2160,//3 meses = 168 horas
                    ];
                    $criterio = $arr[$cf];
                    if(empty($criterio)){
                        $ret['exec'] = true;
                    }else{
                        $user = Auth::user();
                        $dt_created = $user->created_at;
                        $now = Qlib::dataLocalDb();
                        $difdt = Qlib::diffDate($dt_created,$now);
                        if((int)$difdt >= (int)$criterio){
                            $ret['exec'] = true;
                        }
                    }
                }
            }
        }

        return $ret;
    }
}
