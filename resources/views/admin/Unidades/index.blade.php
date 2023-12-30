 @extends('layouts.app')
@section('title', 'Unidades')

@section('content_header')
    <h1>Unidades</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="">
                <a href="{{ route('unidades.create') }}" class="btn btn-success"><i class="fa-regular fa-plus fa-shake" style="color: #ffffff;"></i>Nueva Unidad</a>
            </div>
            <br>
            <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Unidad</th>
                    <th>Marca</th>
                    <th>No. Placa</th>
                    <th>Estatus</th>
                    <th>Prop. Acc.</th>
                    <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($unidades as $unidad)
                    <tr>
                        <td>{{ $unidad->id_Unidad }}</td>
                        <td>{{ $unidad->numeroUnidad }}</td>
                        <td>{{ $unidad->marca }}</td>
                        <td>{{ $unidad->placa }}</td>
                        <td>{{ $unidad->estatus }}</td>

                        <td>
                            <a class="btn btn-outline-primary" href="{{ route('asignarPropietarios', [$unidad->id_Unidad]) }}"><i class="fa-solid fa-plus"></i></a>
                            <a class="btn btn-outline-primary" href="{{ route('verPropietarios', [$unidad->id_Unidad]) }}"> {{ \App\Models\Concesionario_unidad::where('id_Unidad', $unidad->id_Unidad)->count() }} </a>
                        </td>

                        <td>
                            <a class="btn btn-success" href="{{ route('unidades.show', [$unidad->id_Unidad]) }}"> <i class="fa-regular fa-eye"></i> </a>
                            <a class="btn btn-primary" href="{{ route('unidades.edit', [$unidad->id_Unidad]) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                            <button class="btn btn-danger" form="delete_{{$unidad->id_Unidad}}" onclick="return confirm('¿Está seguro de eliminar la unidad?')"><i class="fa-solid fa-trash"></i></button>
                            <form action="{{ route('unidades.destroy', $unidad->id_Unidad)}}" id="delete_{{$unidad->id_Unidad}}" method="post" enctype="multipart/form-data" hidden>
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>
@stop

