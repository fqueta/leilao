
@php
    $redirect_base = false;
    if(isset($config['ac']) && $config['ac']=='alt'){
        $_GET['redirect'] = isset($_GET['redirect']) ? $_GET['redirect'] : route($config['route'].'.index').'?idCad='.$value['id'];
        if(isset($_GET['redirect_base'])&&!empty($_GET['redirect_base'])){
            $redirect_base = base64_decode($_GET['redirect_base']);
            $redirect_base .= '&idCad='.$value['id'];
            //echo $redirect_base;
        }
    }
    $frontend = App\Qlib\Qlib::is_frontend();
    if($frontend){
        $redirect_base = isset($config['redirect'])?$config['redirect']:$redirect_base;
        $config['route'] .= '_adm';
    }
@endphp
<div class="col-md-12 div-salvar bg-light">
    @if (isset($redirect_base) && $redirect_base)
        <a href="{{$redirect_base}}" btn-volter="true" redirect="{{@$redirect_base}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Voltar</a>
    @else
        <button type="button" btn-volter="true" href="{{route($config['route'].'.index')}}" onclick="btVoltar($(this))" redirect="{{@$_GET['redirect']}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Voltar</button>
    @endif
        @if (isset($config['ac']) && $config['ac']=='alt')
            @php
                $r_novo_cadastro = route($config['route'].'.create');
                if($frontend){
                    $r_novo_cadastro = url('/').'/'.App\Qlib\Qlib::get_slug_post_by_id(2);
                }
            @endphp
            @can('create',$config['route'])
                <a href="{{$r_novo_cadastro}}" class="btn btn-default"> <i class="fas fa-plus"></i> Novo cadastro</a>
            @endcan
            @can('update',$config['route'])
                <button type="submit" btn="permanecer" class="btn btn-primary">Salvar e permanecer</button>
                <button type="submit" btn="sair"  class="btn btn-outline-primary">Salvar e Sair <i class="fa fa-chevron-right"></i></button>
            @endcan
        @else
            @can('create',$config['route'])
                @if (!isset($_GET['popup']))
                    <button type="submit" btn="permanecer" class="btn btn-primary">Salvar e permanecer</button>
                @endif
                <button type="submit" btn="sair"  class="btn btn-outline-primary">Salvar e Sair <i class="fa fa-chevron-right"></i></button>
            @endcan
        @endif
</div>
