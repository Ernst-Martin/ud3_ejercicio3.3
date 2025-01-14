# Ejercicios de Relaciones en Laravel

## Relación N:N (Alumnos-Asignaturas a través de Notas)
Se implementó la relación muchos a muchos entre alumnos y asignaturas utilizando la tabla notas como tabla pivote.

// Modelo Alumno
public function asignaturas()
{
   return $this->belongsToMany(Asignatura::class, 'notas')
               ->withPivot('nota')
               ->withTimestamps();
}

// Modelo Asignatura
public function alumnos()
{
   return $this->belongsToMany(Alumno::class, 'notas')
               ->withPivot('nota')
               ->withTimestamps();
}

## Relación 1:1 (Alumno-Perfil)
Se creó una relación uno a uno entre alumno y perfil:

// Migración de perfiles
Schema::create('perfiles', function (Blueprint $table) {
   $table->id();
   $table->foreignId('alumno_id')->unique()->constrained('alumnos')->onDelete('cascade');
   $table->text('biografia');
   $table->timestamps();
});

// Modelo Alumno
public function perfil()
{
   return $this->hasOne(Perfil::class);
}

// Modelo Perfil
public function alumno()
{
   return $this->belongsTo(Alumno::class);
}

## Relación 1:N (Alumno-Posts)
Se implementó una relación uno a muchos entre alumno y posts:

// Migración de posts
Schema::create('posts', function (Blueprint $table) {
   $table->id();
   $table->foreignId('alumno_id')->constrained('alumnos')->onDelete('cascade');
   $table->string('titulo');
   $table->text('contenido');
   $table->timestamps();
});

// Modelo Alumno
public function posts()
{
   return $this->hasMany(Post::class);
}

// Modelo Post
public function alumno()
{
   return $this->belongsTo(Alumno::class);
}

Cada relación implementa:
- Migraciones correspondientes
- Modelos con sus relaciones
- Claves foráneas con restricciones de integridad
- Eliminación en cascada cuando corresponde
