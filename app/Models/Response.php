<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;
use App\Models\Student;

class Response extends Model
{
    use HasFactory;
    protected $table = 'responses';

    protected $fillable = [
        'teacher_id',
        'exams_id',
        'right_ans',
        'wrong_ans',
        'result_json',
    ];
    public function exams()
    {
        return $this->belongsTo(Exam::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
