<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable = ['Nombre','Descripcion' , 'Fecha','Hora'];

    static $rules = [
		'Nombre' => 'required',
		'Descripcion' => 'required',
    ];
}
