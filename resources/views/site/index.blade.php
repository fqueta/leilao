@php
    $_REQUEST['post'] = isset($dados) ? $dados : false;
    $post_id = isset($dados['ID']) ? $dados['ID'] : false;
    $slug = isset($dados['post_name']) ? $dados['post_name'] : false;
    $slug2 = isset($dados['slug2']) ? $dados['slug2'] : false;
    $title = isset($dados['post_title']) ? $dados['post_namtitle'] : false;
    $main = (new App\Http\Controllers\siteController)->get_main_post($post_id);
@endphp
@extends('site.layout.app')
@section('title')
    {{$title}}
@stop
@section('banner-topo')
    @if ($slug=='home')
        @include('site.layout.banner-home')
    @else
        @include('site.layout.banner-sec')
    @endif
@stop
@section('main')
    @if ($slug=='home')
    @endif
    @include('site.layout.main')
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
@stop
