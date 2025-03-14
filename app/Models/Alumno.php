<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = ['nombre', 'email'];

    public function asignaturas()
{
    return $this->belongsToMany(Asignatura::class, 'notas')
                ->withPivot('nota')
                ->withTimestamps();
}

public function notas()
    {
        return $this->hasMany(Nota::class);
    }

    public function perfil()
    {
        return $this->hasOne(Perfil::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
