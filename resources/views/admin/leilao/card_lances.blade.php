
<div class="row">
    <div class="card card-primary card-outline" style="width: 100%">
        <div class="card-header">
            <h3 class="card-title">{{__('Histórico de Lances')}}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body card-h overflow-auto mw-100 d-flex">
            <div class="row">
                @if(isset($dados['situacao']) && $dados['situacao']=='f')
                    <div class="col-12">
                        @if(isset($dados['ranking']['ganhadores']) && is_array($dados['ranking']['ganhadores']))
                            <table class="ranking table mt-0 mb-0">
                                <thead>
                                    <tr>
                                        <th colspan="3">
                                            <h6> {{__('Ranking de ganhadores')}} </h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dados['ranking']['ganhadores'] as $kg=>$vg )
                                        <tr class="text-{{@$vg['color']}}">
                                            <td class="numero">
                                                {{$kg}}°
                                            </td>
                                            <td class="name">
                                                @if (isset($vg['author']) && $vg['author']>1)
                                                    <a class="underline" title="{{__('Ver detalhes')}}" href="{{route('users.show',['id'=>$vg['author']])}}?redirect={{App\Qlib\Qlib::UrlAtual()}}">
                                                        {{@$vg['name']}}
                                                    </a>
                                                @else
                                                    {{@$vg['name']}}
                                                @endif
                                            </td>
                                            <td class="valor text-right">
                                                {{App\Qlib\Qlib::valor_moeda(@$vg['valor_lance'])}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                @endif
                <div class="col-12">
                    <a href="javascript:void(0);" class="underline" data-toggle="modal" data-target="#modalLances" id="btn-ver_lances">{{__('Todos Lances')}} ({{$dados['total_lances']}}) </a>
                </div>
                <div class="col-12">
                    @include('qlib.partes_html',['config'=>[
                        'parte'=>'modal',
                        'id'=>'modalLances',
                        'title'=>'Lances',
                        'tam'=>'modal-lg',
                        'bt_acao'=>false,
                        'botao_fechar'=>false,
                        'include'=>'site.leiloes.lances.list_lances',
                    ]])
                </div>
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
</div>
{{-- <script>
    $(function(){
        $('#btn-ver_lances').on('click', function(){
            $('#modalLances').modal('show');
        });

    });
</script> --}}

