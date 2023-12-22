@csrf

<div class="row">

        <div class="col-md-6">
            <label for="">Número de unidad:</label>
            <input type="text" class="form-control" name="numeroUnidad" value="{{ (isset($unidad))?$unidad->numeroUnidad:old('numeroUnidad')}}" required>

            <label for="">Marca:</label>
            <input type="text" class="form-control" name="marca" value="{{(isset($unidad))?$unidad->marca:old('marca')}}" required>

            <label for="">Modelo: </label>
            <input type="text" class="form-control" name="modelo" value="{{(isset($unidad))?$unidad->modelo:old('modelo')}}" required>

            <label for="">Placa: </label>
            <input type="text" class="form-control" name="placa" value="{{(isset($unidad))?$unidad->modelo:old('modelo')}}" required>

            <label for="">Capacidad de pasajeros: </label>
            <input type="text" class="form-control" name="capacidadPasajero" value="{{(isset($unidad))?$unidad->capacidadPasajero:old('capacidadPasajero')}}" required>

            <label for="">Fecha de Fabricación: </label>
            <input type="date" class="form-control" name="fechaFabricacion" value="{{(isset($unidad))?$unidad->fechaFabricacion:old('fechaFabricacion')}}" required>

        </div>

        <div class="col-md-6">

            <label for="">Fecha de Adquisición: </label>
            <input type="date" class="form-control" name="fechaAdquisicion" value="{{(isset($unidad))?$unidad->fechaAdquisicion:old('fechaAdquisicion')}}" required>

            <label for="">Tipo de Combustible: </label>
            <select class="form-control" name="tipoCombustible" required>
                <option value="Diesel" {{ (isset($unidad) && $unidad->tipoCombustible == 'Diesel') ? 'selected' : '' }}>Diesel</option>
                <option value="Gasolina" {{ (isset($unidad) && $unidad->tipoCombustible == 'Gasolina') ? 'selected' : '' }}>Gasolina</option>
                <option value="Gas" {{ (isset($unidad) && $unidad->tipoCombustible == 'Gas') ? 'selected' : '' }}>Gas</option>
            </select>

            <label for="">Kilometraje Actual: </label>
            <input type="number" class="form-control" name="kilometrajeActual" value="{{(isset($unidad))?$unidad->kilometrajeActual:old('kilometrajeActual')}}" required>

            <label for="">Descripción: </label>
            <textarea style="height: 115px" class="form-control" name="descripcion" required>{{ (isset($unidad)) ? $unidad->descripcion : old('descripcion') }}</textarea>

            <label for="">Estatus: </label>
            <select class="form-control" name="estatus" required>
                <option value="En servicio" {{ (isset($unidad) && $unidad->estatus == 'En servicio') ? 'selected' : '' }}>En servicio</option>
                <option value="Fuera de servicio" {{ (isset($unidad) && $unidad->estatus == 'Fuera de servicio') ? 'selected' : '' }}>Fuera de servicio</option>
                <option value="En reparación" {{ (isset($unidad) && $unidad->estatus == 'En reparación') ? 'selected' : '' }}>En reparación</option>
                <option value="En descanso" {{ (isset($unidad) && $unidad->estatus == 'En descanso') ? 'selected' : '' }}>En descanso</option>
            </select>
        </div>

</div>
