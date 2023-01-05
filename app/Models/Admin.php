<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // use HasFactory;
    protected $table = "admin";
    protected $fillable = [
        'id', 
        'firstname', 
        'lastname', 
        'email',
        'phone', 
        'password', 
        'conf_password', 
        'created_at', 
    ];
}
