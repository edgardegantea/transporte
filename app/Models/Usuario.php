<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuario';
    protected $primaryKey = 'id_Usuario';

    public function unidades(){
        return $this->belongsToMany(Unidad::class, 'consecionario_unidad', 'id_Usuario', 'id_Unidad');
    }

}
