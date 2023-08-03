@php
    $seg1 = request()->segment(1); //link da página em questão
    $urllistaTodos = App\Qlib\Qlib::get_slug_post_by_id(3); //link da pagina para listar todos o lances do cliente.

@endphp
@if ($seg1==$urllistaTodos)
<div class="col-md-12 mt-5">
    <span class="text-muted"> {{__('São exibidos seus lances em leilões ativos ou em leilões que foram finalizados nos últimos 7 dias')}} </span>
</div>
<div class="col-md-12 mb-3">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                {{__('Lances Vencendo Leilão')}}
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">

            </div>
        </div>
        <div class="card-footer d-print-none">

        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                {{__('Lances Superados')}}
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">

            </div>
        </div>
        <div class="card-footer d-print-none">

        </div>
    </div>
</div>
@else
    @if (isset($dados['list_lances']) && is_array($dados['list_lances']))
        <table class="table  table-condensed table-bordered " id="tbl-lances-realizados">
            <tbody>
                <thead>
                    <tr>
                        <th>{{__('Data')}} / {{__('Hora')}}</th>
                        <th>{{__('Usuário')}}</th>
                        <th>{{__('Valor')}}</th>
                    </tr>
                </thead>
                @foreach ($dados['list_lances'] as $kll=>$vll )
                    @php
                        $lance_automatico = false;
                        if(isset($vll->config) && $vll->config!=null){
                            $c = stripslashes($vll->config);
                            $c = str_replace('"{','{',$c);
                            $c = str_replace('}"','}',$c);
                            $arr_c = App\Qlib\Qlib::lib_json_array($c);
                            if(isset($arr_c['type']) && $arr_c['type']=='auto'){
                                $lance_automatico = '<span class="lance-aut text-primary" title="'.__('Lance Automático').'">(A)</span>';
                            }
                        }
                    @endphp
                    <tr class="">
                        <td>
                            {{$vll->data}}
                        </td>
                        <td class="text-center">
                            {{App\Qlib\Qlib::criptString($vll->nome)}}
                        </td>
                        <td class="td-lance">
                            {{App\Qlib\Qlib::valor_moeda($vll->valor_lance,'R$ ')}} {!!$lance_automatico!!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endif
