<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\vs_tipo_documento;
use App\Models\vs_genero;
use App\Models\Curso;
use App\Models\Calificacione;
use App\Models\Asignatura;


/**
 * Class Personal
 *
 * @property $id
 * @property $tipo_documento
 * @property $numero_documento
 * @property $nombres
 * @property $apellidos
 * @property $direccion
 * @property $fech_nacimiento
 * @property $genero
 * @property $estado
 * @property $created_at
 * @property $updated_at
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Personal extends Model
{

    static $rules = [
        'tipo_documento' => 'required',
        'numero_documento' => 'required',
        'nombres' => 'required|string',
        'apellidos' => 'required|string',
        'direccion' => 'required|string',
        'correo' => 'required|email',
        'cursos' =>'required',
    ];

    static $messages = [
        'numero_documento.required' => 'El número de documento es obligatorio.',
        'tipo_documento.required' => 'Debe seleccionar su tipo de documento',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_documento', 'numero_documento', 'nombres', 'apellidos', 'direccion', 'telefono', 'correo', 'fech_nacimiento', 'cursos', 'genero'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoDocumento()
    {
        return $this->hasOne(vs_tipo_documento::class, 'id', 'tipo_documento');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function generos()
    {
        return $this->hasOne(vs_genero::class, 'id', 'genero');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }

    public function curso()
    {
        return $this->hasOne(Curso::class, 'id', 'cursos');
    }

    public function roles()
    {
        return $this->user->roles();
    }

    

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }
}
