<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Admin extends User
{
    use HasFactory;
    protected $fillable = ['name','email','password'];
}
