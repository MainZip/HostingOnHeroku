<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Teacher;
use App\Models\Question;
use App\Models\Response;
use App\Models\Assignstudent;

class Exam extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'exams';

    protected $fillable = [
        'title',
        'slug',
        'date',
        'duration',
        'status',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function assignstudent(){
        return $this->hasMany(Assignstudent::class, 'exams_id', 'id');
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
    public function question(){
        return $this->hasMany(Question::class);
    }
    public function response(){
        return $this->hasMany(Response::class, 'exams_id', 'id');
    }
}
