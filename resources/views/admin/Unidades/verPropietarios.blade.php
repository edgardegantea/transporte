@extends('layouts.app')
@section('title', 'Unidades')

@section('content_header')
    <h1>Propietarios de la unidad: {{ $unidad[0]->numeroUnidad }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <a href="{{ route('unidades.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left fa-shake" style="color: #ffffff;"></i> Regresar</a>
            <br><br>
            <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Teléfono</td>
                    <td>Acciones</td>
                </tr>
                </thead>

                <tbody>

                @foreach($propietarios as $propietario)
                    <tr>
                        <td>{{ $propietario->id_consecionarioUnidad  }}</td>
                        <td>{{ $propietario->nombreCompleto }}</td>
                        <td>{{ $propietario->telefono }}</td>
                        <td>
                            <form action="{{ route('eliminarPropietarios', $propietario->id_consecionarioUnidad) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" type="submit" onclick="return confirm('¿Está seguro que desea quitar a esta persona como propietario?')"><i class="fa-solid fa-user-minus"></i>  Quitar</button>
                            </form>
                        </td>

                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>
    </div>
@stop

