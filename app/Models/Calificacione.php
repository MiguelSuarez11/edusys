<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $fillable=[
        'nota_1',
        'nota_2',
        'nota_3',
        'nota_4',
        'nota_definitiva'
    ];



    public $timestamp=false;
    public function estudiante()
    {
        return $this->hasOne(Personal::class, "personal_id", "id");
    }
    public function materia()
    {
        return $this->hasOne(materias::class, "materia_id", "id");
    }



    public function curso()
    {
        return $this->hasOne(Curso::class, "curso_id", "id");
    }

    public function personal()
    {
        return $this->hasOne(Personal::class , 'id' , 'personal_id');
    }

    


}
