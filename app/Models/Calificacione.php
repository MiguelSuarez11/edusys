<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calificacione extends Model
{
    use HasFactory;


    protected $fillable=[
        'nota_1',
        'nota_2',
        'nota_3',
        'nota_4',
        'nota_definitiva',
        'estado'
    ];



    public $timestamp=false;
    public function estudiante()
    {
        return $this->hasOne(Personal::class, "personal_id", "id");
    }


    public function asignaturas()
    {
        return $this->hasOne(Asignatura::class, "asignatura_id", "id");
    }


    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, "asignatura_id", "id");
    }



    public function curso()
    {
        return $this->hasOne(Curso::class, "curso_id", "id");
    }

    public function cursos()
    {
        return $this->belongsTo(Curso::class, "curso_id", "id");
    }

    public function personals()
    {
        return $this->hasOne(Personal::class , 'personal_id' , 'id');
    }

    public function tipoDocumento()
    {
        return $this->hasOne(Periodo::class, 'periodo_id', 'id');
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_id');
    }

}
