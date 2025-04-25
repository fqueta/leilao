@php
    global $post;
    $contrato = isset($dados['nome_contrato']) ? $dados['nome_contrato'] : '';
    $finalizado = isset($dados['finalizado']) ? $dados['finalizado'] : false;
    $thumb_page = App\Qlib\Qlib::get_thumbnail_link(@$post['ID']);
    // dd($dados);
@endphp
@section('title')
{{$config['title']}}
@endsection
<style>
    .banner-page{
        background-image: url("{{$thumb_page}}");
    }
</style>
@if (empty($contrato))
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4" style="min-height: 300px;padding-top: 43px;">
                    <div class="alert alert-warning" role="alert">
                        <strong>{{ __('Alerta') }}</strong> {{ __('Leilão em edição ou dados insuficientes') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
    <section class="banner-page">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-md-5 order-1 order-md-0">
                    <div class="banner-page-sidebar">
                        <div class="banner-page-item-cover p-1 bg-light rounded text-center">
                            <img src="{{@$dados['link_thumbnail']}}" alt="{{@$dados['post_title']}}" class="img-fluid rounded mb-3">
                            <h3><i class="fa-solid fa-gavel"></i> {{__('Lance Atual')}}</h3>
                            <p class="display-6 text-muted mb-0">{!!@$dados['lance_atual']!!}</p>
                            <button type="button" class="btn btn-link p-0" id="btn-ver_lances">{{__('Ver Lances')}} ({{@$dados['total_lances']}})</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7 order-0 order-md-1">
                    <div class="banner-page-content text-center text-md-start mb-5 mb-md-0">
                        <h2>{{$config['titulo']}}</h2>
                        <ul>
                            @if($contrato)
                            <li><i class="fa-solid fa-file-lines"></i> <b>{{__('Ficha')}}:</b> {{$contrato}}</li>
                            @endif
                            @if(isset($dados['situacao']) && $dados['situacao']=='f')
                            <li>
                                <i class="fa-solid fa-clock"></i> {{__('Terminou em')}} <span class="text-danger"><b>{{$dados['info_termino']['time']}}</b></span>
                            </li>
                            @else
                            <li>
                                <i class="fa-solid fa-clock"></i> {{__('Termina em')}} <span class="{{@$dados['info_termino']['quase_termino']['color']}}"><b>{{@$dados['info_termino']['time']}}</b></span>
                            </li>
                            @endif
                            <li>
                                <i class="fa-solid fa-calendar"></i> <b>{{@$dados['info_termino']['data0']}}</b> {{__('às')}} <b>{{@$dados['info_termino']['hora']}}</b>
                            </li>
                        </ul>
                        <div class="followers">
                            <a href="{!!@$dados['link_seguir']!!}" title="{!!@$dados['link_seguir_title']!!}" class="badge bg-info text-{!!@$dados['link_seguir_color']!!} me-2">{{@$dados['link_seguir_label']}}</a><small><i class="fa-solid fa-heart"></i> <span title="{{__('Total de pessoas seguindo esse leilão')}}">{{@$dados['total_seguidores']}} {{__('seguidores')}} </span> | <i
                                    class="fa-solid fa-eye"></i> {{@$dados['total_views']}} {{__('visualizações')}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-page-overlay"></div>
    </section>
    <section class="pre-page bg-light">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-md-5"></div>
                <div class="col-12 col-md-7">
                    @if (isset($dados['info_termino']['exec']) && isset($dados['info_termino']['termino']))
                        @if ($dados['info_termino']['termino'])
                            <div class="col-12">
                                <label class="fw-bold" for="termino">{{__('Lance Vencedor')}}: </label><b> {!!@$dados['lance_vencedor']!!} </b>
                            </div>
                        @else
                            <div class="col-12">
                                @include('site.leiloes.dar_lances')
                            </div>
                        @endif
                    @endif
                    <div class="card-store card border-0">
                        <div class="card-body text-center text-md-start">
                            <h6><b>Métodos de pagamento</b></h6>
                            <ul class="d-flex justify-content-center justify-content-md-start">
                                <li class="me-4"><i class="fa-brands fa-pix"></i> Pix</li>
                                <li class="me-4"><i class="fa-solid fa-credit-card"></i> Cartão</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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
    </section>
    <section class="page-content">
        <div class="container">
            <div class="row py-5">
                <div class="col-12">
                    <h3 class="text-center text-md-start">Descrição do leilão</h3>
                    @if (isset($dados['post_content']))
                        {!!$dados['post_content']!!}
                    @endif
                </div>
            </div>
            @can('is_admin2')
                <div class="row py-5">
                            <div class="col-6">
                                @isset($_GET['redirect'])
                                <a href="{{$_GET['redirect']}}" class="btn btn-outline-secondary"> <i class="fa fa-chevron-left" aria-hidden="true"></i> {{__('Voltar')}}</a>
                                @endisset
                            </div>
                            <div class="col-6 text-end">
                                @isset($dados['ID'])
                                    <a href="{{route('leiloes_adm.edit',['id'=>$dados['ID']]).'?redirect='.App\Qlib\Qlib::UrlAtual()}}" class="btn btn-outline-primary">
                                        {{__('Editar')}} <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </a>
                                @endisset
                            </div>
            </div>
            @endcan
        </div>
    </section>
    @if(isset($dados['desconto_s_atual']['valor']) && $dados['desconto_s_atual']['valor']>0)
        <section class="bottom-msg">
            <div class="container">
                <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
                    <h4 class="display-6">Economia</h4>
                        <p>{{__('Ao realizar o lance acima você tem uma economia de ')}}<br> <b class="text-success">{{@$dados['desconto_s_atual']['html']}} </b> (<b>{{@$dados['desconto_s_atual']['porcento']}}% OFF </b>) {{__('Sobre o preço atual do pacote.')}}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </section>
    @endif
@endif

