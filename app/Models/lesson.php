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
    public function level()
    {
        return $this->belongsTo(level::class);
    }
}