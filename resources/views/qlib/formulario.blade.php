@php
    $config = $conf['config'];
    $campos = $conf['campos'];
    $value = $conf['value'];
    $frontend = App\Qlib\Qlib::is_frontend();
    if($frontend){
        $config['route'] = str_replace('_adm','',@$config['route']);
    }
    $route_store = isset($config['route_store']) ? $config['route_store'] : $config['route'].'.store';
    $route_update = isset($config['route_update']) ? $config['route_update'] : $config['route'].'.update';
    // dd($config);
@endphp

<form id="{{$config['frm_id']}}" class="" action="@if($config['ac']=='cad'){{ route($route_store) }}@elseif($config['ac']=='alt'){{ route($route_update,['id'=>$config['id']]) }}@endif" method="post">
    @if($config['ac']=='alt')
    @method('PUT')
    @endif
    <div class="row">
        <div class="col-md-12 text-right">
            @if (isset($value['id']))
                <label for="">Id:</label> {{ $value['id'] }}
            @endif
            @if (isset($value['created_at']))
                <label for="">Cadastro:</label> {{ Carbon\Carbon::parse($value['created_at'])->format('d/m/Y') }}
            @endif

        </div>
        @if (isset($campos) && is_array($campos))
            @foreach ($campos as $k=>$v)
                @if (isset($v['cp_busca'])&&!empty($v['cp_busca']))
                    @php
                        $cf = explode('][',$v['cp_busca']);
                        if(isset($cf[1])){
                            $value[$k] = @$value[$cf[0]][$cf[1]];
                        }
                    @endphp
                @endif
                @if (isset($v['type']) && $v['type']=='select_multiple')
                    @php
                        $nk = str_replace('[]','',$k);
                        $value[$k] = isset($value[$nk])?$value[$nk]:false;
                    @endphp
                @endif
                @if (isset($v['type']) && ($v['type']=='select_multiple' || $v['type']=='html_vinculo'))
                    @php
                        $nk = str_replace('[]','',$k);
                        if (isset($v['cp_busca'])&&!empty($v['cp_busca'])){
                            $cf = explode('][',$v['cp_busca']);
                            if(isset($cf[1])){
                                if(empty($value[$k])){
                                    $value[$k] = @$value[$cf[0]][$cf[1]];
                                    if(!$value[$k]){
                                        $value[$k] = isset($value[$nk])?$value[$nk]:false;
                                    }
                                }
                            }
                        }else{
                            $value[$k] = isset($value[$nk])?$value[$nk]:false;
                        }

                    @endphp
                @endif

            {{App\Qlib\Qlib::qForm([
                    'type'=>@$v['type'],
                    'campo'=>$k,
                    'label'=>@$v['label'],
                    'placeholder'=>@$v['placeholder'],
                    'ac'=>$config['ac'],
                    'value'=>isset($v['value'])?$v['value']: @$value[$k],
                    'tam'=>@$v['tam'],
                    'event'=>@$v['event'],
                    'checked'=>@$value[$k],
                    'selected'=>@$v['selected'],
                    'arr_opc'=>@$v['arr_opc'],
                    'option_select'=>@$v['option_select'],
                    'class'=>@$v['class'],
                    'class_div'=>@$v['class_div'],
                    'rows'=>@$v['rows'],
                    'cols'=>@$v['cols'],
                    'data_selector'=>@$v['data_selector'],
                    'script'=>@$v['script'],
                    'title'=>@$v['title'],
                    'valor_padrao'=>@$v['valor_padrao'],
                    'dados'=>@$v['dados'],
            ])}}
            @endforeach
        @endif
        @csrf

        @include('qlib.btnsalvar')
    </div>
</form>
