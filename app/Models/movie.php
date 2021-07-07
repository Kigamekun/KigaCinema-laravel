<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    protected $fillable = ['title','thumb','on_air','price','description','country'];
    use HasFactory;
}
