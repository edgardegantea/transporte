@extends('layouts.app')
@section('title', 'Unidades')

@section('content_header')
    <h1>Unidades / Detalles de la unidad: {{ $unidad->numeroUnidad }}</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <h1 style="text-align: center; font-size: 25px">Información general de la unidad: {{ $unidad->numeroUnidad}}</h1>
        <a href="{{ route('unidades.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left fa-shake" style="color: #ffffff;"></i> Regresar</a>

        <div class="row">
            <div class="col align-self-start">
            </div>

            <div class="col align-self-center">

                <label for=""><b>Número de unidad: </b></label>
                <label for=""> {{$unidad->numeroUnidad}} </label>

                <br><br>

                <label for=""><b>Marca: </b></label>
                <label for=""> {{$unidad->marca}} </label>

                <br><br>

                <label for=""><b>Modelo: </b></label>
                <label for="">{{$unidad->modelo}} </label>
                <br><br>

                <label for=""><b>Placa: </b></label>
                <label for="">{{$unidad->placa}} </label>
                <br><br>

                <label for=""><b>Capacidad: </b></label>
                <label for="">{{$unidad->capacidadPasajero}} </label>
                <br><br>

                <label for=""><b>Fecha de Fabricación: </b></label>
                <label for="">{{$unidad->fechaFabricacion}} </label>
                <br><br>

                <label for=""><b>Fecha de Adquisición: </b></label>
                <label for="">{{$unidad->fechaAdquisicion}} </label>
                <br><br>

                <label for=""><b>Tipo de Combustible: </b></label>
                <label for="">{{$unidad->tipoCombustible}} </label>
                <br><br>

                <label for=""><b>Kilometraje Actual: </b></label>
                <label for="">{{$unidad->kilometrajeActual}} </label>
                <br><br>

                <label for=""><b>Descripción: </b></label>
                <label for="">{{$unidad->descripcion}} </label>
                <br><br>

                <label for=""><b>Estatus: </b></label>
                <label for="">{{$unidad->estatus}} </label>

            </div>

            <div class="col align-self-end">
            </div>
        </div>
    </div>
</div>
@stop
