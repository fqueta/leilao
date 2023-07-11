@php
    $slug = isset($dados['post_name']) ? $dados['post_name'] : false;
    $title = isset($dados['post_title']) ? $dados['post_namtitle'] : false;
    $mein = isset($dados['post_content']) ? $dados['post_content'] : false;
@endphp
@extends('site.layout.app')
@section('title')
    Erro: 404
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
        {{-- @include('site.layout.banner-home') --}}
    @endif
    <div class="container">
            <h2 class="headline text-warning">404</h2>
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Pagina não encontrada.</h3>
            <p>
                Não foi possível encontrar a página que você estava procurando possivelmente está em contrução. Enquanto isso, <a href="{{route('index')}}">você pode retornar ao início</a>.
            </p>
            <form class="search-form">
                <div class="input-group">
                    <!--<input type="text" name="search" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
</button>
                    </div>-->
                </div>

            </form>
        </div>
@stop
