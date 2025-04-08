<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMiquiz extends Model
{
    use HasFactory;

    protected $table = 'user_miquiz';
    protected $fillable = ['name', 'email', 'password'];
}
