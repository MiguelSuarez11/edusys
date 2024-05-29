<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class encabezados_det extends Model
{
    use HasFactory;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function encabezados()
    {
        return $this->hasMany(encabezados_det::class);
    }
}
