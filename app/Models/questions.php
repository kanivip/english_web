<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'vocabulary_id', 'question', 'a', 'b', 'c', 'd', 'answer'];
    public function vocabulary()
    {
        return $this->belongsTo(vocabularies::class);
    }
    public function category()
    {
        return $this->belongsTo(categories::class);
    }
}
