@php
    $_REQUEST['post'] = isset($dados) ? $dados : false;
    $post_id = isset($dados['ID']) ? $dados['ID'] : false;
    $seg1 = request()->segment(1); //link da página em questão
    $seg2 = request()->segment(2); //link da página em questão
    $slug = isset($dados['post_name']) ? $dados['post_name'] : $seg1;
    $slug2 = isset($dados['slug2']) ? $dados['slug2'] : $seg2;
    $title = isset($dados['post_title']) ? $dados['post_title'] : false;
    $main = (new App\Http\Controllers\siteController)->get_main_post($post_id);
@endphp
@extends('site.layout.app')
@section('title')
    {{$title}}
@stop
@section('banner-topo')
    @if ($slug=='home')
        @include('site.layout.banner-home')
    @elseif ($slug=='leiloes-publicos')

        @if ($slug2==null)
            {{-- @include('site.layout.banner-home') --}}
        @endif
    @else
    {{dd($slug)}}
        @include('site.layout.banner-sec')
    @endif
@stop
@section('main')
    @if ($slug=='home')
    @elseif ($slug=='email')
        @include('site.layout.email')
    @else
        @include('site.layout.main')
    @endif
@stop
@section('css')
    <link rel="stylesheet" href="{{url('/')}}/css/select2.css">
    @include('qlib.csslib')
    <link rel="stylesheet" href="{{url('/')}}/DataTables/DataTables-1.11.5/css/dataTables.bootstrap4.min.css">
    <script src="{{url('/')}}/vendor/jquery/jquery.min.js"></script>

@stop
@section('js')
    @include('qlib.jslib')
    <script src="{{url('/')}}/js/select2.min.js" ></script>
    <script src="{{url('/')}}/DataTables/datatables.min.js" ></script>
    <script>
        $('#inp-password').val('');
        $('[mask-cpf]').inputmask('999.999.999-99');
        $('[mask-cnpj]').inputmask('99.999.999/9999-99');
        $('[mask-data]').inputmask('99/99/9999');
        $('[mask-cep]').inputmask('99.999-999');
    </script>
@stop
