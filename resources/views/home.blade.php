@extends('adminlte::page')

@section('title')
{{config('app.name')}} {{config('app.version')}} - Painel
@stop
@section('footer')
    @include('footer')
@stop

@section('content_header')

@stop

@section('content')
    @include('admin.partes.header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{__('Painel')}}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Site</a></li>
                <li class="breadcrumb-item active">{{__('Painel Admin')}}</li>
            </ol>
        </div>
    </div>
    <div class="row mb-2">
        @include('admin.leilao.lista_leilao_terminado')
        @include('admin.blacklist.cardpainel')
    </div>


  </div>
@stop

@section('css')
    @include('qlib.csslib')
    <style>
        .tit-sep{
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
@stop

@section('js')
    @include('qlib.jslib')
    {{-- @include('mapas.jslib') --}}
@stop
