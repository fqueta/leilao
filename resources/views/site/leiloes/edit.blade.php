@php
$post = isset($_REQUEST['post']) ? $_REQUEST['post'] : false;

@endphp
<style>
    .div-salvar {
        position: initial;
        margin-top:10px;
    }
</style>
<div class="row mt-5">
    <div class="col-md-12 mens">
    </div>
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{__('Cadastro de Leilão')}}</h3>
                {{-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                </div> --}}
            </div>
            <div class="card-body">
                {{App\Qlib\Qlib::formulario([
                    'campos'=>$campos,
                    'config'=>$config,
                    'value'=>$value,
                ])}}
            </div>
        </div>
    </div>
    @if($config['ac']=='alt')

    @endif
    @include($config['view'].'.js_submit')
</div>
