<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\CobrancaController;
use App\Http\Controllers\admin\PostController;
use App\Models\Familia;
use App\Models\Post;
use App\Models\User;
use App\Qlib\Qlib;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class TesteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // echo (int)(Post::max('menu_order'))+1;
        // $ret = (new PostController)->addMenu(20);
        // $slug = Qlib::createSlug('leilão 12');
        // $p = (new LeilaoController)->get_data_contrato([24,4],true);
        // $p = (new LeilaoController)->is_linked_leilao('64a5a2b17a602');
        // Qlib::lib_print($p);
        $p = (new LanceController)->proximo_lance(36);
        dd($p);
        // dd($ret);
        // return false;
        // //     echo Qlib::get_subdominio();
        // $dados = (new FamiliaController($user))->rendaFamiliar(3145);
        // dd($dados);
            // $host = request()->getHttpHost();
        // echo $host ."<br/>";
        // $getHost = request()->getHost();
        // echo $getHost ."<br/>";
        // $hostwithHttp = request()->getSchemeAndHttpHost();
        // echo $hostwithHttp ."<br/>";
        // $subdomain = $route->getParameter('subdomain');
        //dd($route);
        // return view('teste',$config);
    }
    public function ajax(){
        $limit = isset($_GET['limit']) ?$_GET['limit'] : 50;
        $page = isset($_GET['page']) ?$_GET['page'] : 1;
        $site=false;

        $urlApi = $site?$site: 'https://po.presidenteolegario.mg.gov.br';
        $link = $urlApi.'/api/diaries?page='.$page.'&limit='.$limit;
        $link_html = dirname(__FILE__).'/html/front.html';
        $dir_img = $urlApi.'/uploads/posts/image_previews/{id}/thumbnail/{image_preview_file_name}';
        $dir_file = $urlApi.'/uploads/diaries/files/{id}/original/{file_file_name}';

        //$arquivo = $this->carregaArquivo($link_html);
        //$temaHTML = explode('<!--separa--->',$arquivo);
        $api = file_get_contents($link);
        $arr_api = Qlib::lib_json_array($api);
        /*
        $tema1 = '<ul id="conteudo" class="list-group">{tr}</ul>';
        $tema2 = '<li class="list-group-item" itemprop="headline"><a href="{link_file}" target="_blank">{file_file_name} – {date}</a></li>';
        $tr=false;
        if(isset($arr_api['data']) && !empty($arr_api['data'])){
          foreach ($arr_api['data'] as $key => $value) {
              $link = false;
              $link_file = str_replace('{id}',$value['id'],$dir_file);
              $link_file = str_replace('{file_file_name}',$value['file_file_name'],$link_file);


              $conteudoPost = isset($value['content'])?:false;
              $date = false;
              $time = false;
              $datetime = str_replace(' ','T',$value['date']);
              $d = explode(' ',$value['date']);

              if(isset($d[0])){
                $date = Qlib::dataExibe($d[0]);
              }
              if(isset($d[1])){
                $time = $d[1];
              }
              $file_name = str_replace('.pdf','',$value['file_file_name']);
              $file_name = str_replace('.PDF','',$file_name);
              $tr .= str_replace('{file_file_name}',$file_name,$tema2);
              $tr = str_replace('{link}',$link,$tr);
              $tr = str_replace('{link_file}',$link_file,$tr);
              $tr = str_replace('{time}',$time,$tr);
              $tr = str_replace('{date}',$date,$tr);
              $tr = str_replace('{description}',$value['description'],$tr);
              $tr = str_replace('{datetime}',$datetime,$tr);
          }
        }
        $link_veja_mais = '/diario-oficial';
        $ret = str_replace('{tr}',$tr,$tema1);
        //$ret = str_replace('{id_sec}',$id_sec,$ret);
        $ret = str_replace('{link_veja_mais}',$link_veja_mais,$ret);
        */
        return response()->json($arr_api);
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
