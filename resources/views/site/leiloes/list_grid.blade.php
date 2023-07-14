
<div class="row">
    @php
    $li = false;
    @endphp
    @if (is_object($dados))
        @foreach ($dados as $k=>$v )
            @php
                $v['src'] = App\Qlib\Qlib::get_thumbnail_link($v['ID']);
                $v['link'] = App\Qlib\Qlib::get_the_permalink($v['ID'],$v);
                $li .= view('site.leiloes.grid',[
                    'v'=>$v
                ]);
            @endphp
        @endforeach
        @php
            echo $li;
        @endphp
    @endif
</div>
