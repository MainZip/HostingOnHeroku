<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    use HasFactory;
    protected $table = 'permits';

    protected $fillable = [
        'term',
        'semester',
        'sy',
        'course',
        'permit',
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
