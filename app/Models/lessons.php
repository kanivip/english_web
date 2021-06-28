<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lessons extends Model
{
    use HasFactory;
    protected $fillable = ['level_id', 'thread'];
    public function questions()
    {
        return $this->belongsToMany(questions::class);
    }
}