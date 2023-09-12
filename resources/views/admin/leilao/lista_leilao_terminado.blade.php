<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>
                {{__('Vencedores')}}
            </h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{__('Leilão')}}</th>
                        <th>{{__('Nome')}}</th>
                        <th>{{__('Termino')}}</th>
                        <th>{{__('Valor')}}</th>
                        <th class="text-right">{{__('Situação')}}</th>
                    </tr>
                </thead>
                @if (isset($config['lista_leilao_terminado']) && is_array($config['lista_leilao_terminado']))
                    @foreach ($config['lista_leilao_terminado'] as $k=>$v)
                        <tr>
                            @if(isset($v['link_leilao_front']) && $v['link_leilao_front'])
                            <td>
                                <a href="{{$v['link_leilao_front']}}" target="_blank" rel="">
                                    {{$v['post_title']}}
                                </a>
                            </td>
                            @else
                                <td>
                                    {{$v['post_title']}}
                                </td>
                            @endif
                            <td>{{@$v['venc']['nome']}}</td>
                            <td>{{@$v['term']['html']}}</td>
                            <td>{{App\Qlib\Qlib::valor_moeda(@$v['venc']['valor_lance'])}}</td>
                            <td class="text-right">{!!@$v['situacao_pagamento']!!}</td>
                        </tr>
                    @endforeach
                @endif
                <tbody>

                </tbody>
            </table>
            {{-- {{dd($config)}} --}}
        </div>
        {{-- <div class="card-footer text-muted">
            Footer
        </div> --}}
    </div>
</div>
