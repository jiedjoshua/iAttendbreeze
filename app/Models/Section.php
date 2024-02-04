<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    public function students()
    {
        return $this->belongsToMany(Student::class, 'section_student');
    }
}
