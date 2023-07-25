@section('title')
{{$config['title']}}
@endsection
<div class="row">
    <div class="col-md-6">
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
            <div class="col-12">
                <label for="termino">{{__('Término')}}: </label><b> {{$dados['termino']}} </b>
            </div>
            <div class="col-12">
                <label for="termino">{{__('Lance Atual')}}: </label><b> {{$dados['lance_atual']}} </b>
            </div>
            <div class="col-12 mb-3">
                <a href="javascript:verLances(\'{{$dados['id']}}\')">{{__('Ver Lances')}} </a>
            </div>
            <div class="col-12">
                @include('site.leiloes.dar_lances')
            </div>

            <div class="col-12">
                <small>* Valores acima do valor mínimo de lance entrarão como valor de reserva para lances automáticos.</small>
            </div>
        </div>
    </div>
</div>
