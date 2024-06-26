<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'name',
        'email',
        'password',
        'alamat',
        'tahun_lulus',
        'jenis_kelamin',
        'status',
        'kelas',
        'urutan_kelas',
        'jurusan',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nisn');
    }
    
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'nisn');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'nisn');
    // }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan', 'id_jurusan');
    }
}
