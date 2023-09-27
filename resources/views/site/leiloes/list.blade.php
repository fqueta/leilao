@php
$post = isset($_REQUEST['post']) ? $_REQUEST['post'] : false;
$seg1 = request()->segment(1); //link da página em questão
$seg2 = request()->segment(2); //link da página em questão
$urlB = App\Qlib\Qlib::get_slug_post_by_id(37); //link da pagina para cosulta de leiloes no site.
// dd($dados1);
@endphp
<style>
    .div-salvar {
        position: initial;
        margin-top:10px;
    }
</style>
<div class="row mt-5">
    <div class="col-md-12" id="lista">
        @if($seg1==$urlB && !$seg2)
            @php
            //listar leilões para o plublico
                $ret = view('site.leiloes.list_grid',['dados'=>@$dados,'config'=>$config]);
                echo $ret;
            @endphp
        @elseif($seg1==$urlB && $seg2)
            @php
            //Detalhes do leilao
                $ret = view('site.leiloes.detalhes',['dados'=>@$dados,'config'=>$config]);
                echo $ret;
            @endphp
        @else
            <div class="card mb-3">
                <div class="card-header">
                    <h5>{{__('Leilões Ganhos')}}</h5>
                </div>
                <div class="card-body">
                    @if(isset($ganhos) && is_array($ganhos))
                        <table class="table table-striped">
                            <head>
                                <tr>
                                    <th>{{__('Leilão')}}</th>
                                    <th>{{__('Termino')}}</th>
                                    <th>{{__('Valor')}}</th>
                                    <th class="text-center">{{__('Status')}}</th>
                                    <th class="text-end">{{__('Ação')}}</th>
                                </tr>
                            </head>
                            <tbody>
                                @foreach ( $ganhos as $k=>$v)

                                    <tr>
                                        <td>{{$v['post_title']}}</td>
                                        <td>{{@$v['term']['html']}}</td>
                                        <td>{{App\Qlib\Qlib::valor_moeda(@$v['venc']['valor_lance'])}}</td>
                                        <td class="text-center">
                                            @php echo @$v['situacao_pagamento'] @endphp
                                        </td>
                                        @if (isset($v['status_pago']) && ($v['status_pago']=='s' || $v['status_pago']=='a'))
                                            <td class="">
                                                @php
                                                    echo (new App\Http\Controllers\PaymentController) -> get_info_pagamento($v['ID'])
                                                @endphp
                                            </td>
                                        @else
                                            <td class="text-end">
                                                    @php
                                                    $acao = '<a href="'.@$v['link_pagamento'].'" class="btn btn-success">'.__('Pagar').'</a>';
                                                    echo $acao;
                                                    @endphp
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                {{-- <div class="card-footer text-muted">
                    Footer
                </div> --}}
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        @if (!empty($arr_titulo))
                            Lista de:

                            @foreach ($arr_titulo as $k=>$pTitulo)
                                <label for=""> Todo com {{ $k }}</label> = {{ $pTitulo }}, e
                            @endforeach
                        @else
                            {{ $titulo_tabela }}
                        @endif
                        <div class="float-end"><a href="{{url('/')}}/{{App\Qlib\Qlib::get_slug_post_by_id(2)}}" class="btn btn-primary"> <i class="fas fa-plus"></i> {{__('Novo cadastro')}}</a></div>
                        </h4>

                    {{-- @can('is_admin_logado')
                    <div class="card-tools d-flex d-print-none">
                            @include('familias.dropdow_actions')
                            @include('qlib.dropdow_acaomassa')
                    </div>
                    @endcan --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        {{
                            App\Qlib\Qlib::listaTabela([
                            'campos_tabela'=>$campos_tabela,
                            'config'=>$config,
                            'dados'=>$dados,
                            'routa'=>$routa,
                            //   'fileLista'=>'listaTabelaSite',
                        ])}}
                    </div>
                </div>
                <div class="card-footer d-print-none">
                    <div class="table-responsive">
                        @if ($config['limit']!='todos')
                        {{ $dados->appends($_GET)->links() }}
                        @endif
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
<script>
    $(function(){
        $('[exportar-filter]').on('click',function(e){
            e.preventDefault();
            var urlAtual = window.location.href;
            var d = urlAtual.split('?');
            url = '';
            if(d[1]){
                url = $(this).attr('href');
                url = url+'?'+d[1];
            }
            if(url)
                abrirjanelaPadrao(url);
                //window.open(url, "_blank", "toolbar=1, scrollbars=1, resizable=1, width=" + 1015 + ", height=" + 800);
            //confirmDelete($(this));
        });
        $('[data-del="true"]').on('click',function(e){
            e.preventDefault();
            confirmDelete($(this));
        });
        $('[name="filter[cpf]"],[name="filter[cpf_conjuge]"]').inputmask('999.999.999-99');
        $(' [order="true"] ').on('click',function(){
            var val = $(this).val();
            var url = lib_trataAddUrl('order',val);
            window.location = url;
        });
    });
</script>
