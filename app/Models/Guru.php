<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = [
        'nip',
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
