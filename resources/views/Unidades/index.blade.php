<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Unidades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container">
                        <div class="row">
                            <div class="col-2">
                                <a href="{{ route('unidades.create') }}" class="btn btn-success"><i class="fa-regular fa-plus fa-shake" style="color: #ffffff;"></i>Nueva Unidad</a>
                            </div>

                        </div>
                    </div>
                    <br>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Unidad</th>
                            <th>Placa</th>
                            <th>Adquisición</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($unidades as $unidad)
                            <tr>
                                <td>{{ $unidad->id }}</td>
                                <td>{{ $unidad->numeroUnidad }}</td>
                                <td>{{ $unidad->placa }}</td>
                                <td>{{ $unidad->fechaAdquisicion }}</td>
                                <td>{{ $unidad->status }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('unidades.show', [$unidad->id]) }}">Ver</a>
                                    <a class="btn btn-primary" href="{{ route('unidades.edit', [$unidad->id]) }}">Editar</a>

                                    <button class="btn btn-danger" form="delete_{{$unidad->id}}" onclick="return confirm('¿Estás seguro de eliminar la unidad?')">Eliminar</button>
                                    <form action="{{ route('unidades.destroy', $unidad->id)}}" id="delete_{{$unidad->id}}" method="post" enctype="multipart/form-data" hidden>
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
        </div>
    </div>
</x-app-layout>
