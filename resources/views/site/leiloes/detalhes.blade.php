@section('title')
{{$config['title']}}
@endsection
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <img src="{{$dados['link_thumbnail']}}" alt="{{$dados['post_title']}}" class="w-100"/>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-12">
                <h2>
                    {{$config['titulo']}}
                </h2>
            </div>
            <div class="col-12">
                <label for="termino">{{__('Término')}}: </label><b> {{$dados['termino']}} </b>
            </div>
            <div class="col-12">
                <label for="termino">{{__('Lance Atual')}}: </label><b> {!!$dados['lance_atual']!!} </b>
            </div>
            <div class="col-12 mb-3">
                <a href="javascript:void(0);" id="btn-ver_lances">{{__('Ver Lances')}} </a>
            </div>
            @if (isset($dados['info_termino']['exec']) && isset($dados['info_termino']['termino']))
                @if ($dados['info_termino']['termino'])
                    <div class="col-12">
                        <label for="termino">{{__('Lance Vencedor')}}: </label><b> {!!@$dados['lance_vencedor']!!} </b>
                    </div>
                @else
                    <div class="col-12 mb-3">
                        {!!App\Http\Controllers\LanceController::info_reserva($dados['ID'])!!}
                    </div>
                    <div class="col-12">
                        @include('site.leiloes.dar_lances')
                    </div>
                @endif
            @endif

            <div class="col-12">
                <small>* Valores acima do valor mínimo de lance entrarão como valor de reserva para lances automáticos.</small>
            </div>

            <!-- Modal -->
            {{-- <div class="modal fade" id="modalLances" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">{{__('Lances')}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div style="max-height:600px; overflow: auto;">
                                    @include('site.leiloes.lances.list_lances')
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Fechar')}}</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            @include('site.partes_bs.modal',['config'=>[
                'id'=>'modalLances',
                'title'=>'Lances',
                'tam'=>'modal-lg',
                'bt_acao'=>false,
                'include'=>'site.leiloes.lances.list_lances',
            ]])
            <script>
                $(function(){
                    $('#btn-ver_lances').on('click', function(){
                        $('#modalLances').modal('show');
                    });

                });
            </script>
        </div>
    </div>
</div>
