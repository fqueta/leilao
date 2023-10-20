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
        <div class="col-md-12">
            <h1 class="m-0 tit-sep" >Painel</h1>
        </div>
        @include('admin.leilao.lista_leilao_terminado')
        <!-- /.col -->
        {{-- <div class="col-sm-6 text-right">
            <div class="btn-group" role="group" aria-label="actions">
                @can('create','familias')
                    <a href="{{route('familias.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Novo cadastro</a>
                @endcan
                <a href="{{route('familias.index')}}" class="btn btn-secondary"><i class="fa fa-list"></i> Ver cadastros</a>
            </div>
        </div><!-- /.col --> --}}
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
