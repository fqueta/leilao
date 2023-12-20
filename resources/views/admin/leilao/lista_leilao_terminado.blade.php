@php
    $redirect = '?redirect='.url('/admin');
@endphp
<div class="col-md-12">
    <div class="card">
        <div class="card-header  border-transparent">
            <h3 class="card-title">
                {{__('Vencedores')}}
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped dataTable">
                    <thead>
                        <tr>
                            <th>{{__('Leilão')}}</th>
                            <th>{{__('Nome')}}</th>
                            <th>{{__('Termino')}}</th>
                            <th>{{__('Valor')}}</th>
                            <th class="">{{__('Pagamento')}}</th>
                            <th class="text-right">{{__('Situação')}}</th>
                        </tr>
                    </thead>
                    @if (isset($config['lista_leilao_terminado']) && is_array($config['lista_leilao_terminado']))
                        @foreach ($config['lista_leilao_terminado'] as $k=>$v)
                            <tr>
                                @if(isset($v['link_leilao_front']) && $v['link_leilao_front'])
                                <td>
                                    <a href="{{$v['link_leilao_front'].$redirect}}" class="underline" rel="">
                                        {{$v['post_title']}}
                                    </a>
                                </td>
                                @else
                                    <td>
                                        {{$v['post_title']}}
                                    </td>
                                @endif
                                <td>
                                    @if (isset($v['venc']['author']) && !empty($v['venc']['author']))
                                        <a class="underline" href="{{route('users.show',['id'=>$v['venc']['author']]).$redirect}}" rel="">
                                            {{@$v['venc']['nome']}}
                                        </a>
                                    @endif
                                </td>
                                <td>{{@$v['term']['html']}}</td>
                                <td>{{App\Qlib\Qlib::valor_moeda(@$v['venc']['valor_lance'])}}</td>
                                <td>
                                    @if (isset($v['status_pago']) && ($v['status_pago']=='s' || $v['status_pago']=='a'))
                                        @php
                                            echo (new App\Http\Controllers\PaymentController) -> get_info_pagamento($v['ID'])
                                        @endphp
                                    @endif
                                </td>
                                <td class="text-right">
                                    {!!@$v['situacao_pagamento']!!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
