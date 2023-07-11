@php
$post = isset($_REQUEST['post']) ? $_REQUEST['post'] : false;

@endphp
<style>
    .div-salvar {
        position: initial;
        margin-top:10px;
    }
</style>
<div class="row mt-5">
    <div class="col-md-12" id="lista">
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
