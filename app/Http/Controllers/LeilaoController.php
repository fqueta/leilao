<?php

namespace App\Http\Controllers;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\UserController;
use App\Http\Requests\StorePostRequest;
use App\Models\lance;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use stdClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Models\Post;

use App\Qlib\Qlib;
use Illuminate\Http\Request;

class LeilaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $post_type;
    public function __construct()
    {
        $this->post_type = 'leiloes_adm';
    }
    /**Metodo para gerar o formulario no front pode ser iniciado com o short_de [sc ac="form_leilao"] */
    public function form_leilao($post_id=false,$dados=false,$leilao_id=false){
        $seg1 = request()->segment(1);
        $seg2 = request()->segment(2);
        if(Gate::allows('is_admin2')||Gate::allows('is_customer_logado')){
        }else{
            return false;
        }
        if($seg1 == Qlib::get_slug_post_by_id(37)){
            //Verifica se a página é de exição
            return false;
        }
        $leilao_id = $leilao_id ? $leilao_id : $seg2;
        if($leilao_id){
            $ac = 'alt';
            $leilao_id = Qlib::buscaValorDb0('posts','token',$leilao_id,'ID');
            $dadosLeilao = Post::Find($leilao_id);
            // if($dadosLeilao->count() > 0){
            //     $dadosLeilao['id'] = $dadosLeilao['ID'];
            // }
        }else{
            $dadosLeilao = false;
            $ac = 'cad';
        }
        if(!$dados && $post_id){
            $dados = Post::Find($post_id);
        }
        $route = $this->post_type;
        $title = __('Cadastro de Leilão');
        $titulo = $title;
        $config = [
            'ac'=>$ac,
            'frm_id'=>'frm-posts',
            'route'=>$route,
            'view'=>'site.leiloes',
            'file_submit'=>'site.leiloes.js_submit',
            'arquivos'=>'jpeg,jpg,png',
            'redirect'=>url('/').'/'.Qlib::get_slug_post_by_id(18),
            'title'=>$title,
            'titulo'=>$titulo,
        ];
        if(isset($dadosLeilao['ID'])){
            $config['id'] = $dadosLeilao['ID'];
        }
        $config['media'] = [
            'files'=>'jpeg,jpg,png,pdf,PDF',
            'select_files'=>'unique',
            'field_media'=>'post_parent',
            'post_parent'=>$post_id,
        ];
        $pst = new PostController;
        $listFiles = false;
        $post_type = $this->post_type;
        $campos = $pst->campos_leilao($leilao_id,$post_type,$dadosLeilao);

        $ret = [
            'value'=>$dadosLeilao,
            'config'=>$config,
            'title'=>$title,
            'titulo'=>$titulo,
            'listFiles'=>$listFiles,
            'campos'=>$campos,
            'exec'=>true,
        ];
        return view('site.leiloes.edit',$ret);
    }
    /**Metodo para listar os leilões no console do usuario do site no front pode ser iniciado com o short_de [sc ac="list_leilao"] */

    public function list_leilao($dados=false){
        if(Gate::allows('is_admin2')||Gate::allows('is_customer_logado')){
            $pst = false;
        }else{
            return false;
        }
        $pst = new PostController;
        $queryPost = $pst->queryPost($_GET,$dados,$this->post_type);
        $queryPost['config']['exibe'] = 'html';
        $route = $this->post_type;
        $title = 'Leilão';
        $titulo = $title;
        $view   = '/'.Qlib::get_slug_post_by_id(18);
        //if(isset($queryPost['post']));
        // dd($queryPost);
        $ret = [
            'dados'=>$queryPost['post'],
            'title'=>$title,
            'titulo'=>$titulo,
            'campos_tabela'=>$queryPost['campos'],
            'post_totais'=>$queryPost['post_totais'],
            'titulo_tabela'=>$queryPost['tituloTabela'],
            'arr_titulo'=>$queryPost['arr_titulo'],
            'config'=>$queryPost['config'],
            'routa'=>$route,
            'view'=>$view,
            'i'=>0,
        ];
        //REGISTRAR EVENTOS
        // (new EventController)->listarEvent(['tab'=>$this->tab,'this'=>$this]);
        return view('site.leiloes.list',$ret);
    }
    /**
     * Metodo para listar os leiloes publicados no site
     */
    public function index()
    {
        // $pst = new PostController;
        // $queryPost = $pst->queryPost($_GET,false,$this->post_type);
        // $queryPost['config']['exibe'] = 'html';
        // $route = $this->post_type;
        // $title = 'Leilão';
        // $titulo = $title;
        // $view   = '/'.Qlib::get_slug_post_by_id(18);
        // //if(isset($queryPost['post']));
        // $ret = [
        //     'dados'=>$queryPost['post'],
        //     'title'=>$title,
        //     'titulo'=>$titulo,
        //     'campos_tabela'=>$queryPost['campos'],
        //     'post_totais'=>$queryPost['post_totais'],
        //     'titulo_tabela'=>$queryPost['tituloTabela'],
        //     'arr_titulo'=>$queryPost['arr_titulo'],
        //     'config'=>$queryPost['config'],
        //     'routa'=>$route,
        //     'view'=>$view,
        //     'i'=>0,
        // ];
        // return view('site.index',$ret);
        return redirect('/leiloes-publicos');
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
    public function store(StorePostRequest $request)
    {
        return (new PostController)->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        return (new PostController)->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        return (new PostController)->destroy($id,$request);
    }
    /**
     * Metodo para retornar o valor de um contrato
     * @param int $id or array $array
     * @retunt array
     */
    public function get_data_contrato($token=false,$somar=false){
        $ret['exec'] = false;
        $id = false;
        if($token){
            if(is_array($token)){
                foreach ($token as $kto => $vto) {
                    if($this->is_linked_leilao($vto)){
                        return $ret;
                    }else{
                        $id[$kto] = Qlib::buscaValorDb0('posts','token',$vto,'ID');
                    }
                }
            }else{
                $id = Qlib::buscaValorDb0('posts','token',$token,'ID');
            }
        }
        if($id){
            if(is_array($id)){
                if($somar){
                    $ret['total_horas'] = Null;
                    $ret['valor_r'] = Null;
                }
                foreach ($id as $k => $v) {
                    $post = Post::Find($v);
                    if($post->count() > 0){
                        if(isset($post['config'])){
                            if($somar){
                                if(isset($post['config']['valor_r'])){
                                    $total_horas = (int)$post['config']['total_horas'];
                                    $valor_r = Qlib::precoBanco($post['config']['valor_r']);
                                    $ret['valor_r'] += $valor_r;
                                    $ret['total_horas'] += $total_horas;
                                    $ret['exec'] = true;
                                }
                            }else{
                                $ret[$v] = $post['config'];
                            }
                        }
                    }
                }
            }else{
                $post = Post::Find($id);
                if($post->count() > 0){
                    if(isset($post['config'])){
                        $ret = $post['config'];
                        $ret['exec']=true;
                    }
                }
            }
        }
        return $ret;
    }
    /**
     * Metodo para exibir o valor e horas dos contratos atraves de uma routa /leiloes/get-data-contrato/{token}
     */
    public function view_data_contrato($token=false){
        if(isset($_REQUEST['config']['itens'])&&is_array($_REQUEST['config']['itens'])){
            $arr = $_REQUEST['config']['itens'];
        }else{
            $arr = explode("_",$token);
        }
        $ret = [];
        if(is_array($arr)){
            $ret =  $this->get_data_contrato($arr,true);
        }elseif(!empty($token)){
            $ret =  $this->get_data_contrato($token);
        }
        return response()->json($ret);
    }
    /**
     * Metodo para verificar vinculo de contrato com um leilão
     * @param string $token
     * @return boolean $ret
     */
    public function is_linked_leilao($token=false){
        $ret = false;
        if($token){
            $d = Post::where('config','LIKE', '%"'.$token.'"%')->where('post_type','=',$this->post_type)->where('post_status','!=','trash')->get()->toArray();
            if($d){
                $ret = $d[0]['post_title'];
            }
        }
        return $ret;
    }
    /**
     * Metodo para verificar montar um array com os contratos disponiveis
     * @param int $id_cliente, boolean $is_linked
     * @return array $ret
     */
    public function array_contratos($id_cliente=false, $is_linked=true){
        $ret = array();
        $r = [];
        if($id_cliente){
            $r = Qlib::sql_array("SELECT token,post_title FROM posts WHERE post_status='publish'  AND post_type='produtos' AND config LIKE '%\"cliente\":\"".$id_cliente."\"%'",'post_title','token');
        }else{
            $r = Qlib::sql_array("SELECT token,post_title FROM posts WHERE post_status='publish' AND post_type='produtos'",'post_title','token');
        }
        if($is_linked && is_array($r)){
            foreach ($r as $k => $v) {
                if($leiao=$this->is_linked_leilao($k)){
                    $ret[$k] = ['label'=>$v.' Cadastrado no '.$leiao,'attr_option'=>'disabled'] ;
                }else{
                    $ret[$k] = ['label'=>$v,'attr_option'=>''] ;
                }
            }
        }
        return $ret;
    }
    /**
     * Metodo de display de terminio de lelao
     */
    public function info_termino($leilao_id=false,$dl=false){
        $ret['exec'] = false;
        $ret['termino'] = false;
        $ret['html'] = false;
        if(!$dl && $leilao_id){
            $dl = Post::Find($leilao_id);
        }
        if($dl){
            $d1 = @$dl['config']['termino'].' '.@$dl['config']['hora_termino'];
            $d2 = Qlib::dataLocalDb();
            $sd1 = strtotime($d1);
            $sd2 = strtotime($d2);
            if($sd1<$sd2){
                $ret['exec'] = true;
                $ret['termino'] = true;
                $ret['html'] = 'Finalizado ('.Qlib::dataExibe(@$dl['config']['termino']).' '.@$dl['config']['hora_termino'].')';
            }else{
                $termino = Qlib::diffDate2($d1,$d2,false,true);
                $ret['html'] = $termino;
                $ret['exec'] = true;
            }

        }
        return $ret;
    }
    /**
     * Metodo Mostrar o lance vencedor
     * @param integer $leilao_id, array $dl=dados dos leilão, string $get_meta_tipo=tipo de dados para trazer junto
     */
    public function get_lance_vencedor($leilao_id=false,$dl=false,$get_meta_tipo=false){
        $ret=false;
        if(!$dl && $leilao_id){
            $dl = Post::Find($leilao_id);
        }
        if($dl){
            $termino = $this->info_termino($leilao_id,$dl);
            if(isset($termino['termino']) && $termino['termino']){
                $lv = (new LanceController)->ultimo_lance($leilao_id,true);
                if(isset($lv['valor_lance']) && ($vl=$lv['valor_lance'])){
                    if($get_meta_tipo){
                        if($get_meta_tipo=='ultimo_lance'){
                            $ret['valor'] = Qlib::valor_moeda($vl,'R$ ').' ('.Qlib::getNickName(@$lv['author']).') ';
                            $ret[$get_meta_tipo] = $lv;
                        }else{
                            $ret = Qlib::valor_moeda($vl,'R$ ').' ('.Qlib::getNickName(@$lv['author']).') ';
                        }
                    }else{
                        $ret = Qlib::valor_moeda($vl,'R$ ').' ('.Qlib::getNickName(@$lv['author']).') ';
                    }
                }
            }
        }
        return $ret;
    }
    /**
     * Metodo para listar leiloes publicos
     */
    public function leiloes_publicos($dados=false){
        $pst = new PostController;
        $seg1 = request()->segment(1); //link da página em questão
        $seg2 = request()->segment(2); //link da página em questão
        $logado = Auth::check();
        if($logado){
            //checar se a conta destá verifcadada
            $iv=(new UserController)->is_verified();
            if(!$iv){
                return redirect(route('verification.notice'));
            }
        }
        if($seg2){
            $_GET['filter']['ID'] = $seg2;
            $_GET['filter']['post_status'] = 'publish';
            $dl = Post::where('ID','=',$seg2)->where('post_status', '=', 'publish')->get();
            if($dl->count() > 0){
                $title = $dl[0]['post_title'];
                $titulo = $title;
                // $d1 = @$dl[0]['config']['termino'].' '.@$dl[0]['config']['hora_termino'];
                $it = $this->info_termino($dl[0]['ID']);
                $termino = $it['html'];
                $lc = new LanceController;
                $ultimoLance = $lc->ultimo_lance($seg2);
                $arr_lances = self::arr_lances($seg2,$dl[0],20);
                if($ultimoLance){
                    $lance_atual = Qlib::valor_moeda($ultimoLance,'R$ ');
                }else{
                    $lance_atual = '<h6>SEM LANCES</h6>';
                }
                //list lances
                $ll = $lc->get_lances($dl[0]['ID']);

                $dl[0]['link_thumbnail'] = Qlib::get_thumbnail_link($dl[0]['ID']);
                $dl[0]['the_permalink'] = Qlib::get_the_permalink($dl[0]['ID']);
                $dl[0]['termino'] = $termino;
                $dl[0]['lance_atual'] = $lance_atual;
                $dl[0]['info_termino'] = $it;
                $dl[0]['list_lances'] = $ll;
                $dl[0]['lance_vencedor'] = $this->get_lance_vencedor($dl[0]['ID'],$dl[0]);
                $dl[0]['arr_lances'] = $this->arr_lances($dl[0]['ID'],$dl[0]);
                $ret = [
                    'dados'=>$dl[0],
                    'config'=>[
                        'title'=>$title,
                        'titulo'=>$titulo,
                    ],
                ];
            }else{
                $title = __('Página não encontrada');
                $titulo = $title;
                $ret = [
                    'dados'=>[],
                    'config'=>[
                        'title'=>$title,
                        'titulo'=>$titulo,
                    ],
                ];
            }
            return view('site.leiloes.list',$ret);
        }else{
            $queryPost = $pst->queryPost($_GET,$dados,$this->post_type);
            $dados = [];
            if(isset($queryPost['post']) && is_object($queryPost['post'])){
                foreach ($queryPost['post'] as $kp => $vp) {
                    if(isset($vp['config']['itens']) && is_array($vp['config']['itens']) && count($vp['config']['itens'])>0){
                        $dados[$kp] = $vp;
                    }elseif(isset($vp['config']['contrato']) && !empty($vp['config']['contrato'])){
                        $dados[$kp] = $vp;
                    }
                }
            }
        }
        $queryPost['config']['exibe'] = 'html';
        $route = $this->post_type;
        $title = 'Leilão';
        $titulo = $title;

        $view   = '/'.Qlib::get_slug_post_by_id(18);
        //if(isset($queryPost['post']));
        $ret = [
            'dados'=>$dados,
            'title'=>$title,
            'titulo'=>$titulo,
            'campos_tabela'=>$queryPost['campos'],
            'post_totais'=>$queryPost['post_totais'],
            'titulo_tabela'=>$queryPost['tituloTabela'],
            'arr_titulo'=>$queryPost['arr_titulo'],
            'config'=>$queryPost['config'],
            'routa'=>$route,
            'view'=>$view,
            'i'=>0,
        ];
        //REGISTRAR EVENTOS
        // (new EventController)->listarEvent(['tab'=>$this->tab,'this'=>$this]);

        return view('site.leiloes.list',$ret);
    }
    public static function get_leilao($leilao_id=false,$data=false){
        $ret = false;
        if(!$data && $leilao_id){
            $data = Post::Find($leilao_id);
        }
        $ret = $data;
        return $ret;
    }
    public static function arr_lances($leilao_id=false,$data=false,$total=10){
        $ret = [];
        $dl = self::get_leilao($leilao_id,$data);
        $campo_valor = 'valor_r';
        if(isset($dl['config']['incremento']) && isset($dl['config'][$campo_valor])){
            $inc=Qlib::precoBanco($dl['config']['incremento']);
            $li=Qlib::precoBanco($dl['config'][$campo_valor]);
            $l_at=(new LanceController)->ultimo_lance($leilao_id);//lance atual
            if($l_at>0){
                $li=$l_at+$inc;
            }
            if($inc>0 && $li>0){
                $vl = $li;
                foreach (range(1,$total) as $k => $v) {
                    // echo $vl.'<br>';
                    $ret[$k] = ['valor'=>$vl];
                    $vl = $vl+$inc;
                }
            }
        }
        return $ret;
    }
    public function get_link_edit_admin($post_id,$post=false){
        if(!$post && $post_id){
            $post = post::Find($post_id);
        }
        $ret = url('/').'/admin/leiloes_adm/'.$post_id.'/edit?redirect='.Qlib::UrlAtual().'';
        return $ret;
    }
    /**
     * Metodo para pegar o link publico do leilao
     */
    public function get_link($post_id){
        $ret = asset('/').'leiloes-publicos/'.$post_id;
        return $ret;
    }
    /**
     * Metodo para pegar o link de pagamento do leilão
     */
    public function get_link_pagamento($post_id){
        $token = Qlib::buscaValorDb0('posts','id',$post_id,'token');
        $ret = asset('/').'checkout/'.$token;
        return $ret;
    }
    /**
     * Metodo Notificar o termino do leilao ao ganhador ou ao Dono doleilao
     * @param int $post_id o id do leilão, string $tipo_responsavel pode ser ganhador ou autor para o dono do leilao
     */
    public function notifica_termino($post_id,$tipo_responsavel='ganhador'){
        $ret['exec'] = false;
        $dl = Post::Find($post_id) ; //dados do leilao
        if($dl && $tipo_responsavel=='ganhador'){
            $meta_notific = 'notifica_email_termino_leilao';
            //Verifica quem é o ganhador
            $dg = $this->get_lance_vencedor($post_id,$dl,'ultimo_lance');//dados do ganhador
            //Verifica se ja foi enviado a notificação antes
            $verifica_notific = Qlib::get_postmeta($post_id,$meta_notific,true);
            if($verifica_notific=='s'){
                $ret['mens'] = 'E-mail ja foi enviado';
                return $ret;
            }
            if(isset($dg['ultimo_lance']['id']) && ($id_lance=$dg['ultimo_lance']['id']) && $verifica_notific!='s'){
                $ul = $dg['ultimo_lance'];
                $mensagem = '
                <h1>Parabéns {nome} </h1>
                <p>Seu lance de <b>{valor_lance}</b> para o <b>{nome_leilao}</b> foi vencedor</p>
                <p>para efetuar o pagamento use o botão abaixo!</p>
                ';
                $no = explode(' ',Qlib::buscaValorDb0('users','id',$ul['author'],'name'));
                $nome = @$no[0];
                $nome_leilao = Qlib::buscaValorDb0('posts','id',$ul['leilao_id'],'post_title');
                $valor_lance = $ul['valor_lance'];
                $mensagem = str_replace('{nome}',$nome,$mensagem);
                $mensagem = str_replace('{valor_lance}',Qlib::valor_moeda($valor_lance,'R$ '),$mensagem);
                $mensagem = str_replace('{nome_leilao}',$nome_leilao,$mensagem);
                $link_pagamento = $this->get_link_pagamento($post_id);
                $ret = (new LeilaoController)->enviar_email([
                    'type' => 'notifica_finalizado',
                    'lance_id' => $id_lance,
                    'subject' => 'Leilão Finalizado',
                    'mensagem' => $mensagem,
                    'link_pagamento' => $link_pagamento,
                ]);
                if($ret['exec']){
                    $ret['save'] = Qlib::update_postmeta($post_id,$meta_notific,'s');
                }
            }
            // if(isset($dg['ultimo_lance']['valor_lance']) && isset($dg['ultimo_lance']['author'])){
            //     $valor_lance = $dg['ultimo_lance']['valor_lance'];
            //     $autor_lance = $dg['ultimo_lance']['author'];
            //     $autor_leilao = $dl['post_author'];
            //     $subject = 'Leilão Finalizado';
            //     // $arr = implode($valor_lance, $autor_lance, $autor_leilao);
            //     dd($valor_lance);
            // }
        }
        return $ret;
    }
    /**
     * Metodo para preparar o disparar o email
     * @param array $config
     * @return array $ret
     */
    public function enviar_email($config=[]){
        $ret['exec'] = false;
        if(is_array($config)){
            $lance_id = isset($config['lance_id']) ? $config['lance_id'] : false;
            if(!$lance_id){
                return $ret;
            }
            $dl = lance::Find($lance_id); //dados do lance.
            if($dl){
                $id_user = isset($dl['author']) ? $dl['author'] : false;
                $leilao_id = isset($dl['leilao_id']) ? $dl['leilao_id'] : false;
                $subject = isset($config['subject']) ? $config['subject'] : false;
                $type = isset($config['type']) ? $config['type'] : false;
                $d_user = isset($config['d_user']) ? $config['d_user'] : User::Find($id_user);
                $mensagem = isset($config['mensagem']) ? $config['mensagem'] : false;
                if(isset($d_user['email']) && !empty($d_user['email'])){
                    $user = new stdClass();
                    $n = explode(' ',$d_user['name']);
                    if(!isset($n[0])){
                        return $ret;
                    }
                    $title_leilao = Qlib::buscaValorDb0('posts','id',$leilao_id,'post_title');
                    $user->name = ucwords($n[0]);
                    $user->email = $d_user['email'];
                    $user->subject = $subject;
                    $user->type = $type;
                    $user->leilao_id = $leilao_id;
                    $user->nome_leilao = $title_leilao;
                    $user->mensagem = $mensagem;
                    $user->link_leilao = (new LeilaoController)->get_link($user->leilao_id);
                    // return new \App\Mail\leilao\lancesNotific($user);
                    $enviar = Mail::send(new \App\Mail\leilao\lancesNotific($user));
                    if( count(Mail::failures()) > 0 ) {

                        $ret['mens'] = "Houve um ou mais erros. Segue abaixo: <br />";

                        foreach(Mail::failures() as $email_address) {
                            $ret['mens'] .= " - $email_address <br />";
                        }

                    } else {
                        $ret['exec'] = true;
                        $ret['mens'] = "Sem erros, enviado com sucesso! ".$user->email;
                    }
                }else{
                    $ret['mens'] = __('Usuário não encontrado');
                }
            }
        }
        return $ret;
    }

}
