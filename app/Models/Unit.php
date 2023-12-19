<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'units';
    protected $fillable = [
        'numeroUnidad',
        'marca',
        'modelo',
        'placa',
        'capacidadPasajero',
        'fechaFabricacion',
        'fechaAdquisicion',
        'tipoCombustible',
        'kilometrajeActual',
        'descripcion',
        'status'
    ];
}
