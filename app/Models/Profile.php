<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    use HasFactory;
    protected $fillable = [
         'address', 'birthday', 'avatar', 'user_id', 'phone'
    ];
}
