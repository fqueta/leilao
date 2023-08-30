@if (isset($dados['ID']) && isset($dados['arr_lances']) && is_array($dados['arr_lances']))
@php
    $disbledL = 'disabled';
    $mensLog = '<div class="alert alert-danger">'.__('Para dar lances é necessário estar logado no site.').' <!--<a href="'.route('login').'" class="text-decoration-underline"> Logar</a>--></div>';
    if(Gate::allows('is_admin2')||Gate::allows('is_customer_logado')){
        $disbledL = '';
        $mensLog = false;
    }
@endphp
<form id="frm-lance" method="post" action="{{route('lances.store')}}">
    @csrf
    <input type="hidden" name="leilao_id" value="{{$dados['ID']}}" />
    <input type="hidden" name="origem" value="front" />

    <div class="row mb-3">
        <div class="col-12 mens mb-3"></div>
        <div class="col-6">
            <select name="valor_lance" class="form-control" id="valor_lance">
                @foreach ($dados['arr_lances'] as $kl=>$vl)
                <option value="{{$vl['valor']}}">{{Number_format($vl['valor'],2,',','.')}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-6">
            <button id="btn-frm-lance" class="btn btn-primary btn-block float-end" data-bs-toggle="modal" data-bs-target="#modal-dar-lance" {{$disbledL}} type="button"><i class="fas fa-gavel"></i> {{__('Dar Lance')}}</button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            @php
               echo $mensLog;
            @endphp
        </div>
    </div>
    @endif
</form>
    @include('site.partes_bs.modal',['config'=>[
        'id'=>'modal-dar-lance',
        'title'=>'Atenção',
        'tam'=>'',
        'bt_acao'=>'<button type="button" seguir-lance class="btn btn-primary">'.__('Prosseguir').'</button>',
        'include'=>false,
    ]])

@php
    $redirect = App\Qlib\Qlib::UrlAtual();
@endphp
<script>
    $(function(){
        lib_gerLances('{{ $redirect }}');
    })
</script>
