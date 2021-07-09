<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $fillable = ['movie_id','user_id','ticket_token','name','seat','has_pay','date','room']; 
    use HasFactory;
}
