<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vip extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'start_day', 'end_day'];
}
