<?php

namespace App\Http\Controllers;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\UserController;
use App\Http\Requests\StorePostRequest;
use App\Models\lance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Qoption;
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
    public function leiloes_publicos($dados=false){
        $pst = new PostController;
        $seg1 = request()->segment(1); //link da página em questão
        $seg2 = request()->segment(2); //link da página em questão
        if($seg2){
            $_GET['filter']['ID'] = $seg2;
            $_GET['filter']['post_status'] = 'publish';
            $dl = Post::where('ID','=',$seg2)->where('post_status', '=', 'publish')->get();
            if($dl->count() > 0){
                $title = $dl[0]['post_title'];
                $titulo = $title;
                $d1 = @$dl[0]['config']['termino'].' '.@$dl[0]['config']['hora_termino'];
                $termino = Qlib::diffDate2($d1,Qlib::dataLocalDb(),false,true);
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
                $dl[0]['list_lances'] = $ll;
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

}
