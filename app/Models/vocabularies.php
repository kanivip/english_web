<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vocabularies extends Model
{
    use HasFactory;
    protected $fillable = ['name','meaning','content','image'];
}