<?php

namespace App\Http\Controllers;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\UserController;
use App\Http\Requests\StorePostRequest;
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
        if(!Gate::allows('is_logado')){
            return false;
        }
        $seg2 = request()->segment(2);
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
        $config = [
            'ac'=>$ac,
            'frm_id'=>'frm-posts',
            'route'=>$route,
            'view'=>'site.leiloes',
            'arquivos'=>'jpeg,jpg,png',
            'redirect'=>'/leilao-list',
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
        $title = 'Leilão';
        $titulo = $title;

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

    public function list_leilao($post_id=false,$dados=false){
        if(!Gate::allows('is_logado')){
            return false;
        }
        $pst = new PostController;
        $queryPost = $pst->queryPost($_GET,$dados,$this->post_type);
        $queryPost['config']['exibe'] = 'html';
        $route = $this->post_type;
        $title = 'Leilão';
        $titulo = $title;
        $view   = '/leilao-list';
        //if(isset($queryPost['post']));
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
    public function index()
    {
        //
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
        $ret = false;
        $id = false;
        if($token){
            if(is_array($token)){
                foreach ($token as $kto => $vto) {
                    $id[$kto] = Qlib::buscaValorDb0('posts','token',$vto,'ID');
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
            $d = Post::where('config','LIKE', '%"'.$token.'"%')->where('post_type','=',$this->post_type)->where('post_status','!=','trash')->count();
            if($d > 0){
                $ret = true;
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
                // if(!$this->is_linked_leilao($k)){
                    $ret[$k] = $v;
                // }
            }
        }
        return $ret;
    }

}
