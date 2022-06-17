<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';

    protected $fillable = [
        'exams_id',
        'type',
        'question',
        'options',
        'answer',
    ];

    public function exam(){
        return $this->belongsTo(Exam::class, 'exams_id', 'id');
    }
}
