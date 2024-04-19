<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = [
        'id_admin',
        'name',
        'email',
        'password',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
