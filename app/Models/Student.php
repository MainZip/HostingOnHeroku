<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Examlink;
use App\Models\Permit;
use App\Models\Assignstudent;
use App\Models\Response;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fistname',
        'lastname',
        'gender',
        'course',
        'schoolyear',
        'email',
        'password',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function examlink(){
        return $this->hasMany(Examlink::class, 'student_id', 'id');
    }
    public function permit(){
        return $this->hasMany(Permit::class);
    }
    public function assignstudent(){
        return $this->hasMany(Assignstudent::class);
    }
    public function response(){
        return $this->hasMany(Response::class);
    }
}
