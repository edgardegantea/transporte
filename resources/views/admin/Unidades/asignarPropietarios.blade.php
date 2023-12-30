@extends('layouts.app')
@section('title', 'Unidades')

@section('content_header')
    <h1>Asignar propietarios a la unidad: {{ $unidad[0]->numeroUnidad }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('guardarAsignacionPropietarios') }}">
                @csrf
                <button type="submit" class="btn btn-success">Guardar asignación</button>
                <br><br>
                <input type="hidden"  name="unidadSeleccionada" value="{{ $unidad[0]->id_Unidad }}">

                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Seleccionar Concesionarios</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($consecionarios as $consecionario)
                        <tr>
                            <td>
                                <input type="checkbox" class="btn-check" name="seleccionados[]" value="{{ $consecionario->id_Usuario }}" id="{{ $consecionario->id_Usuario }}">
                                <label class="btn btn-outline-primary" for="{{ $consecionario->id_Usuario }}">{{ $consecionario->nombreCompleto }}</label>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@stop

