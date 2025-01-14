<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['alumno_id', 'titulo', 'contenido'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}