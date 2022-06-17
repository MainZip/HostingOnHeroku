<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Teacher;
use App\Models\Examlink;

class Subject extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'subjects';

    protected $fillable = [
        'subject',
        'slug',
        'semester',
        'sy',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'subject'
            ]
        ];
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
    public function examlink(){
        return $this->hasMany(Examlink::class, 'subject_id', 'id');
    }
}
