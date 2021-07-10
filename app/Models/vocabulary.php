<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vocabulary extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'meaning', 'content', 'image'];
    public function question()
    {
        return $this->hasMany(Question::class);
    }
}