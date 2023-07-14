<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Qlib\Qlib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class siteController extends Controller
{
    public $sec1;
    public $sec2;
    function __construct()
    {
        $seg1 = request()->segment(1);
        $seg2 = request()->segment(2);
        $this->sec1 = $seg1;
        $this->sec2 = $seg2;
    }
    public function index(Request $request)
    {
        $slug1 = $this->sec1 ? $this->sec1 : 'home';
        $slug2 = $this->sec2 ? $this->sec2 : false;
        $ret['exec']=false;
        $ret['dados']=false;
        if($slug1){
            $ds = Post::where('post_name', $slug1)->where('post_status', 'publish')->get();
            if($ds->count()){
                $dados=$ds[0];
                if(isset($dados['config']['permission']) && $arr_perm = $dados['config']['permission']){
                    if(is_array($dados['config']['permission'])){
                        if(Auth::check()){
                            $user = Auth::user();
                            if(!in_array($user->id_permission, $dados['config']['permission'])){
                                return view('erro404',$ret);
                            }
                        }else{
                            return view('erro404',$ret);
                        }
                    }
                }
                $ret['exec']=true;
                if($slug2){
                    $dados['slug2']=$slug2;
                }
                $ret['dados']=$dados;
                return view('site.index',$ret);
            }else{
                return view('erro404',$ret);
            }
        }else{
            return view('erro404',$ret);
        }

    }
    public function get_main_post($post_id=false){
        $ret = false;
        if($post_id){
            $dados = Post::Find($post_id);
            if(isset($dados['post_content'])){

                $ret = $dados['post_content'];
                $lc = new LeilaoController;
                $uc = new UserController;
                $ret = Qlib::short_code_global($ret,'sc',[
                    'form_leilao' => $lc->form_leilao($post_id,$dados),
                    'list_leilao' => $lc->list_leilao($post_id,$dados),
                    'leiloes_publicos' => $lc->leiloes_publicos($post_id,$dados),
                    'form_meu_cadastro' => $uc->form_meu_cadastro($post_id,$dados),
                    'teste' => 'teste de conteudo do formulario para gadastr',
                ]);
            }
        }
        return $ret;
    }
}
