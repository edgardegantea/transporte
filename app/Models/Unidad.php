<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_Unidad';
    protected $table = 'unidad';
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
        'estatus'
    ];

    public function usuarios(){
        return $this->belongsToMany(User::class, 'concesionario_unidad', 'id_Unidad', 'id_Usuario');
    }
}
