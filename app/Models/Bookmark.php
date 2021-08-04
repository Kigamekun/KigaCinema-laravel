<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{


    protected $fillable = ['user_id','movie_id'];
    use HasFactory;
}
