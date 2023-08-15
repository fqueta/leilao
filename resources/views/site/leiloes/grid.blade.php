<div class="col-md-4">
    <div class="card">
      <img class="card-img-top" src="{{$v['src']}}" alt="{{$v['post_title']}}">
      <div class="card-body">
        <h4 class="card-title">{{$v['post_title']}}</h4>
        <p>
            <b>{{__('Termina em')}}</b>
        </p>
        <p>
            {{$info_termino}}
        </p>
      </div>
      <div class="card-footer">
        <a href="{{$v['link']}}" class="btn btn-outline-primary w-100">{{__('Ver leilão')}}</a>
        @can('is_admin2')
            <a href="{{$v['link_edit_admin']}}" class="btn btn-outline-secondary w-100 mt-2">{{__('Edit')}}</a>
        @endcan
      </div>
    </div>
</div>

