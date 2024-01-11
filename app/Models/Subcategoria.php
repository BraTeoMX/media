<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $table = 'subcategoria';
    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'categoria_id'];

    // Relación con Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relación con Video
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}