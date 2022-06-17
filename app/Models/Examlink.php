<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Subject;

class Examlink extends Model
{
    use HasFactory;
    protected $table = 'examlinks';

    protected $fillable = [
        'subject_id',
        'student_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function assignstudent()
    {
        return $this->hasMany(Assignstudent::class, 'examlink_id', 'id');
    }
}
