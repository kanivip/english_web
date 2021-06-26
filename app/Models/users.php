<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'first_name', 'last_name', 'email', 'address'];
    public function question()
    {
        return $this->hasMany(Question::class);
    }
}