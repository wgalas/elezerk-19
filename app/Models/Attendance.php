<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'section_id',
        'remarks',
    ];

    public function student () {
        return $this->belongsTo(Student::class);
    }

    public function subject () {
        return $this->belongsTo(Subject::class);
    }
    public function section () {
        return $this->belongsTo(Section::class);
    }
}
