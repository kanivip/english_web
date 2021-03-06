<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'point', 'user_id'];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}