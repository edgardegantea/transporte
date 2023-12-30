<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concesionario_unidad extends Model
{
    use HasFactory;
    protected $table = 'consecionario_unidad';
    protected $primaryKey = 'id_consecionarioUnidad';
    protected $fillable = ['id_Usuario', 'id_Unidad'];
}
