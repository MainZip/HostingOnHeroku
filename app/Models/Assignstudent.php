<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Examlink;
use App\Models\Student;
use App\Models\Exam;

class Assignstudent extends Model
{
    use HasFactory;
    protected $table = 'assignstudents';

    protected $fillable = [
        'examlink_id',
        'student_id',
        'exams_id',
    ];
    public function examlink()
    {
        return $this->belongsTo(Examlink::class, 'examlink_id', 'id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exams_id', 'id');
    }
}
