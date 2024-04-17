<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;

class Guru extends Authenticatable implements AuthenticatableContract
{
    use HasFactory, HasApiTokens, HasRoles, Notifiable;

    protected $table = 'guru';

    protected $fillable = [
        'nip',
        'image',
        'name',
        'email',
        'password',
        'alamat',
        'jenis_kelamin',
        'mata_pelajaran',
    ];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran', 'id_mata_pelajaran');
    }
}

