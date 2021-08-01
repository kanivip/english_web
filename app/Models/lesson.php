<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    use HasFactory;
    protected $table = 'lessons';
    protected $fillable = ['level_id', 'thread', 'point_required'];

    public function questions()
    {
        return $this->belongsToMany(question::class);
    }


    public function users()
    {
        return $this->belongsToMany(user::class, 'learneds', 'lesson_id', 'user_id')->withPivot('status_buy', 'status_learned')->withTimestamps();
    }

    public function usersComment()
    {
        return $this->belongsToMany(user::class, 'comments', 'lesson_id', 'user_id')->withPivot('content')->withTimestamps();
    }

    public function level()
    {
        return $this->belongsTo(level::class);
    }
}