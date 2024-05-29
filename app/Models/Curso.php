<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 *
 * @property $id
 * @property $nombre
 * @property $nomenclatura
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Calificacione[] $calificaciones
 * @property HorarioCurso[] $horarioCursos
 * @property Personal[] $personals
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Curso extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'nomenclatura' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','nomenclatura','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calificaciones()
    {
        return $this->hasMany('App\Models\Calificacione', 'curso_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarioCursos()
    {
        return $this->hasMany('App\Models\HorarioCurso', 'curso_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personals()
    {
        return $this->hasMany('App\Models\Personal', 'curso_id', 'id');
    }
    

}
