<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_subjects', 'subject_id', 'teacher_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
