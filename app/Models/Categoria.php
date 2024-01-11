<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['nombre'];

    // Relación con Subcategoria
    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class);
    }

    // Relación con Video
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
