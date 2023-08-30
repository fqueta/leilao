@php
    $contrato = isset($dados['nome_contrato']) ? $dados['nome_contrato'] : '';
    $finalizado = isset($dados['finalizado']) ? $dados['finalizado'] : false;
@endphp
@section('title')
{{$config['title']}}
@endsection
<div class="row">
    @if(isset($config['exec']) && $config['exec'])
    <div class="col-md-6 mb-3">
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
            @if ($contrato)
            <div class="col-12">
                <label class="fw-bold" for="contrato">{{__('Contrato')}}: </label> {{$contrato}}
            </div>
            @endif
            <div class="col-12">
                <label class="fw-bold" for="responsavel">{{__('Responsável')}}: </label> {{$dados['nome_responsavel']}}
            </div>
            <div class="col-12">
                <label class="fw-bold" for="termino">{{__('Término')}}: </label> {{$dados['termino']}}
            </div>
            <div class="col-12">
                <label class="fw-bold" for="termino">{{__('Lance Atual')}}: </label> {!!$dados['lance_atual']!!}
            </div>
            <div class="col-12">
                <a href="javascript:void(0);" id="btn-ver_lances">{{__('Ver Lances')}} ({{$dados['total_lances']}}) </a>
            </div>

            @if (isset($dados['info_termino']['exec']) && isset($dados['info_termino']['termino']))
                @if ($dados['info_termino']['termino'])
                    <div class="col-12">
                        <label class="fw-bold" for="termino">{{__('Lance Vencedor')}}: </label><b> {!!@$dados['lance_vencedor']!!} </b>
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

            <div class="col-12 mb-3">
                <small>* {{__('Valores acima do valor mínimo de lance entrarão como valor de reserva para lances automáticos.')}} </small>
            </div>

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
            <!-- Foramas de pagamento -->
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            {{__('Formas de Pagamento')}}
                        </h6>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Boleto <i class="fas fa-barcode"></i>
                            Cartão <i class="fas fa-credit-card"></i>
                        </p>
                    </div>
                </div>
            </div>
            @if(isset($dados['config']['valor_venda']) && !$finalizado)
            <!-- Comprar agora -->
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            {{config('app.name')}} STORE
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text">
                                    {{$dados['config']['valor_venda']}}
                                </p>
                            </div>
                            <div class="col-6">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" name="leilao_id" value="{{$dados['ID']}}">
                                            <button type="submit" class="card-text btn btn-success float-end">
                                               <i class="fas fa-cart-plus"></i>  {{__('Comprar')}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header">
                <h5>
                    {{__('Descrição do Leilão')}}
                </h5>
            </div>
            <div class="card-body">
                @if (isset($dados['post_content']))

                {!!$dados['post_content']!!}
                @endif
            </div>
        </div>
    </div>
    @else
    <div class="col-md-12 mb-3">
        @if(isset($config['mens']))
        {!!$config['mens']!!}
        @endif
    </div>

    @endif

</div>
