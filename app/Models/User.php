<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'email',
        'password',
        'last_name',
        'phone',
        'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }

    public function role()
    {
        return $this->belongsTo(role::class);
    }

    public function status()
    {
        return $this->belongsTo(status::class);
    }
    public function lessons()
    {
        return $this->belongsToMany(lesson::class, 'learneds', 'user_id', 'lesson_id')->withPivot('status_learned', 'status_buy')->withTimestamps();
    }

    public function lessonsComment()
    {
        return $this->belongsToMany(lesson::class, 'comments', 'user_id', 'lesson_id')->withPivot('content')->withTimestamps();
    }

    public function learneds()
    {
        return $this->belongsToMany(lesson::class, 'learneds', 'user_id', 'lesson_id')->wherePivot('status_learned', 1);
    }

    public function histories()
    {
        return $this->hasMany(history::class);
    }

    public function vip()
    {
        return $this->hasOne(vip::class);
    }

    public function reason()
    {
        return $this->belongsTo(ban_reasons::class, 'ban_reason_id', 'id');
    }
}