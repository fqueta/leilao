@if (isset($dados['ID']) && isset($dados['arr_lances']) && is_array($dados['arr_lances']))
@php
    $disbledL = 'disabled';
    $mensLog = '<div class="alert alert-danger">'.__('Para dar lances é necessário estar logado no site.').'</div>';
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
            <button class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#modal-dar-lance" {{$disbledL}} type="submit"><i class="fas fa-gavel    "></i> {{__('Dar Lance')}}</button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            {!!$mensLog!!}
        </div>
    </div>
    @endif
</form>

  {{-- <div class="modal fade" id="modalLance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLanceLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLanceLabel">{{__('Atenção')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Fechar')}}</button>
          <button type="button" suguir-lance class="btn btn-primary">{{__('Prosseguir')}}</button>
        </div>
      </div>
    </div>
  </div> --}}
    @include('site.partes_bs.modal',['config'=>[
        'id'=>'modal-dar-lance',
        'title'=>'Atenção',
        'tam'=>'',
        'bt_acao'=>'<button type="button" suguir-lance class="btn btn-primary">'.__('Prosseguir').'</button>',
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
