<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'start', 'end', 'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Curso::class);
    }
}
