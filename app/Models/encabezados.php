<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class encabezados extends Model
{
    use HasFactory;
     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function encabezados_det()
    {
        return $this->belongsTo(encabezados::class,'encabezados_id');
    }
}
