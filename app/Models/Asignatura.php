<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function alumnos()
{
    return $this->belongsToMany(Alumno::class, 'notas')
                ->withPivot('nota')
                ->withTimestamps();
}
}
