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
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan', 'id_jurusan');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function($siswa){
            $user_siswa = User::where('nisn',$siswa->nisn)->first();
            if($user_siswa === null){
                $user = User::create([
                    'nisn' => $siswa->nisn,
                    'name' => $siswa->name,
                    'password' => $siswa->password,
                    'role' => 'Siswa',
                ]);
                $user->assignRole('siswa');
            }else{
                $user_siswa->update([
                    'nisn' => $siswa->nisn,
                    'name' => $siswa->name,
                    'password' => $siswa->password,
                    'role' => 'Siswa',
                ]);
            }
            $laporan = Laporan::create([
                'nisn' => $siswa->nisn,
                'name' => $siswa->name,
            ]);
        });
    }
}
