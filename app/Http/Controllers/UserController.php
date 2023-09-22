<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\_upload;
use App\Models\Post;
use App\Models\User;
use stdClass;
use App\Qlib\Qlib;
use App\Rules\FullName;
use App\Rules\RightCpf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    protected $user;
    public $routa;
    public $label;
    public $view;
    public $tab;

    public $access_token;
	public $url_plataforma;
	public $url;
	public $tk_conta;
	public $seg1;

    public function __construct()
    {
        $user = Auth::user();
        // $this->middleware('auth');
        $this->user = $user;
        if(Qlib::is_backend()){
            $this->routa = 'users';
        }else{
            $this->routa = 'users_site';
        }
        $this->label = 'Usuários';
        $this->view = 'padrao';
        $this->tab = 'users';
        $this->credenciais();
        $this->seg1 = request()->segment(1);
        //$seg2 = request()->segment(2);
    }
    public function credenciais(){
		$this->access_token = 'NWM5OGMyZGRiOTAzMS41ZmQwZGQyNTUzZGI0LjQx';
		$this->url 		 	= 'https://api.ctloja.com.br/v1';
		$this->tk_conta	 	= '624384509209d';
		//$this->tk_conta	 	= '60b77bc73e7c0';
	}

    public function queryUsers($get=false,$config=false)
    {
        $ret = false;
        $get = isset($_GET) ? $_GET:[];
        $ano = date('Y');
        $mes = date('m');
        $config = [
            'limit'=>isset($get['limit']) ? $get['limit']: 50,
            'order'=>isset($get['order']) ? $get['order']: 'desc',
        ];
        $logado = Auth::user();
        $user =  User::where('id_permission','>=',$logado->id_permission)->orderBy('id',$config['order']);
        //$user =  DB::table('users')->where('ativo','s')->orderBy('id',$config['order']);

        $users = new stdClass;
        $campos = isset($_SESSION['campos_users_exibe']) ? $_SESSION['campos_users_exibe'] : $this->campos();
        $tituloTabela = 'Lista de todos cadastros';
        $arr_titulo = false;
        if(isset($get['filter'])){
                $titulo_tab = false;
                $i = 0;
                foreach ($get['filter'] as $key => $value) {
                    if(!empty($value)){
                        if($key=='id'){
                            $user->where($key,'LIKE', $value);
                            $titulo_tab .= 'Todos com *'. $campos[$key]['label'] .'% = '.$value.'& ';
                            $arr_titulo[$campos[$key]['label']] = $value;
                        }else{
                            $user->where($key,'LIKE','%'. $value. '%');
                            if($campos[$key]['type']=='select'){
                                $value = $campos[$key]['arr_opc'][$value];
                            }
                            $arr_titulo[$campos[$key]['label']] = $value;
                            $titulo_tab .= 'Todos com *'. $campos[$key]['label'] .'% = '.$value.'& ';
                        }
                        $i++;
                    }
                }
                if($titulo_tab){
                    $tituloTabela = 'Lista de: &'.$titulo_tab;
                }
                $fm = $user;
                if($config['limit']=='todos'){
                    $user = $user->get();
                }else{
                    $user = $user->paginate($config['limit']);
                }
        }else{
            $fm = $user;
            if($config['limit']=='todos'){
                $user = $user->get();
            }else{
                $user = $user->paginate($config['limit']);
            }
        }
        $users->todos = $fm->count();
        $users->esteMes = $fm->whereYear('created_at', '=', $ano)->whereMonth('created_at','=',$mes)->get()->count();
        $users->ativos = $fm->where('ativo','=','s')->get()->count();
        $users->inativos = $fm->where('ativo','=','n')->get()->count();
        // dd($user);
        $ret['user'] = $user;
        $ret['user_totais'] = $users;
        $ret['arr_titulo'] = $arr_titulo;
        $ret['campos'] = $campos;
        $ret['config'] = $config;
        $ret['tituloTabela'] = $tituloTabela;
        $ret['config']['resumo'] = [
            'todos_registro'=>['label'=>'Todos cadastros','value'=>$users->todos,'icon'=>'fas fa-calendar'],
            'todos_mes'=>['label'=>'Cadastros recentes','value'=>$users->esteMes,'icon'=>'fas fa-calendar-times'],
            'todos_ativos'=>['label'=>'Cadastros ativos','value'=>$users->ativos,'icon'=>'fas fa-check'],
            'todos_inativos'=>['label'=>'Cadastros inativos','value'=>$users->inativos,'icon'=>'fas fa-archive'],
        ];
        return $ret;
    }
    public function campos($dados=false,$local='index'){
        $logado = Auth::check();
        if($logado){
            $user = Auth::user();
            $permission = new admin\UserPermissions($user);
            $campos_permissions = $permission->campos();
            $arr_opc = Qlib::sql_array("SELECT id,name FROM permissions WHERE active='s' AND id >='".$user->id_permission."'",'name','id');
        }else{
            $campos_permissions = false;
            $user = false;
            $arr_opc = [];
        }
        if(Qlib::is_backend()){
            $origem = 'admin';
        }else{
            $origem = 'site';
        }
        if(isset($dados['tipo_pessoa']) && $dados['tipo_pessoa']){
            $_GET['tipo'] = $dados['tipo_pessoa'];
        }
        $sec = isset($_GET['tipo'])?$_GET['tipo']:'pf';
        if($sec=='pf'){
            $lab_nome = 'Nome completo *';
            $lab_cpf = 'CPF *';
            $displayPf = '';
            $displayPj = 'd-none';
        }elseif($sec=='pj'){
            $lab_nome = 'Nome do responsável *';
            $lab_cpf = 'CPF do responsável*';
            $displayPf = 'd-none';
            $displayPj = '';
        }else{
            $lab_nome = 'Nome completo *';
            $lab_cpf = 'CPF *';
            $displayPf = '';
            $displayPj = 'd-none';
        }
        $ret = [
            'id'=>['label'=>'Id','active'=>true,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'sep0'=>['label'=>'informações','active'=>false,'type'=>'html_script','exibe_busca'=>'d-none','event'=>'','tam'=>'12','script'=>'<h4 class="text-left">'.__('Informe os dados').'</h4><hr>','script_show'=>''],
            'name'=>['label'=>'Nome completo','active'=>true,'placeholder'=>'','type'=>'text','exibe_busca'=>'d-block','event'=>'','tam'=>'12'],
            'token'=>['label'=>'token','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'config[celular]'=>['label'=>'Telefone celular','active'=>true,'type'=>'tel','tam'=>'3','exibe_busca'=>'d-block','event'=>'onblur=mask(this,clientes_mascaraTelefone); onkeypress=mask(this,clientes_mascaraTelefone);','cp_busca'=>'config][celular'],
            'email'=>['label'=>'Email','active'=>true,'type'=>'text','exibe_busca'=>'d-block','event'=>'','tam'=>'6'],
            'password'=>['label'=>'Senha','active'=>false,'type'=>'password','exibe_busca'=>'d-none','event'=>'','tam'=>'3'],
            'sep0'=>['label'=>'Documento','active'=>false,'type'=>'html_script','exibe_busca'=>'d-none','event'=>'','tam'=>'12','script'=>'<h4 class="text-left">'.__('Documentos').'</h4><hr>','script_show'=>''],
            'cpf'=>['label'=>$lab_cpf,'active'=>false,'type'=>'tel','exibe_busca'=>'d-block','event'=>'mask-cpf required','tam'=>'3'],
            'sep1'=>['label'=>'Endereço','active'=>false,'type'=>'html_script','exibe_busca'=>'d-none','event'=>'','tam'=>'12','script'=>'<h4 class="text-left">'.__('Configurações').'</h4><hr>','script_show'=>''],
            'config[cep]'=>['label'=>'CEP','active'=>false,'placeholder'=>'','type'=>'text','exibe_busca'=>'d-block','event'=>'mask-cep onchange=buscaCep1_0(this.value)','tam'=>'3','cp_busca'=>'config][cep'],
            'config[endereco]'=>['label'=>'Endereço','active'=>false,'placeholder'=>'','type'=>'text','exibe_busca'=>'d-block','event'=>'endereco=cep','tam'=>'7','cp_busca'=>'config][endereco'],
            'config[numero]'=>['label'=>'Numero','active'=>false,'placeholder'=>'','type'=>'text','exibe_busca'=>'d-block','event'=>'numero=cep','tam'=>'2','cp_busca'=>'config][numero'],
            'config[complemento]'=>['label'=>'Complemento','active'=>false,'placeholder'=>'','type'=>'text','exibe_busca'=>'d-block','event'=>'','tam'=>'4','cp_busca'=>'config][complemento'],
            'config[cidade]'=>['label'=>'Cidade','active'=>false,'placeholder'=>'','type'=>'text','exibe_busca'=>'d-block','event'=>'cidade=cep','tam'=>'6','cp_busca'=>'config][cidade'],
            'config[uf]'=>['label'=>'UF','active'=>false,'js'=>false,'placeholder'=>'','type'=>'text','exibe_busca'=>'d-none','event'=>'','tam'=>'2','cp_busca'=>'config][uf'],
            'sep2'=>['label'=>'Documento','active'=>false,'type'=>'html_script','exibe_busca'=>'d-none','event'=>'','tam'=>'12','script'=>'<h4 class="text-left">'.__('Configurações').'</h4><hr>','script_show'=>''],
            'id_permission'=>[
                'label'=>'Permissão*',
                'active'=>true,
                'type'=>'select',
                'data_selector'=>[
                    'campos'=>$campos_permissions,
                    'route_index'=>route('permissions.index'),
                    'id_form'=>'frm-permission',
                    'action'=>route('permissions.store'),
                    'campo_id'=>'id',
                    'campo_bus'=>'nome',
                    'label'=>'Permissão',
                ],'arr_opc'=>$arr_opc,'exibe_busca'=>'d-block',
                'event'=>'',
                'tam'=>'12',
            ],'ativo'=>['label'=>'Liberar acesso','active'=>true,'type'=>'chave_checkbox','value'=>'s','checked'=>'s','exibe_busca'=>'d-block','event'=>'','tam'=>'12','arr_opc'=>['s'=>'Sim','n'=>'Não']],
            'config[origem]'=>['label'=>'origem','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2','cp_busca'=>'config][origem','value'=>$origem],
            //'email'=>['label'=>'Observação','active'=>false,'type'=>'textarea','exibe_busca'=>'d-block','event'=>'','tam'=>'12'],
        ];
        if(!$logado){
            unset($ret['id_permission']);
        }
        if(Qlib::is_frontend()){
            unset($ret['sep2'],$ret['ativo'],$ret['id_permission']);
            //Desablitar a edição de email no frontend
            if($logado){
                $ret['email']['event'] = 'disabled';
            }
        }
        return $ret;
    }
    public function campos_bk2($dados=false,$local='index'){
        $logado = Auth::check();
        if($logado){
            $user = Auth::user();
            $permission = new admin\UserPermissions($user);
            $campos_permissions = $permission->campos();
            $arr_opc = Qlib::sql_array("SELECT id,name FROM permissions WHERE active='s' AND id >='".$user->id_permission."'",'name','id');
        }else{
            $campos_permissions = false;
            $user = false;
            $arr_opc = [];
        }
        if(Qlib::is_backend()){
            $origem = 'admin';
        }else{
            $origem = 'site';
        }
        if(isset($dados['tipo_pessoa']) && $dados['tipo_pessoa']){
            $_GET['tipo'] = $dados['tipo_pessoa'];
        }
        $sec = isset($_GET['tipo'])?$_GET['tipo']:'pf';
        if($sec=='pf'){
            $lab_nome = 'Nome completo *';
            $lab_cpf = 'CPF *';
            $displayPf = '';
            $displayPj = 'd-none';
        }elseif($sec=='pj'){
            $lab_nome = 'Nome do responsável *';
            $lab_cpf = 'CPF do responsável*';
            $displayPf = 'd-none';
            $displayPj = '';
        }else{
            $lab_nome = 'Nome completo *';
            $lab_cpf = 'CPF *';
            $displayPf = '';
            $displayPj = 'd-none';
        }
        $ret = [
            'id'=>['label'=>'Id','active'=>true,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            // 'tipo_pessoa'=>[
            //     'label'=>'Tipo de Pessoa',
            //     'active'=>true,
            //     'type'=>'radio_btn',
            //     'arr_opc'=>['pf'=>'Pessoa Física','pj'=>'Pessoa Jurídica'],
            //     'exibe_busca'=>'d-block',
            //     'event'=>'onclick=selectTipoUser(this.value)',
            //     'tam'=>'12',
            //     'value'=>$sec,
            //     'class'=>'btn btn-outline-secondary',
            // ],
            'sep0'=>['label'=>'informações','active'=>false,'type'=>'html_script','exibe_busca'=>'d-none','event'=>'','tam'=>'12','script'=>'<h4 class="text-left">'.__('Informe os dados').'</h4><hr>','script_show'=>''],
            'token'=>['label'=>'token','active'=>false,'type'=>'hidden','exibe_busca'=>'d-block','event'=>'','tam'=>'2'],
            'id_permission'=>[
                'label'=>'Permissão*',
                'active'=>true,
                'type'=>'select',
                'data_selector'=>[
                    'campos'=>$campos_permissions,
                    'route_index'=>route('permissions.index'),
                    'id_form'=>'frm-permission',
                    'action'=>route('permissions.store'),
                    'campo_id'=>'id',
                    'campo_bus'=>'nome',
                    'label'=>'Permissão',
                   ],
                'arr_opc'=>$arr_opc,'exibe_busca'=>'d-block',
                'event'=>'required',
                'tam'=>'12',
                'value'=>@$_GET['id_permission'],
            ],
            'email'=>['label'=>'E-mail *','active'=>true,'type'=>'email','exibe_busca'=>'d-none','event'=>'required','tam'=>'9','placeholder'=>''],
            'password'=>['label'=>'Senha','active'=>false,'type'=>'password','exibe_busca'=>'d-none','event'=>'','tam'=>'3','placeholder'=>'','value'=>''],
            //'password_confirmation'=>['label'=>'Confirmar Senha *','active'=>false,'type'=>'password','exibe_busca'=>'d-none','event'=>'required','tam'=>'3','placeholder'=>''],
            'name'=>['label'=>$lab_nome,'active'=>true,'type'=>'text','exibe_busca'=>'d-none','event'=>'required','tam'=>'9','placeholder'=>''],
            'cpf'=>['label'=>$lab_cpf,'active'=>false,'type'=>'tel','exibe_busca'=>'d-block','event'=>'mask-cpf','tam'=>'3'],
            'cnpj'=>['label'=>'CNPJ *','active'=>false,'type'=>'tel','exibe_busca'=>'d-block','event'=>'mask-cnpj required','tam'=>'4','class_div'=>'div-pj '.$displayPj],
            'razao'=>['label'=>'Razão social *','active'=>false,'type'=>'text','exibe_busca'=>'d-none','event'=>'required','tam'=>'4','placeholder'=>'','class_div'=>'div-pj '.$displayPj],
            'config[nome_fantasia]'=>['label'=>'Nome fantasia','active'=>false,'type'=>'text','exibe_busca'=>'d-none','event'=>'','tam'=>'4','placeholder'=>'','class_div'=>'div-pj '.$displayPj],
            'config[celular]'=>['label'=>'Telefone celular','active'=>true,'type'=>'tel','tam'=>'4','exibe_busca'=>'d-block','event'=>'onblur=mask(this,clientes_mascaraTelefone); onkeypress=mask(this,clientes_mascaraTelefone);','cp_busca'=>'config][celular'],
            'config[telefone_residencial]'=>['label'=>'Telefone residencial','active'=>false,'type'=>'tel','tam'=>'4','exibe_busca'=>'d-block','event'=>'onblur=mask(this,clientes_mascaraTelefone); onkeypress=mask(this,clientes_mascaraTelefone);','class_div'=>'div-pf '.$displayPf,'cp_busca'=>'config][telefone_residencial'],
            'config[telefone_comercial]'=>['label'=>'Telefone comercial','active'=>false,'type'=>'tel','tam'=>'4','exibe_busca'=>'d-block','event'=>'onblur=mask(this,clientes_mascaraTelefone); onkeypress=mask(this,clientes_mascaraTelefone);','cp_busca'=>'config][telefone_comercial'],
            'config[rg]'=>['label'=>'RG','active'=>false,'type'=>'tel','tam'=>'4','exibe_busca'=>'d-block','event'=>'onblur=mask(this,clientes_mascaraTelefone); onkeypress=mask(this,clientes_mascaraTelefone);','cp_busca'=>'config][rg','class_div'=>'div-pf '.$displayPf],
            'config[nascimento]'=>['label'=>'Data de nascimento','active'=>false,'type'=>'date','tam'=>'4','exibe_busca'=>'d-block','event'=>'','cp_busca'=>'config][nascimento','class_div'=>'div-pf '.$displayPf],
            'genero'=>[
                'label'=>'Sexo',
                'active'=>false,
                'type'=>'select',
                'arr_opc'=>Qlib::lib_sexo(),
                'event'=>'',
                'tam'=>'4',
                'exibe_busca'=>true,
                'option_select'=>false,
                'class'=>'select2',
                'class_div'=>'div-pf '.$displayPf,
            ],
            'config[escolaridade]'=>[
                'label'=>'Escolaridade',
                'active'=>false,
                'type'=>'select',
                'arr_opc'=>Qlib::lib_escolaridades(),'exibe_busca'=>'d-block',
                'event'=>'',
                'tam'=>'6',
                'class'=>'select2',
                'cp_busca'=>'config][escolaridade','class_div'=>'div-pf '.$displayPf,
            ],
            'config[profissao]'=>[
                'label'=>'Profissão',
                'active'=>false,
                'type'=>'select',
                'arr_opc'=>Qlib::lib_profissao(),'exibe_busca'=>'d-block',
                'event'=>'',
                'tam'=>'6',
                'class'=>'select2',
                'cp_busca'=>'config][profissao','class_div'=>'div-pf '.$displayPf,
            ],
            'config[tipo_pj]'=>[
                'label'=>'Tipo de Pessoa Jurídica',
                'active'=>false,
                'type'=>'select',
                'arr_opc'=>Qlib::sql_array("SELECT id,nome FROM tags WHERE ativo='s' AND pai='tipo_pj'",'nome','id'),'exibe_busca'=>'d-block',
                'event'=>'',
                'tam'=>'4',
                'class'=>'select2',
                'cp_busca'=>'config][tipo_pj','class_div'=>'div-pj '.$displayPj,
            ],
            'sep1'=>['label'=>'Endereço','active'=>false,'type'=>'html_script','exibe_busca'=>'d-none','event'=>'','tam'=>'12','script'=>'<h4 class="text-center">'.__('Endereço').'</h4><hr>','script_show'=>'<h4 class="text-center">'.__('Endereço').'</h4><hr>'],
            'config[cep]'=>['label'=>'CEP','active'=>false,'placeholder'=>'','type'=>'text','exibe_busca'=>'d-block','event'=>'mask-cep onchange=buscaCep1_0(this.value)','tam'=>'3'],
            'config[endereco]'=>['label'=>'Endereço','active'=>false,'placeholder'=>'','type'=>'text','exibe_busca'=>'d-block','event'=>'endereco=cep','tam'=>'7','cp_busca'=>'config][endereco'],
            'config[numero]'=>['label'=>'Numero','active'=>false,'placeholder'=>'','type'=>'text','exibe_busca'=>'d-block','event'=>'numero=cep','tam'=>'2','cp_busca'=>'config][numero'],
            'config[complemento]'=>['label'=>'Complemento','active'=>false,'placeholder'=>'','type'=>'text','exibe_busca'=>'d-block','event'=>'','tam'=>'4','cp_busca'=>'config][complemento'],
            'config[cidade]'=>['label'=>'Cidade','active'=>false,'placeholder'=>'','type'=>'text','exibe_busca'=>'d-block','event'=>'cidade=cep','tam'=>'6','cp_busca'=>'config][cidade'],
            'config[uf]'=>['label'=>'UF','active'=>false,'js'=>false,'placeholder'=>'','type'=>'text','exibe_busca'=>'d-none','event'=>'','tam'=>'2','cp_busca'=>'config][uf'],
            //'foto_perfil'=>['label'=>'Foto','active'=>false,'js'=>false,'placeholder'=>'','type'=>'file','exibe_busca'=>'d-none','event'=>'','tam'=>'12'],
            'sep2'=>['label'=>'Preferencias','active'=>false,'type'=>'html_script','exibe_busca'=>'d-none','event'=>'','tam'=>'12','script'=>'<h4 class="text-left">'.__('Preferências').'</h4><hr>','script_show'=>'<h4 class="text-left">'.__('Preferências').'</h4><hr>'],
            'ativo'=>['label'=>'Liberado para uso','active'=>true,'type'=>'chave_checkbox','value'=>'s','checked'=>'s','exibe_busca'=>'d-block','event'=>'','tam'=>'12','arr_opc'=>['s'=>'Sim','n'=>'Não']],
            'preferencias[newslatter]'=>['label'=>'Deseja receber e-mails com as novidades','active'=>false,'type'=>'chave_checkbox','value'=>'s','valor_padrao'=>'s','exibe_busca'=>'d-none','event'=>'','tam'=>'12','arr_opc'=>['s'=>'Sim','n'=>'Não'],'cp_busca'=>'preferencias][newslatter'],

        ];
        if(!$logado){
            unset($ret['id_permission']);
        }
        if(Qlib::is_frontend()){
            unset($ret['sep2'],$ret['ativo'],$ret['id_permission']);
            //Desablitar a edição de email no frontend
            if($logado){
                $ret['email']['event'] = 'disabled';
            }
        }
        return $ret;
    }
    public function index()
    {
        $user = $this->user;
        $this->authorize('is_admin', $user);
        $title = 'Usuários Cadastrados';
        $titulo = $title;
        $queryUsers = $this->queryUsers($_GET);
        $queryUsers['config']['exibe'] = 'html';
        $routa = $this->routa;
        $view = $this->view;

        //REGISTRAR EVENTOS
        (new EventController)->listarEvent(['tab'=>$this->tab,'this'=>$this]);
        return view($routa.'.index',[
            'dados'=>$queryUsers['user'],
            'title'=>$title,
            'titulo'=>$titulo,
            'campos_tabela'=>$queryUsers['campos'],
            'user_totais'=>$queryUsers['user_totais'],
            'titulo_tabela'=>$queryUsers['tituloTabela'],
            'arr_titulo'=>$queryUsers['arr_titulo'],
            'config'=>$queryUsers['config'],
            'routa'=>$routa,
            'view'=>$view,
            'i'=>0,
        ]);
    }
    public function create(User $user)
    {
        $this->authorize('is_admin', $user);
        $title = __('Cadastrar usuário');
        $titulo = $title;
        $config = [
            'ac'=>'cad',
            'frm_id'=>'frm-users',
            'route'=>$this->routa,
        ];
        $value = [
            'token'=>uniqid(),
        ];
        $campos = $this->campos();
        //REGISTRAR EVENTO CADASTRO
        $regev = Qlib::regEvent(['action'=>'create','tab'=>$this->tab,'config'=>[
            'obs'=>'Abriu tela de cadastro',
            'link'=>route($this->routa.'.create'),
            ]
        ]);

        return view($this->routa.'.createedit',[
            'config'=>$config,
            'title'=>$title,
            'titulo'=>$titulo,
            'campos'=>$campos,
            'value'=>$value,
        ]);
    }
    public function store(Request $request)
    {
        $dados = $request->all();
        $origem = isset($dados['config']['origem']) ? $dados['config']['origem'] : false;

        $validatedData = $request->validate([
            'name' => ['required','string',new FullName],
            'email' => ['required','string','unique:users'],
            'cpf'   =>[new RightCpf,'required']
        ],[
                'nome.required'=>__('O nome é obrigatório'),
                'nome.string'=>__('É necessário conter letras no nome'),
                'email.unique'=>__('E-mail já cadastrado'),
        ]);
        if($origem!='admin'){
            $ret = (new RegisterController)->init($dados);
            return $ret;
        }
        $ajax = isset($dados['ajax'])?$dados['ajax']:'n';
        $dados['ativo'] = isset($dados['ativo'])?$dados['ativo']:'n';
        if(isset($dados['password']) && !empty($dados['password'])){
            $dados['password'] = Hash::make($dados['password']);
        }else{
            if(empty($dados['password'])){
                unset($dados['password']);
            }
        }
        $salvar = User::create($dados);
        $dados['id'] = $salvar->id;
        $route = $this->routa.'.index';
        $ret = [
            'mens'=>$this->label.' cadastrada com sucesso!',
            'color'=>'success',
            'idCad'=>$salvar->id,
            'exec'=>true,
            'dados'=>$dados
        ];
        if($ajax=='s'){
            //REGISTRAR EVENTOS
           if($origem=='admin'){
                //requisição realizada no painel de administrador
                (new EventController)->listarEvent(['tab'=>$this->tab,'id'=>$salvar->id,'this'=>$this]);
                $ret['return'] = route($route).'?idCad='.$salvar->id;
                $ret['redirect'] = route($this->routa.'.edit',['id'=>$salvar->id]);
            }else{
                //requisição realizada pelo usuario do site
                if($salvar->id){
                    $ret['return'] = route($route).'?idCad='.$salvar->id;
                    $ret['redirect'] = route($this->routa.'.edit',['id'=>$salvar->id]);
                }else{
                    $ret['log'] = $this->after_cad_user_site($salvar->id);
                }
            }
            return response()->json($ret);
        }else{
            return redirect()->route($route,$ret);
        }
    }

    public function perfilShow(){
        $id = Auth::id();
        return $this->show($id,'perfil');
    }
    public function show($id)
    {
        $local = request()->route()->getName();
        $dados = User::findOrFail($id);
        if($local=='sistema.perfil'){
            $rt = 'sistema';
        }else{
            $rt = $this->routa;
        }
        $this->authorize('ler', $rt);
        if(!empty($dados)){
            $title = 'Cadastro de usuários';
            $titulo = $title;
            //dd($dados);
            $dados['ac'] = 'alt';
            if(isset($dados['config'])){
                $dados['config'] = Qlib::lib_json_array($dados['config']);
            }
            $arr_escolaridade = Qlib::sql_array("SELECT id,nome FROM escolaridades ORDER BY nome ", 'nome', 'id');
            $arr_estadocivil = Qlib::sql_array("SELECT id,nome FROM estadocivils ORDER BY nome ", 'nome', 'id');
            $listFiles = false;
            //$dados['renda_familiar'] = number_format($dados['renda_familiar'],2,',','.');
            $campos = $this->campos($dados,'show');
            if(isset($dados['token'])){
                $listFiles = _upload::where('token_produto','=',$dados['token'])->get();
            }
            $config = [
                'ac'=>'alt',
                'frm_id'=>'frm-users',
                'route'=>$this->routa,
                'id'=>$id,
                'local'=>$local,
                'class_card1'=>'col-md-8',
                'class_card2'=>'col-md-4',
            ];
            if($local=='sistema.perfil'){
                $config['class_card1'] = 'col-md-12';
                $config['class_card2'] = 'd-none';
            }else{
                //REGISTRAR EVENTOS
                (new EventController)->listarEvent(['tab'=>$this->tab,'this'=>$this]);
            }

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
            $campos['ativo']['type']='hidden';
            $ret = [
                'value'=>$dados,
                'config'=>$config,
                'title'=>$title,
                'titulo'=>$titulo,
                'arr_escolaridade'=>$arr_escolaridade,
                'arr_estadocivil'=>$arr_estadocivil,
                'listFiles'=>$listFiles,
                'campos'=>$campos,
                'routa'=>$this->routa,
                'eventos'=>(new EventController)->listEventsPost(['post_id'=>$id]),
                // 'eventos'=>(new EventController)->listEventsUser(['id_user'=>$id]),
                'exec'=>true,
            ];
            // return view($this->routa.'.show',$ret);
            return view($this->view.'.show',$ret);
        }else{
            $ret = [
                'exec'=>false,
            ];
            return redirect()->route($this->routa.'.index',$ret);
        }
    }
    public function perfilEdit($user,$local=false)
    {
        $id = Auth::id();
        return $this->edit($id);
    }
    public function edit($user)
    {
        $id = $user;
        $dados = User::where('id',$id)->get();
        $local = request()->route()->getName();

        $routa = 'users';
        if($local=='sistema.perfil.edit'){
            $this->authorize('is_admin_logado', $user);
        }else{
            $this->authorize('is_admin', $user);
        }

        if(!empty($dados)){
            $title = 'Editar Cadastro de usuários';
            $titulo = $title;
            $dados[0]['ac'] = 'alt';
            if(isset($dados[0]['config'])){
                $dados[0]['config'] = Qlib::lib_json_array($dados[0]['config']);
            }
            $listFiles = false;
            if(isset($dados[0]['token'])){
                $listFiles = _upload::where('token_produto','=',$dados[0]['token'])->get();
            }
            $config = [
                'ac'=>'alt',
                'frm_id'=>'frm-users',
                'route'=>$this->routa,
                'id'=>$id,
            ];
            $campos = $this->campos();
            if($local=='sistema.perfil.edit'){
                $campos['ativo']['type']='hidden';
            }
            $ret = [
                'value'=>$dados[0],
                'config'=>$config,
                'title'=>$title,
                'titulo'=>$titulo,
                'listFiles'=>$listFiles,
                'campos'=>$campos,
                'exec'=>true,
            ];
            //REGISTRAR EVENTOS
            (new EventController)->listarEvent(['tab'=>$this->tab,'this'=>$this,'id'=>$id]);
            return view($routa.'.createedit',$ret);
        }else{
            $ret = [
                'exec'=>false,
            ];
            return redirect()->route($routa.'.index',$ret);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required',new FullName],
            'cpf'   =>[new RightCpf]
        ]);

        $data = [];
        $dados = $request->all();
        $ajax = isset($dados['ajax'])?$dados['ajax']:'n';
        if(!$dados['password'] || empty($dados['password'])){
            unset($dados['password']);
        }
        if(!$dados['token'] || empty($dados['token'])){
            $dados['token'] = uniqid();
        }
        //dd($dados);
        foreach ($dados as $key => $value) {
            if($key!='_method'&&$key!='_token'&&$key!='ac'&&$key!='ajax'){
                if($key=='data_batismo' || $key=='data_nasci'){
                    if($value=='0000-00-00' || $value=='00/00/0000'){
                    }else{
                        $data[$key] = Qlib::dtBanco($value);
                    }
                }elseif($key=='password'){
                    $data[$key] = Hash::make($value);
                }else{
                    $data[$key] = $value;
                }
            }
        }
        $userLogadon = Auth::id();
        if(Qlib::is_backend()){
            $data['ativo'] = isset($data['ativo'])?$data['ativo']:'n';
        }
        $data['autor'] = $userLogadon;
        if(isset($dados['config'])){
            $dados['config'] = Qlib::lib_array_json($dados['config']);
        }
        $atualizar=false;
        if(empty($data['passaword'])){
            unset($data['passaword']);
        }
        if(!empty($data)){
           $atualizar=User::where('id',$id)->update($data);
            $route = $this->routa.'.index';
            $ret = [
                'exec'=>$atualizar,
                'id'=>$id,
                'mens'=>'Salvo com sucesso!',
                'color'=>'success',
                'idCad'=>$id,
                'return'=>$route,
            ];
            if($atualizar){
                //REGISTRAR EVENTOS
                (new EventController)->listarEvent(['tab'=>$this->tab,'this'=>$this]);
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
            $ret['return'] = route($route).'?idCad='.$id;
            return response()->json($ret);
        }else{
            return redirect()->route($route,$ret);
        }
    }

    public function destroy($id,Request $request)
    {
        $config = $request->all();
        $ajax =  isset($config['ajax'])?$config['ajax']:'n';
        $routa = 'users';
        if (!$post = User::find($id)){
            if($ajax=='s'){
                $ret = response()->json(['mens'=>'Registro não encontrado!','color'=>'danger','return'=>route($this->routa.'.index')]);
            }else{
                $ret = redirect()->route($routa.'.index',['mens'=>'Registro não encontrado!','color'=>'danger']);
            }
            //REGISTRAR EVENTO
            $regev = Qlib::regEvent(['action'=>'destroy','tab'=>$this->tab,'config'=>[
                'obs'=>'Exclusão de cadastro Id '.$id,
                'link'=>'#',
                ]
            ]);

            return $ret;
        }

        User::where('id',$id)->delete();
        if($ajax=='s'){
            $ret = response()->json(['mens'=>__('Registro '.$id.' deletado com sucesso!'),'color'=>'success','return'=>route($this->routa.'.index')]);
        }else{
            $ret = redirect()->route($routa.'.index',['mens'=>'Registro deletado com sucesso!','color'=>'success']);
        }
        return $ret;
    }

    public function exec($token_conta = null)
    {
        $cont = false;
        //if($token_conta){
            $verifica_fatura = $this->verifica_faturas(array('token_conta'=>$token_conta));
            if(isset($_GET['teste'])){
                Qlib::lib_print($verifica_fatura);
            }
            $verifica_fatura['acao'] = isset($verifica_fatura['acao'])?$verifica_fatura['acao']:false;
            if(isset($verifica_fatura['acao'])&&$verifica_fatura['acao']=='alertar'){
                if(Qlib::isAdmin()){
                    $cont = @$verifica_fatura['mens'];
                    //echo $cont;
                }
            }elseif($verifica_fatura['acao']=='suspender' || $verifica_fatura['acao']=='desativar'){
                //Não terá acesso ao admin somente ao boleto e as faturas e o site estará desativado tbem
                if(Qlib::isAdmin(3)){
                    $cont = @$verifica_fatura['mens'];
                }else{
                    $cont = Qlib::formatMensagemInfo('Sistema temporariamente suspenso entre em contato com o administrador','danger');
                }
                $pagSusped = 'suspenso';
                if($this->seg1!=$pagSusped){
                    Qlib::redirect('/'.$pagSusped,0);
                    die();
                }
                //echo $cont;
            }
        //}
        return $cont;
    }
    public function verifica_faturas($config=false,$cache=true){
		$ret['exec'] = false;
		$ret['cache'] = false;
		//exemplo de uso
		/*
		$this = new apictloja;
		$ret = $this->verifica_faturas(array('token_conta'=>''));
		Qlib::lib_print($ret);
		*/
		$token = isset($config['token_conta'])?$config['token_conta']:$this->tk_conta;

		if($token){
            $ver_sess = session('verifica_faturas');
            //Qlib::lib_print($ver_sess);

			if(isset($ver_sess['exec'])&&$ver_sess['exec'] && $cache){
				$arr_response = $ver_sess;
				$ret['cache'] = true;
			}else{

				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => $this->url.'/verifica_faturas/'.$token,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'GET',
				  CURLOPT_HTTPHEADER => array(
					'Access-Token: '.$this->access_token
				  ),
				));
				$response = curl_exec($curl);
				curl_close($curl);
				$arr_response = json_decode($response,true);
				//$ret['arr_response'] = $arr_response;
			}
			if(isset($arr_response['exec'])){
				$ret['exec'] = $arr_response['exec'];
				$ret['acao'] = $arr_response['acao'];
                session(['verifica_faturas'=>$arr_response]);
				//$ver_sess=$arr_response;
			}else{
				$ret['acao'] = 'liberar';
            }
			if(isset($arr_response['mens'])){
				$ret['mens'] = $arr_response['mens'];
			}
			$ret['token'] = $token;
		}else{
			$ret['mens'] = Qlib::formatMensagemInfo('Configuração ou token inválido','danger');
		}
        //dd($ret);
        return $ret;
	}
    public function pararAlertaFaturaVencida(Request $request){
        $request->session()->put('verifica_faturas.acao','liberar');
        $ret['exec']=true;
		return $ret;
	}
    public function suspenso()
    {
        return view('admin.suspenso');
    }
    /**Metodo para gerar o formulario no front pode ser iniciado com o short_code [sc ac="form_meu_cadastro"] */
    public function form_meu_cadastro($post_id=false,$dados=false,$meu_cadastro_id=false){
        $route = $this->routa;
        if(Gate::allows('is_customer_logado')||Gate::allows('is_admin2')){
            if(Auth::check()){
                $ac = 'alt';
                $dadosmeu_cadastro = Auth::user();
                $meu_cadastro_id = $dadosmeu_cadastro->id;
            }else{
                $dadosmeu_cadastro = false;
                $ac = 'cad';
            }
        }else{
            $ac = 'cad';
            $dadosmeu_cadastro = false;
        }
        // $seg2 = request()->segment(2);
        // $meu_cadastro_id = $meu_cadastro_id ? $meu_cadastro_id : $seg2;

        if(!$dados && $post_id){

            $dados = Post::Find($post_id);
        }
        $title = __('Meu Cadastro');
        $titulo = $title;
        $config = [
            'ac'=>$ac,
            'frm_id'=>'frm-posts',
            'route'=>$route,
            'view'=>'site.index',
            'file_submit'=>'site.js_submit',
            'arquivos'=>'jpeg,jpg,png',
            'redirect'=>Qlib::get_slug_post_by_id(1),
            'title'=>$title,
            'titulo'=>$titulo,
        ];
        if(isset($dadosmeu_cadastro['id'])){
            $config['id'] = $dadosmeu_cadastro['id'];
        }
        $config['media'] = [
            'files'=>'jpeg,jpg,png,pdf,PDF',
            'select_files'=>'unique',
            'field_media'=>'post_parent',
            'post_parent'=>$post_id,
        ];
        $listFiles = false;
        $campos = $this->campos($dadosmeu_cadastro);

        $ret = [
            'value'=>$dadosmeu_cadastro,
            'config'=>$config,
            'title'=>$title,
            'titulo'=>$titulo,
            'listFiles'=>$listFiles,
            'campos'=>$campos,
            'exec'=>true,
        ];
        return view('site.user.edit',$ret);
    }
    /**
     * Metodo para checar se o usuario verificou seu email
     */
    public function is_verified(){
        //uso (new UserController)->is_verified();
        $user = Auth::user();
        return $user->email_verified_at;
    }
    /**
     * Metodo para plubicar dados dos usuario
     * @param int $user_id
     * @return array $ret
     */
    public function get_user_data($user_id){
        return User::Find($user_id);
    }
    /**
     * Metodo para Gerenciar o cadastro de usuarios peelo site
     * @param int $id_pagina,$dp= dados de postagem da página
     * @return string $ret
     */
    public function ger_user($id_pagina=false,$dp=false){
        $seg1 = request()->segment(1);
        $seg2 = request()->segment(2);
        if(!$seg2){
            if(Qlib::isAdmin(3)){
                return $this->get_users_site();
            }else{
                return redirect('/meu-cadastro');
            }
        }elseif($seg2=='create'){
            //Criar usuario
            return $this->form_meu_cadastro($id_pagina,$dp);
        }elseif($seg2=='edit'){
            //editar usuario
        }elseif($seg2=='show'){
            //visualizar usuario

        }elseif($seg2=='remove'){
            //excluir usuario
        }
        $ret = $seg2;

        return $ret;
    }
    /**
     * Metodo para logar cliente apos cadastro de usuario no site tbme envia um email de verificação
     */
    public function after_cad_user_site($user_id){


    }
    public function get_users_site(){

    }
}
