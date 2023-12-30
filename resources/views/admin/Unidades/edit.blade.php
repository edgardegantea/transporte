@extends('layouts.app')
@section('title', 'Unidades')

@section('content_header')
    <h1>Unidades / DEditar unidad: {{ $unidad->numeroUnidad }}</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <h1 style="text-align: center; font-size: 25px">Formulario para editar infomración de la
            unidad: {{ $unidad->numeroUnidad}}</h1>
        <a href="{{ route('unidades.index') }}" class="btn btn-danger"><i
                class="fa-solid fa-arrow-left fa-shake" style="color: #ffffff;"></i> Regresar</a>

        <br><br>
        <div>
            <form action="{{ route ('unidades.update', $unidad->id_Unidad ) }}" method="POST"
                  enctype="multipart/form-data" id="create">
                @method('PUT')
                @include('admin.Unidades.partials.form')
            </form>
        </div>

        <div align="center">
            <br>
            <button class="btn btn-success" form="create">Actualizar</button>
        </div>
    </div>
</div>

@stop

