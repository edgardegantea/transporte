@extends('layouts.app')
@section('title', 'Unidades')

@section('content_header')
    <h1>Unidades / Crear nueva unidad</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <h1 style="text-align: center; font-size: 25px">Registro de nueva unidad</h1>
            <a href="{{ route('unidades.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left fa-shake" style="color: #ffffff;"></i> Regresar</a>

            <br><br>
            <div>
                <form action="{{ route('unidades.store') }}" method="POST" enctype="multipart/form-data" id="create">
                    @include('admin.unidades.partials.form')
                </form>
            </div>

            <div align="center">
                <br>
                <button class="btn btn-success" form="create">Crear</button>
            </div>
        </div>
    </div>
@stop
