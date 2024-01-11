<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';
    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['titulo', 'descripcion', 'categoria_id', 'subcategoria_id', 'estatus', 'link'];

    // Relación con Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relación con Subcategoria
    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }
}