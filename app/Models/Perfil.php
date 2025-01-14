<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfiles';
    
    protected $fillable = ['alumno_id', 'biografia'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}