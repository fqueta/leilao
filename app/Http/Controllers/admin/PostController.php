<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LeilaoController;
use App\Http\Controllers\wp\ApiWpController;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use stdClass;
use App\Models\Post;
use App\Qlib\Qlib;
use App\Models\User;
use App\Models\_upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class PostController extends Controller
{
    protected $user;
    public $routa;
    public $label;
    public $view;
    public $post_type;
    public $tab;
    public $sec;
    public $i_wp;//integração com wp
    public $wp_api;//integração com wp
    public function __construct()
    {
        $this->middleware('auth');
        $seg1 = request()->segment(1);
        $seg2 = request()->segment(2);
        $type = false;
        if($seg2){
            $type = substr($seg2,0,-1);
        }
        $this->post_type = trim($seg2);
        $this->sec = $seg2;
        $user = Auth::user();
        $this->user = $user;
        $this->routa = $this->sec;
        $this->label = 'Posts';
        $this->tab = 'posts';
        $this->view = 'admin.posts';
        $this->i_wp = Qlib::qoption('i_wp');//indegração com Wp s para sim
        //$this->wp_api = new ApiWpController();
        $this->wp_api = false;

    }
    public function queryPost($get=false,$config=false,$post_type=false)
    {

        $ret = false;
        $get = isset($_GET) ? $_GET:[];
        $ano = date('Y');
        $mes = date('m');
        //$todasFamilias = Post::where('excluido','=','n')->where('deletado','=','n');
        $config = [
            'limit'=>isset($get['limit']) ? $get['limit']: 50,
            'order'=>isset($get['order']) ? $get['order']: 'desc',
        ];
        $post_type = $post_type?$post_type:$this->post_type;
        if($post_type){
            // if($post_type=='leiloes_adm'){

            // }
            if(Qlib::is_frontend()){
                $post =  Post::where('post_author','=',Auth::id())->where('post_status','!=','inherit')->where('post_status','!=','trash')->where('post_type','=',trim($post_type))->orderBy('id',$config['order']);
            }else{
                $post =  Post::where('post_status','!=','inherit')->where('post_status','!=','trash')->where('post_type','=',trim($post_type))->orderBy('id',$config['order']);
            }
        }else{
            $post =  Post::where('post_status','!=','inherit')->where('post_status','!=','trash')->orderBy('id',$config['order']);
        }
        //$post =  DB::table('posts')->where('excluido','=','n')->where('deletado','=','n')->orderBy('id',$config['order']);

        $post_totais = new stdClass;
        $campos = $this->campos(false,$post_type);
        $tituloTabela = 'Lista de todos cadastros';
        $arr_titulo = false;
        if(isset($get['filter'])){
                $titulo_tab = false;
                $i = 0;
                if(isset($get['filter']['post_status'])){
                    $get['filter']['post_status'] = 'publish';
                }else{
                    $get['filter']['post_status'] = 'pending';
                }
                //dd($get['filter']);
                foreach ($get['filter'] as $key => $value) {
                    if(!empty($value)){
                        if($key=='id'){
                            $post->where($key,'LIKE', $value);
                            $titulo_tab .= 'Todos com *'. $campos[$key]['label'] .'% = '.$value.'& ';
                            $arr_titulo[$campos[$key]['label']] = $value;
                        }else{
                            if(is_array($value)){
                                foreach ($value as $kb => $vb) {
                                    if(!empty($vb)){
                                        if($key=='tags'){
                                            $post->where($key,'LIKE', '%"'.$vb.'"%' );
                                        }else{
                                            $post->where($key,'LIKE', '%"'.$kb.'":"'.$vb.'"%' );
                                        }
                                    }
                                }
                            }else{
                                $post->where($key,'LIKE','%'. $value. '%');
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
                $fm = $post;
                if($config['limit']=='todos'){
                    $post = $post->get();
                }else{
                    $post = $post->paginate($config['limit']);
                }
        }else{
            $fm = $post;
            if($config['limit']=='todos'){
                $post = $post->get();
            }else{
                $post = $post->paginate($config['limit']);
            }
        }
        $post_totais->todos = $fm->count();
        // dd($post);
        $post_totais->esteMes = $fm->whereYear('post_date', '=', $ano)->whereMonth('post_date','=',$mes)->count();
        $post_totais->ativos = $fm->where('post_status','=','publish')->count();
        $post_totais->inativos = $fm->where('post_status','!=','publish')->count();
        $ret['post'] = $post;
        $ret['post_totais'] = $post_totais;
        $ret['arr_titulo'] = $arr_titulo;
        $ret['campos'] = $campos;
        $ret['config'] = $config;
        $ret['post_type'] = $this->post_type;
        $ret['tituloTabela'] = $tituloTabela;
        $ret['config']['resumo'] = [
            'todos_registro'=>['label'=>'Todos cadastros','value'=>$post_totais->todos,'icon'=>'fas fa-calendar'],
            'todos_mes'=>['label'=>'Cadastros recentes','value'=>$post_totais->esteMes,'icon'=>'fas fa-calendar-times'],
            'todos_ativos'=>['label'=>'Cadastros ativos','value'=>$post_totais->ativos,'icon'=>'fas fa-check'],
            'todos_inativos'=>['label'=>'Cadastros inativos','value'=>$post_totais->inativos,'icon'=>'fas fa-archive'],
        ];
        return $ret;
    }

    public function campos_produtos($sec=false){
        $hidden_editor = '';
        if(Qlib::qoption('editor_padrao')=='laraberg'){
            $hidden_editor = 'hidden';
        }
        $ret = [
            'ID'=>['label'=>'Id','active'=>true,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'post_type'=>['label'=>'tipo de post','active'=>false,'type'=>'hidden','exibe_busca'=>'d-none','event'=>'','tam'=>'2','value'=>$this->post_type],
            'token'=>['label'=>'token','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'post_title'=>['label'=>'Numero do contrato','active'=>true,'placeholder'=>'Ex.: Nome do produto ','type'=>'text','exibe_busca'=>'d-block','event'=>'required onkeyup=lib_typeSlug(this)','tam'=>'12','title'=>'Identificador do contrado pode ser nome ou número'],
            'config[cliente]'=>[
                'label'=>'Nome do cliente*',
                'active'=>true,
                'type'=>'select',
                'arr_opc'=>Qlib::sql_array("SELECT id,name FROM users WHERE ativo='s' AND id_permission>'4'",'nome','id'),'exibe_busca'=>'d-block',
                'event'=>'required',
                'tam'=>'7',
                'exibe_busca'=>true,
                'option_select'=>true,
                'class'=>'select2',
                'cp_busca'=>'config][cliente',
            ],
            'config[total_horas]'=>['label'=>'Qtd. Horas','active'=>true,'placeholder'=>'','type'=>'number','exibe_busca'=>'d-block','event'=>'required onkeyup=divideHoras(this)','tam'=>'2','cp_busca'=>'config][total_horas','title'=>'Número total de horas'],
            'config[valor_r]'=>['label'=>'Valor','active'=>true,'placeholder'=>'','type'=>'moeda','exibe_busca'=>'d-block','event'=>'required onkeyup=divideHoras(this)','tam'=>'3','cp_busca'=>'config][valor_r','title'=>'Valor do reembolso'],
            // 'config[valor_h]'=>['label'=>'Valor Hora','active'=>true,'placeholder'=>'','type'=>'moeda','exibe_busca'=>'d-block','event'=>'required','tam'=>'3','cp_busca'=>'config][valor_h','title'=>'Valor do hora no contrato'],
            // 'config[lance_unit]'=>['label'=>'Lance por hora','active'=>true,'placeholder'=>'','type'=>'moeda','exibe_busca'=>'d-block','event'=>'required onkeyup=multiplicaHorasLance(this)','tam'=>'3','cp_busca'=>'config][lance_unit','title'=>'Valor unitário do Lançe'],
            // 'config[lance_total]'=>['label'=>'Lance total','active'=>true,'placeholder'=>'','type'=>'moeda','exibe_busca'=>'d-block','event'=>'required','tam'=>'3','cp_busca'=>'config][lance_total','title'=>'Valor unitário do Lançe mutiplicado pela quantidade de horas'],
            // 'config[valor_venda]'=>['label'=>'Compre já','active'=>true,'placeholder'=>'','type'=>'moeda','exibe_busca'=>'d-block','event'=>'required','tam'=>'3','cp_busca'=>'config][valor_venda','title'=>'Valor para venda sem leilão'],
            // 'post_date_gmt'=>['label'=>'Data do decreto','active'=>true,'placeholder'=>'','type'=>'date','exibe_busca'=>'d-block','event'=>'','tam'=>'4'],
            'post_name'=>['label'=>'Slug','active'=>false,'placeholder'=>'Ex.: nome-do-post','type'=>'hidden','exibe_busca'=>'d-block','event'=>'type_slug=true','tam'=>'12'],
            //'post_excerpt'=>['label'=>'Resumo (Opcional)','active'=>true,'placeholder'=>'Uma síntese do um post','type'=>'textarea','exibe_busca'=>'d-block','event'=>'','tam'=>'12'],
            //'ativo'=>['label'=>'Liberar','active'=>true,'type'=>'chave_checkbox','value'=>'s','valor_padrao'=>'s','exibe_busca'=>'d-block','event'=>'','tam'=>'3','arr_opc'=>['s'=>'Sim','n'=>'Não']],
            'post_content'=>['label'=>'Descrição','active'=>false,'type'=>'textarea','exibe_busca'=>'d-block','event'=>$hidden_editor,'tam'=>'12','class_div'=>'','class'=>'editor-padrao summernote','placeholder'=>__('Escreva seu conteúdo aqui..')],
            'post_status'=>['label'=>'Status','active'=>true,'type'=>'chave_checkbox','value'=>'publish','valor_padrao'=>'publish','exibe_busca'=>'d-block','event'=>'','tam'=>'3','arr_opc'=>['publish'=>'Publicado','pending'=>'Despublicado']],
        ];
        return $ret;
    }
    public function campos_leilao($post_id=false,$post_type=false,$data=false){
        $hidden_editor = '';
        if(Qlib::qoption('editor_padrao')=='laraberg'){
            $hidden_editor = 'hidden';
        }
        $user = Auth::user();
        if($post_id && !$data){
            $data = Post::Find($post_id);
        }
        $post_type = $post_type?$post_type:$this->post_type;
        $name_route = request()->route()->getName();
        $arr_status = [
            'edicao' => 'Em edição',
            'publicado' => 'Publicado',
        ];
        $ac = 'alt';
        $lc = new LeilaoController;
        $event_status = 'required';
        if(Qlib::is_backend()){
            $event_status = ' onchange=exibeStatus(this);';
            $arr_itens = $lc->array_contratos();
            $seg3 = request()->segment(3);
            if($seg3=='create'){
                $ac = 'cad';
                $arr_itens = $lc->array_contratos();
            }else{
                $arr_itens = $lc->array_contratos(@$data['post_author']);
            }
        }else{
            $seg1 = request()->segment(1);
            if($seg1){
                $arr_seg1=explode('-',$seg1);
                if(isset($arr_seg1[1]) && $arr_seg1[1]=='create'){
                    $ac = 'cad';
                }
            }
            $arr_itens = $lc->array_contratos($user->id);
        }
        if($ac=='cad'){
            @$data['token'] = uniqid();
            $data['post_title'] = 'Leilão '.$data['token'];
        }else{
            // if(count($arr_itens)==0 && isset($data['config']['itens']) && count($data['config']['itens'])){
            //     $arr_itens = $data['config']['itens'];
            // }
        }
        $ret = [
            'sep1'=>['label'=>'Dados do Leilão','active'=>false,'tam'=>'12','script'=>'<h5 class="pt-1">'.__('Dados do Leilão').'</h5>','type'=>'html_script','class_div'=>'bg-secondary'],
            'ID'=>['label'=>'Id','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'post_type'=>['label'=>'tipo de post','active'=>false,'type'=>'hidden','exibe_busca'=>'d-none','event'=>'','tam'=>'2','value'=>$post_type],
            'token'=>['label'=>'token','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2','value'=>@$data['token']],
            'config[origem]'=>['label'=>'origem','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2','cp_busca'=>'config][origem','value'=>$name_route],
            'post_author'=>[
                'label'=>'Responsável',
                'active'=>true,
                'type'=>'select',
                'arr_opc'=>Qlib::sql_array("SELECT id,nome FROM users WHERE ativo='s' AND id_permission>'1'",'nome','id'),'exibe_busca'=>'d-block',
                'event'=>'required',
                'tam'=>'12',
                'exibe_busca'=>true,
                'option_select'=>true,
                'class'=>'select2',
            ],
            'config[status]'=>[
                'label'=>'Status*',
                'active'=>true,
                'type'=>'select',
                'arr_opc'=>$arr_status,'exibe_busca'=>'d-block',
                'event'=>$event_status,
                'tam'=>'12',
                'class'=>'',
                'exibe_busca'=>true,
                'option_select'=>false,
                'cp_busca'=>'config][status',
            ],
            'post_name'=>['label'=>'Slug','active'=>false,'placeholder'=>'Ex.: nome-do-post','type'=>'hidden','exibe_busca'=>'d-block','event'=>'type_slug=true','tam'=>'12'],
            'config[itens][]'=>[
                'label'=>'Contratos*',
                'active'=>true,
                'type'=>'select_multiple',
                'arr_opc'=>$arr_itens,'exibe_busca'=>'d-block',
                'event'=>'required onchange=dataContratos(this)',
                'tam'=>'12',
                'class'=>'',
                'exibe_busca'=>true,
                'option_select'=>true,
                'cp_busca'=>'config][itens',
                'class'=>'select2',
            ],
            'post_title'=>['label'=>'Nome','active'=>true,'placeholder'=>'Ex.: Nome do produto ','type'=>'hidden','exibe_busca'=>'d-block','event'=>'required onkeyup=lib_typeSlug(this)','tam'=>'7','title'=>'Identificador do contrado pode ser nome ou número','value'=>@$data['post_title']],
            'config[total_horas]'=>['label'=>'Qtd. Horas','active'=>true,'placeholder'=>'','type'=>'number','exibe_busca'=>'d-block','event'=>'required','tam'=>'3','cp_busca'=>'config][total_horas','title'=>'Número total de horas'],
            'config[valor_r]'=>['label'=>'Valor','active'=>true,'placeholder'=>'','type'=>'moeda','exibe_busca'=>'d-block','event'=>'required','tam'=>'3','cp_busca'=>'config][valor_r','title'=>'Valor do reembolso'],
            // 'config[valor_h]'=>['label'=>'Valor Hora','active'=>true,'placeholder'=>'','type'=>'moeda','exibe_busca'=>'d-block','event'=>'required','tam'=>'3','cp_busca'=>'config][valor_h','title'=>'Valor do hora no contrato'],
            // 'config[lance_unit]'=>['label'=>'Lance por hora','active'=>true,'placeholder'=>'','type'=>'moeda','exibe_busca'=>'d-block','event'=>'required onkeyup=multiplicaHorasLance(this)','tam'=>'3','cp_busca'=>'config][lance_unit','title'=>'Valor unitário do Lançe'],
            'config[incremento]'=>['label'=>'Incremento','active'=>true,'placeholder'=>'','type'=>'moeda','exibe_busca'=>'d-block','event'=>'required','tam'=>'3','cp_busca'=>'config][incremento','title'=>'Valor de incremento em cada lançe'],
            'config[valor_venda]'=>['label'=>'Compre já','active'=>true,'placeholder'=>'','type'=>'moeda','exibe_busca'=>'d-block','event'=>'required','tam'=>'3','cp_busca'=>'config][valor_venda','title'=>'Valor para venda sem leilão'],
            // 'post_date_gmt'=>['label'=>'Data do decreto','active'=>true,'placeholder'=>'','type'=>'date','exibe_busca'=>'d-block','event'=>'','tam'=>'4'],
            'post_name'=>['label'=>'Slug','active'=>false,'placeholder'=>'Ex.: nome-do-post','type'=>'hidden','exibe_busca'=>'d-block','event'=>'type_slug=true','tam'=>'12'],
            //'post_excerpt'=>['label'=>'Resumo (Opcional)','active'=>true,'placeholder'=>'Uma síntese do um post','type'=>'textarea','exibe_busca'=>'d-block','event'=>'','tam'=>'12'],
            //'ativo'=>['label'=>'Liberar','active'=>true,'type'=>'chave_checkbox','value'=>'s','valor_padrao'=>'s','exibe_busca'=>'d-block','event'=>'','tam'=>'3','arr_opc'=>['s'=>'Sim','n'=>'Não']],
            'post_content'=>['label'=>'Descrição','active'=>false,'type'=>'textarea','exibe_busca'=>'d-block','event'=>$hidden_editor,'tam'=>'12','class_div'=>'','class'=>'editor-padrao summernote','placeholder'=>__('Escreva seu conteúdo aqui..')],
            // 'post_status'=>['label'=>'Status','active'=>true,'type'=>'chave_checkbox','value'=>'publish','valor_padrao'=>'publish','exibe_busca'=>'d-block','event'=>'','tam'=>'3','arr_opc'=>['publish'=>'Publicado','pending'=>'Despublicado']],
        ];
        if(Qlib::is_backend()){
            $ret['post_status'] = ['label'=>'Situação','active'=>true,'type'=>'chave_checkbox','value'=>'publish','valor_padrao'=>'publish','exibe_busca'=>'d-block','event'=>'','tam'=>'12','arr_opc'=>['publish'=>'Publicado','pending'=>'Despublicado']];
        }
        if(Qlib::is_frontend()){
            $value_author = false;
            if(!$data){
                $value_author = Auth::id();
            }
            $ret['post_author'] = ['label'=>'Responsável','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','value'=>$value_author,'tam'=>'2'];
        }
        return $ret;
    }
    public function campos_pacotes($sec=false){
        $hidden_editor = '';
        if(Qlib::qoption('editor_padrao')=='laraberg'){
            $hidden_editor = 'hidden';
        }
        $ret = [
            'ID'=>['label'=>'Id','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'post_type'=>['label'=>'tipo de post','active'=>false,'type'=>'hidden','exibe_busca'=>'d-none','event'=>'','tam'=>'2','value'=>$this->post_type],
            'token'=>['label'=>'token','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'post_name'=>['label'=>'Slug','active'=>false,'placeholder'=>'Ex.: nome-do-post','type'=>'hidden','exibe_busca'=>'d-block','event'=>'type_slug=true','tam'=>'12'],
            'post_title'=>['label'=>'Nome','active'=>true,'placeholder'=>'Ex.: Nome do produto ','type'=>'text','exibe_busca'=>'d-block','event'=>'onkeyup=lib_typeSlug(this)','tam'=>'12'],
            // 'config[total_horas]'=>['label'=>'Horas','active'=>true,'placeholder'=>'','type'=>'number','exibe_busca'=>'d-block','event'=>'','tam'=>'2','cp_busca'=>'config][total_horas','title'=>'Número total de horas'],
            // 'post_date_gmt'=>['label'=>'Data do decreto','active'=>true,'placeholder'=>'','type'=>'date','exibe_busca'=>'d-block','event'=>'','tam'=>'3'],
            //'post_excerpt'=>['label'=>'Resumo (Opcional)','active'=>true,'placeholder'=>'Uma síntese do um post','type'=>'textarea','exibe_busca'=>'d-block','event'=>'','tam'=>'12'],
            //'ativo'=>['label'=>'Liberar','active'=>true,'type'=>'chave_checkbox','value'=>'s','valor_padrao'=>'s','exibe_busca'=>'d-block','event'=>'','tam'=>'3','arr_opc'=>['s'=>'Sim','n'=>'Não']],
            'post_content'=>['label'=>'Conteudo','active'=>false,'type'=>'textarea','exibe_busca'=>'d-block','event'=>$hidden_editor,'tam'=>'12','class_div'=>'','class'=>'editor-padrao summernote','placeholder'=>__('Escreva seu conteúdo aqui..')],
            'post_status'=>['label'=>'Status','active'=>true,'type'=>'chave_checkbox','value'=>'publish','valor_padrao'=>'publish','exibe_busca'=>'d-block','event'=>'','tam'=>'3','arr_opc'=>['publish'=>'Publicado','pending'=>'Despublicado']],
        ];
        return $ret;
    }
    public function campos_paginas($post_id=false){
        $hidden_editor = '';
        $data = false;
        $user = Auth::user();
        if($post_id){
            $data = Post::Find($post_id);
        }
        if(Qlib::qoption('editor_padrao')=='laraberg'){
            $hidden_editor = 'hidden';
        }
        $ret = [
            'ID'=>['label'=>'Id','active'=>true,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'post_type'=>['label'=>'tipo de post','active'=>false,'type'=>'hidden','exibe_busca'=>'d-none','event'=>'','tam'=>'2','value'=>$this->post_type],
            'token'=>['label'=>'token','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'url_view'=>[
                'label'=>__('Link no site'),
                'type'=>'html',
                'active'=>false,
                'script'=>'admin.posts.link_view',
                'script_show'=>'admin.posts.link_view',
                'dados'=>$data,
            ],
            'post_name'=>['label'=>'Slug','active'=>false,'placeholder'=>'Ex.: nome-do-post','type'=>'hidden','exibe_busca'=>'d-block','event'=>'type_slug=true','tam'=>'12'],
            'post_title'=>['label'=>'Nome','active'=>true,'placeholder'=>'Ex.: Nome da página ','type'=>'text','exibe_busca'=>'d-block','event'=>'onkeyup=lib_typeSlug(this)','tam'=>'12'],
            'config[permission][]'=>[
                'label'=>'Permissão de visualização (Visível para todos se não selecionar)',
                'active'=>true,
                'type'=>'select_multiple',
                'arr_opc'=>Qlib::sql_array("SELECT id,name FROM permissions WHERE active='s' AND id >='".$user->id_permission."'",'name','id'),'exibe_busca'=>'d-block',
                'event'=>'',
                'tam'=>'12',
                'cp_busca'=>'config][permission'
            ],
            'post_content'=>['label'=>'Conteudo','active'=>false,'type'=>'textarea','exibe_busca'=>'d-block','event'=>$hidden_editor,'tam'=>'12','class_div'=>'','class'=>'editor-padrao summernote','placeholder'=>__('Escreva seu conteúdo aqui..')],
            'post_status'=>['label'=>'Status','active'=>true,'type'=>'chave_checkbox','value'=>'publish','valor_padrao'=>'publish','exibe_busca'=>'d-block','event'=>'','tam'=>'3','arr_opc'=>['publish'=>'Publicado','pending'=>'Despublicado']],
        ];
        return $ret;
    }
    public function campos_menus($sec=false){
        $hidden_editor = '';
        if(Qlib::qoption('editor_padrao')=='laraberg'){
            $hidden_editor = 'hidden';
        }
        $ret = [
            'ID'=>['label'=>'Id','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'post_type'=>['label'=>'tipo de post','active'=>false,'type'=>'hidden','exibe_busca'=>'d-none','event'=>'','tam'=>'2','value'=>$this->post_type],
            'token'=>['label'=>'token','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'post_title'=>['label'=>'Nome','active'=>true,'placeholder'=>'Ex.: Nome da página ','type'=>'text','exibe_busca'=>'d-block','event'=>'onkeyup=lib_typeSlug(this)','tam'=>'10'],
            'menu_order'=>['label'=>'Ordem','active'=>true,'type'=>'number','exibe_busca'=>'d-block','event'=>'','tam'=>'2','class_div'=>'','class'=>''],
            // 'post_name'=>['label'=>'Slug','active'=>false,'placeholder'=>'Ex.: nome-do-post','type'=>'hidden','exibe_busca'=>'d-block','event'=>'type_slug=true','tam'=>'12'],
            'post_name'=>[
                'label'=>'Página*',
                'active'=>true,
                'type'=>'selector',
                'data_selector'=>[
                    'campos'=>$this->campos_paginas(),
                    'route_index'=>route('paginas.index'),
                    'id_form'=>'frm-paginas',
                    'action'=>route('paginas.store'),
                    'campo_id'=>'id',
                    'campo_bus'=>'post_name',
                    'label'=>'Nome da página',
                ],'arr_opc'=>Qlib::sql_array("SELECT ID,post_name FROM posts WHERE post_status='publish' AND post_type='pagina'",'post_name','ID'),'exibe_busca'=>'d-block',
                'event'=>'',
                'tam'=>'12',
                'class'=>'select2'
            ],
            'post_status'=>['label'=>'Status','active'=>true,'type'=>'chave_checkbox','value'=>'publish','valor_padrao'=>'publish','exibe_busca'=>'d-block','event'=>'','tam'=>'3','arr_opc'=>['publish'=>'Ativado','pending'=>'Desativado']],
        ];
        return $ret;
    }
    public function campos($post_id=false,$type=false){
        // $sec = $sec?$sec:$this->sec;
        $ret = false;
        $type = $type?$type:$this->post_type;
        if($type=='produtos'){
            $ret = $this->campos_produtos($post_id);
        }elseif($type=='menus'){
            $ret = $this->campos_menus($post_id);
        }elseif($type=='paginas'){
            $ret = $this->campos_paginas($post_id);
        }elseif($type=='pacotes_lance'){
            $ret = $this->campos_pacotes($post_id);
        }elseif($type=='leilao' || $type=='leiloes_adm'){
            $ret = $this->campos_leilao($post_id);
        }
        return $ret;
    }
    public function index()
    {
        //$this->authorize('is_admin', $user);
        $this->authorize('ler', $this->routa);
        //Selecionar o tipo de postagem
        $selTypes = $this->selectType($this->sec);
        $title = $selTypes['title'];
        $titulo = $title;
        $queryPost = $this->queryPost($_GET);
        $queryPost['config']['exibe'] = 'html';
        $routa = $this->routa;
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
            'routa'=>$routa,
            'view'=>$this->view,
            'i'=>0,
        ];

        //REGISTRAR EVENTOS
        (new EventController)->listarEvent(['tab'=>$this->tab,'this'=>$this]);

        return view($this->view.'.index',$ret);
    }
    public function selectType($sec=false)
    {
        $ret['exec']=false;
        $ret['title']=false;
        $title = false;
        if($sec){
            $name = request()->route()->getName();
            if($sec=='posts'){
                $title = __('Cadastro de postagens');
            }elseif($sec=='produtos'){
                $title = __('Cadastro de Horas');
                if($name=='produtos.edit'){
                    $title = __('Editar Cadastro de Horas');
                }
            }elseif($sec=='leiloes_adm'){
                $title = __('Cadastro de leilao');
                if($name=='leilao.edit'){
                    $title = __('Editar Cadastro de leilao');
                }
            }elseif($sec=='paginas'){
                $title = __('Cadastro de paginas');
            }elseif($sec=='menus'){
                $title = __('Cadastro de menus');
            }elseif($sec=='pacotes_lances'){
                $title = __('Cadastro de pacotes');
            }else{
                $title = __('Sem titulo');
            }
        }
        $ret['title'] = $title;
        return $ret;
    }
    public function addMenu($page_id=false){
        $ret = false;
        if($page_id){
            $dPage = Post::Find($page_id);
            if(!$dPage->count()){
                return $ret;
            }
            $page_title = $dPage['post_title'] ? $dPage['post_title'] : null;
            $page_status = $dPage['post_status'] ? $dPage['post_status'] : null;
            $page_author = $dPage['post_author'] ? $dPage['post_author'] : Auth::id();
            $proximo_menu = (int)(Post::max('menu_order'))+1;
            $ds = [
                'post_date_gmt'=>Qlib::dataLocalDb(),
                'post_title'=>$page_title,
                'post_title'=>$page_title,
                'post_name'=>$page_id,
                'post_status'=>$page_status,
                'post_modified'=>Qlib::dataLocalDb(),
                'post_modified_gnt'=>Qlib::dataLocalDb(),
                'post_type'=>'menu',
                'menu_order'=>$proximo_menu,
                'token'=>uniqid(),
            ];
            $ret = Post::create($ds);
        }
        return $ret;
    }
    public function create(User $user)
    {
        $this->authorize('is_admin2', $user);
        //Selecionar o tipo de postagem
        $selTypes = $this->selectType($this->sec);
        $title = $selTypes['title'];
        $titulo = $title;
        $config = [
            'ac'=>'cad',
            'frm_id'=>'frm-posts',
            'route'=>$this->routa,
            'view'=>$this->view,
            'arquivos'=>'jpeg,jpg,png',
        ];
        $value = [
            'token'=>uniqid(),
        ];
        $campos = $this->campos();
         //REGISTRAR EVENTO CADASTRO
         $regev = Qlib::regEvent(['action'=>'create','tab'=>$this->tab,'config'=>[
            'obs'=>'Abriu tela de cadastro',
            'link'=>$this->routa,
            ]
        ]);

        return view($this->view.'.createedit',[
            'config'=>$config,
            'title'=>$title,
            'titulo'=>$titulo,
            'campos'=>$campos,
            'value'=>$value,
        ]);
    }
    public function salvarPostMeta($config = null)
    {
        $post_id = isset($config['post_id'])?$config['post_id']:false;
        $meta_key = isset($config['meta_key'])?$config['meta_key']:false;
        $meta_value = isset($config['meta_value'])?$config['meta_value']:false;
        $ret = false;
        if($post_id&&$meta_key&&$meta_value){
            $verf = Qlib::totalReg('wp_postmeta',"WHERE post_id='$post_id' AND meta_key='$meta_key'");
            if($verf){
                $ret=DB::table('wp_postmeta')->where('post_id',$post_id)->where('meta_key',$meta_key)->update([
                    'meta_value'=>$meta_value,
                ]);
            }else{
                $ret=DB::table('wp_postmeta')->insert([
                    'post_id'=>$post_id,
                    'meta_value'=>$meta_value,
                    'meta_key'=>$meta_key,
                ]);
            }
            //$ret = DB::table('wp_postmeta')->storeOrUpdate();
        }
        return $ret;
    }
    public function store(StorePostRequest $request)
    {
        $dados = $request->all();
        if(Qlib::is_backend()){
            $this->authorize('create', $this->routa);
        }else{
            if(isset($dados['post_type']) && $dados['post_type']=='leiloes_adm'){
                $this->authorize('is_logado');
                $dados['post_status'] = 'pending';
            }else{
                $this->authorize('create', $this->routa);
            }
        }
        $ajax = isset($dados['ajax'])?$dados['ajax']:'n';
        //$dados['ativo'] = isset($dados['ativo'])?$dados['ativo']:'n';
        $userLogadon = Auth::id();
        $dados['post_author'] = $userLogadon;
        $dados['token'] = !empty($dados['token'])?$dados['token']:uniqid();
        // if($this->i_wp=='s' && isset($dados['post_type'])){
        //     //$endPoint = isset($dados['endPoint'])?$dados['endPoint']:$dados['post_type'].'s';
        //     $endPoint = 'post';
        //     $params = $this->geraParmsWp($dados);

        //     if($params){
        //         $salvar = $this->wp_api->exec2([
        //             'endPoint'=>$endPoint,
        //             'method'=>'POST',
        //             'params'=>$params
        //         ]);
        //         if(isset($salvar['arr']['id']) && $salvar['arr']['id']){
        //             $mens = $this->label.' cadastrado com sucesso!';
        //             $color = 'success';
        //             $idCad = $salvar['arr']['id'];
        //         }else{
        //             $mens = 'Erro ao salvar '.$this->label.'';
        //             $color = 'danger';
        //             $idCad = 0;
        //             if(isset($salvar['arr']['status'])&&$salvar['arr']['status']==400 && isset($salvar['arr']['message']) && !empty($salvar['arr']['message'])){
        //                 $mens = $salvar['arr']['message'];
        //             }
        //         }
        //     }else{
        //         $color = 'danger';
        //         $mens = 'Parametros invalidos!';
        //     }
        // }else{
            $dados['post_status'] = isset($dados['post_status'])?$dados['post_status']:'pending';
            $origem = isset($dados['config']['origem'])?$dados['config']['origem']:false;
            $salvar = Post::create($dados);
            $sm = false;
            if(isset($salvar->id) && $salvar->id){
                $mens = $this->label.' cadastrado com sucesso!';
                $color = 'success';
                $idCad = $salvar->id;
                //REGISTRAR EVENTO STORE
                if($salvar->id){
                    //SALVAR MENU QUANDO ADICIONA UMA PÁGINA
                    if($dados['post_type'] == 'paginas'){
                        $sm = $this->addMenu($idCad);
                    }
                    if($dados['post_type'] == 'leiloes_adm'){
                        $post_title = __('Leilão').' '.Qlib::zerofill($idCad,4);
                        $sm = Post::where('id',$idCad)->update([
                                'post_title'=>$post_title,
                                'post_name'=>Qlib::createSlug($post_title),
                            ]);
                    }
                    $regev = Qlib::regEvent(['action'=>'store','tab'=>$this->tab,'config'=>[
                        'obs'=>'Cadastro guia Id '.$salvar->id,
                        'link'=>$this->routa,
                        ]
                    ]);
                }
            }else{
                $mens = 'Erro ao salvar '.$this->label.'';
                $color = 'danger';
                $idCad = 0;
            }
        // }
        //REGISTRAR EVENTOS
        (new EventController)->listarEvent(['tab'=>$this->tab,'id'=>@$salvar->id,'this'=>$this]);

        $route = $this->routa.'.index';
        $ret = [
            'mens'=>$mens,
            'color'=>$color,
            'idCad'=>$idCad,
            'exec'=>true,
            'dados'=>$dados
        ];
        if(@$sm)
            $ret['sm'] = $sm;
        if($ajax=='s'){
            $r_redirect = $this->routa;
            if($dados['post_type']=='leiloes_adm' && Qlib::is_frontend()){
                //requisição proveniente do site pora o post_type leiloes_adm
                $ret['redirect'] = url('/').'/'.Qlib::get_slug_post_by_id('18');
                $ret['return'] = url('/').'/'.Qlib::get_slug_post_by_id('18').'?idCad='.@$salvar->id;
            }else{
                $ret['return'] = route($route).'?idCad='.$idCad;
                $ret['redirect'] = route($r_redirect.'.edit',['id'=>$idCad]);
            }
            return response()->json($ret);
        }else{
            return redirect()->route($route,$ret);
        }
    }

    public function show($id)
    {
        $dados = Post::findOrFail($id);
        $this->authorize('ler', $this->routa);
        if(!empty($dados)){
            $title = 'Visualização da decretos';
            $titulo = $title;
            //dd($dados);
            $dados['ac'] = 'alt';
            if(isset($dados['config'])){
                $dados['config'] = Qlib::lib_json_array($dados['config']);
            }
            $listFiles = false;
            //$dados['renda_familiar'] = number_format($dados['renda_familiar'],2,',','.');
            $campos = $this->campos();
            if(isset($dados['token'])){
                $listFiles = _upload::where('token_produto','=',$dados['token'])->get();
            }
            $config = [
                'ac'=>'alt',
                'frm_id'=>'frm-familias',
                'route'=>$this->routa,
                'view'=>$this->view,
                'id'=>$id,
                'class_card1'=>'col-md-8',
                'class_card2'=>'col-md-4',
            ];

            if(!$dados['matricula'])
                $config['display_matricula'] = 'd-none';
            if(isset($dados['config']) && is_array($dados['config'])){
                foreach ($dados['config'] as $key => $value) {
                    if(is_array($value)){

                    }else{
                        $dados['config['.$key.']'] = $value;
                    }
                }
            }
            $subdomain = Qlib::get_subdominio();
            if(Gate::allows('is_admin2', [$this->routa]) && $subdomain !='cmd'){
                $config['eventos'] = (new EventController)->listEventsPost(['post_id'=>$id]);
            }else{
                $config['class_card1'] = 'col-md-12';
                $config['class_card2'] = 'd-none';
            }
            $ret = [
                'value'=>$dados,
                'config'=>$config,
                'title'=>$title,
                'titulo'=>$titulo,
                'listFiles'=>$listFiles,
                'campos'=>$campos,
                'routa'=>$this->routa,
                'routa'=>$this->routa,
                'exec'=>true,
            ];
            //REGISTRAR EVENTOS
            (new EventController)->listarEvent(['tab'=>$this->tab,'this'=>$this]);
            return view('padrao.show',$ret);
        }else{
            $ret = [
                'exec'=>false,
            ];
            return redirect()->route($this->routa.'.index',$ret);
        }
    }
    public function geraParmsWp($dados=false)
    {
        $params=false;
        if($dados && is_array($dados)){

            $arr_parm = [
                'post_name'=>'post_name',
                'post_title'=>'post_title',
                'post_content'=>'post_content',
                'post_excerpt'=>'post_excerpt',
                'post_status'=>'post_status',
                'post_type'=>'post_type',
            ];
            foreach ($dados as $kp => $vp) {
                if(isset($arr_parm[$kp])){
                    $params[$kp] = $dados[$kp];
                }
            }
        }
        return $params;
    }

    public function edit($post,User $user)
    {
        $id = $post;
        $dados = Post::where('id',$id)->where('post_type',$this->post_type)->get();
        $routa = 'posts';
        $this->authorize('ler', $this->routa);
        if($dados->count()){
            $selTypes = $this->selectType($this->sec);
            $title = $selTypes['title'];
            $titulo = $title;
            $dados[0]['ac'] = 'alt';
            if(isset($dados[0]['config'])){
                $dados[0]['config'] = Qlib::lib_json_array($dados[0]['config']);
            }
            if(isset($dados[0]['post_date_gmt'])){
                $dExec = explode(' ',$dados[0]['post_date_gmt']);
                if(isset($dExec[0])){
                    $dados[0]['post_date_gmt'] = $dExec[0];
                }
            }
            //dd($dados[0]['config']['numero']);
            $listFiles = false;
            $campos = $this->campos($id);
            if($this->i_wp=='s' && !empty($dados[0]['post_name'])){
                $dadosApi = $this->wp_api->list([
                    'params'=>'/'.$dados[0]['post_name'].'?_type='.$dados[0]['post_type'],
                ]);
                if(isset($dadosApi['arr']['arquivos'])){
                    $listFiles = $dadosApi['arr']['arquivos'];
                }
            }else{
                if(isset($dados[0]['token'])){
                    $listFiles = _upload::where('token_produto','=',$dados[0]['token'])->get();
                }
            }
            $config = [
                'ac'=>'alt',
                'frm_id'=>'frm-posts',
                'route'=>$this->routa,
                'view'=>$this->view,
                'sec'=>$this->sec,
                'id'=>$id,
            ];
            $config['media'] = [
                'files'=>'jpeg,jpg,png,pdf,PDF',
                'select_files'=>'unique',
                'field_media'=>'post_parent',
                'post_parent'=>$id,
            ];
            //IMAGEM DESTACADA
            if(isset($dados[0]['ID']) && $this->i_wp=='s'){
                $imagem_destacada = DB::table('wp_postmeta')->
                where('post_id',$dados[0]['ID'])->
                where('meta_key','imagem_destacada')->get();
                if(isset($imagem_destacada[0])){
                    $dados[0]['imagem_destacada'] = $imagem_destacada[0];
                }
            }elseif(isset($dados[0]['post_parent'])){
                // $link_img = Qlib::buscaValorDb([
                //     'tab'=>'posts',
                //     'campo_bus'=>'ID',
                //     'valor'=>$dados[0]['post_parent'],
                //     'select'=>'guid',
                //     'compleSql'=>''
                // ]);

                $imgd = Post::where('ID', '=', $dados[0]['post_parent'])->where('post_status','=','publish')->get();
                if( $imgd->count() > 0 ){
                    // dd($imgd[0]['guid']);
                    $dados[0]['imagem_destacada'] = Qlib::qoption('storage_path'). '/'.$imgd[0]['guid'];
                }
            }
            //REGISTRAR EVENTOS
            (new EventController)->listarEvent(['tab'=>$this->tab,'this'=>$this]);

            $ret = [
                'value'=>$dados[0],
                'config'=>$config,
                'title'=>$title,
                'titulo'=>$titulo,
                'listFiles'=>$listFiles,
                'campos'=>$campos,
                'exec'=>true,
            ];
            return view($this->view.'.createedit',$ret);
        }else{
            $ret = [
                'exec'=>false,
            ];
            return redirect()->route('home',$ret);
        }
    }

    public function update(StorePostRequest $request, $id)
    {
        $dados = $request->all();
        if(Qlib::is_backend()){
            $this->authorize('update', $this->routa);
        }else{
            if(isset($dados['post_type']) && $dados['post_type']=='leiloes_adm'){
                $this->authorize('is_logado');
                $dados['post_status'] = 'pending';
            }else{
                $this->authorize('update', $this->routa);
            }
        }

        $data = [];
        $mens=false;
        $color=false;
        $ajax = isset($dados['ajax'])?$dados['ajax']:'n';
        $d_meta = false;
        if(isset($dados['d_meta'])){
            $d_meta = $dados['d_meta'];
            if(isset($dados['ID'])){
                $d_meta['post_id'] = $dados['ID'];

            }
            unset($dados['d_meta']);
        }
        foreach ($dados as $key => $value) {
            if($key!='_method'&&$key!='_token'&&$key!='ac'&&$key!='ajax'){
                /*if($key=='data_batismo' || $key=='data_nasci'){
                    if($value=='0000-00-00' || $value=='00/00/0000'){
                    }else{
                        $data[$key] = Qlib::dtBanco($value);
                    }
                }else{*/
                    $data[$key] = $value;
                //}
            }
        }
        $data['post_status'] = isset($data['post_status'])?$data['post_status']:'pending';
        $userLogadon = Auth::id();
        $data['post_author'] = $userLogadon;
        $data['token'] = !empty($data['token'])?$data['token']:uniqid();
        if(isset($dados['config'])){
            $dados['config'] = Qlib::lib_array_json($dados['config']);
        }
        $atualizar=false;
        if(!empty($data)){
            // if($this->i_wp=='s' && isset($dados['post_type'])){
            //     $endPoint = 'post/'.$id;
            //     $arr_parm = [
            //         'post_name'=>'post_name',
            //         'post_title'=>'post_title',
            //         'post_content'=>'post_content',
            //         'post_excerpt'=>'post_excerpt',
            //         'post_status'=>'post_status',
            //         'post_type'=>'post_type',
            //     ];
            //     $params = $this->geraParmsWp($dados);
            //     if($params){
            //         $atualizar = $this->wp_api->exec2([
            //             'endPoint'=>$endPoint,
            //             'method'=>'PUT',
            //             'params'=>$params
            //         ]);
            //         if(isset($atualizar['exec']) && $atualizar['exec']){
            //             $mens = $this->label.' cadastrado com sucesso!';
            //             $color = 'success';
            //             $id = $id;
            //         }else{
            //             $mens = 'Erro ao salvar '.$this->label.'';
            //             $color = 'danger';
            //             $id = 0;
            //             if(isset($atualizar['arr']['status'])&&$atualizar['arr']['status']==400 && isset($atualizar['arr']['message']) && !empty($atualizar['arr']['message'])){
            //                 $mens = $atualizar['arr']['message'];
            //             }
            //         }
            //     }else{
            //         $color = 'danger';
            //         $mens = 'Parametros invalidos!';
            //     }
            // }else{
                $atualizar=Post::where('id',$id)->update($data);
                if($atualizar){
                    $mens = $this->label.' cadastrado com sucesso!';
                    $color = 'success';
                    $id = $id;
                    //REGISTRAR EVENTOS
                    (new EventController)->listarEvent(['tab'=>$this->tab,'this'=>$this]);

                }else{
                    $mens = 'Erro ao salvar '.$this->label.'';
                    $color = 'danger';
                    $id = 0;
                }
            //}

            $route = $this->routa.'.index';
            $ret = [
                'exec'=>$atualizar,
                'id'=>$id,
                'mens'=>$mens,
                'color'=>$color,
                'idCad'=>$id,
                'return'=>$route,
            ];
            if($atualizar && $d_meta && $this->i_wp=='s'){
                $ret['salvarPostMeta'] = $this->salvarPostMeta($d_meta);
            }

        }else{
            $route = $this->routa.'.edit';
            $ret = [
                'exec'=>false,
                'id'=>$id,
                'mens'=>'Erro ao receber dados',
                'color'=>'danger',
            ];
        }
        if($ajax=='s'){
            if($data['post_type']=='leiloes_adm' && Qlib::is_frontend()){
                //requisição proveniente do site pora o post_type leiloes_adm
                $ret['return'] = url('/').'/'.Qlib::get_slug_post_by_id('18').'?idCad='.@$id;
            }else{
                $ret['return'] = route($route).'?idCad='.$id;
            }
            return response()->json($ret);
        }else{
            return redirect()->route($route,$ret);
        }
    }

    public function destroy($id,Request $request)
    {
        $config = $request->all();

        $routa = $this->routa;
        $ajax =  isset($config['ajax'])?$config['ajax']:'n';
        if (!$post = Post::find($id)){
            if($ajax=='s'){
                $ret = response()->json(['mens'=>'Registro não encontrado!','color'=>'danger','return'=>route($this->routa.'.index')]);
            }else{
                $ret = redirect()->route($routa.'.index',['mens'=>'Registro não encontrado!','color'=>'danger']);
            }
            return $ret;
        }
        if(Qlib::is_backend()){
            $this->authorize('delete', $this->routa);
        }else{
            if(isset($post['post_type']) && $post['post_type']=='leiloes_adm'){
                $this->authorize('is_logado');
            }else{
                $this->authorize('delete', $this->routa);
            }
        }

        $color = 'success';
        $mens = 'Registro deletado com sucesso!';
        // if($this->i_wp=='s'){
        //     $endPoint = 'post/'.$id;
        //     $delete = $this->wp_api->exec2([
        //         'endPoint'=>$endPoint,
        //         'method'=>'DELETE'
        //     ]);
        //     if($delete['exec']){
        //         $mens = 'Registro '.$id.' deletado com sucesso!';
        //         $color = 'success';
        //     }else{
        //         $color = 'danger';
        //         $mens = 'Erro ao excluir!';
        //     }
        // }else{
            // Post::where('id',$id)->delete();
            $atualizar=Post::where('id',$id)->update(['post_status' => 'trash']);
            if($atualizar){

                $mens = __('Registro ').$id.__(' deletado com sucesso!');
                $color = 'success';
                //REGISTRAR EVENTO
                $regev = Qlib::regEvent(['action'=>'delete','tab'=>$this->tab,'config'=>[
                    'obs'=>'Exclusão de cadastro Id '.$id,
                    'link'=>$this->routa,
                    ]
                ]);
            }else{
                $mens = __('Erro ao atualizar ').$this->label.'';
                $color = 'danger';
                $id = 0;
            }

        // }
        if($ajax=='s'){
            if($post['post_type']=='leiloes_adm' && Qlib::is_frontend()){
                $return = url('/').'/'.Qlib::get_slug_post_by_id('18');
            }else{
                $return = $this->routa;

            }
            $ret['return'] = url('/').'/'.Qlib::get_slug_post_by_id('18').'?idCad='.@$id;
            $ret = response()->json(['mens'=>__($mens),'color'=>$color,'return'=>$return]);
        }else{
            $ret = redirect()->route($routa.'.index',['mens'=>$mens,'color'=>$color]);
        }
        return $ret;
    }

}
