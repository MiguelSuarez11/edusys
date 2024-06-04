<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    // Definir los campos que pueden ser asignados en masa
    protected $table = 'asistencias';

    protected $fillable = [
        'event',
        'start_date',
        'end_date' // Agregar la columna 'estado' al array fillable
    ];
}

