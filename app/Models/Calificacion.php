<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;


    protected $table = 'calificacions';


    protected $fillable = [
        'personal_id',
        'periodo_1', 'periodo_2', 'periodo_3', 'periodo_4', 'nota_final', 'estado'
    ];


    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Personal::class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }


    public $timestamp=false;
    // public function estudiante()
    // {
    //     return $this->hasOne(Personal::class, "personal_id", "id");
    // }
    public function materia()
    {
        return $this->hasOne(materias::class, "materia_id", "id");
    }



    // public function curso()
    // {
    //     return $this->hasOne(Curso::class, "curso_id", "id");
    // }

    public function personal()
    {
        return $this->hasOne(Personal::class , 'id' , 'personal_id');
    }


}
