@if (isset($seguindo) && is_array($seguindo) && isset($dados_pg))
    @section('title')
    {{@$dados_pg['post_title']}}
    @endsection
@endif
