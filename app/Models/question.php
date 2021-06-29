<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'vocabulary_id', 'question', 'a', 'b', 'c', 'd', 'answer'];
    public function vocabulary()
    {
        return $this->belongsTo(vocabulary::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function lesson()
    {
        return $this->belongsToMany(lesson::class);
    }
}