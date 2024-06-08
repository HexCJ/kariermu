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
        'image',
        'name',
        'email',
        'password',
        'alamat',
        'jenis_kelamin',
        'mata_pelajaran',
        'walikelas',
        'urutan_kelas',
        'jurusan',
    ];


    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran', 'id_mata_pelajaran');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nip');
    }

    protected static function boot(){
        parent::boot();
        static::creating(function($guru){
            $user_guru = User::where('nip',$guru->nip)->first();
            if($user_guru === null){
                $user = User::create([
                    'nip' => $guru->nip,
                    'name' => $guru->name,
                    'password' => $guru->password,
                    'role' => 'Guru',
                ]);
                $user->assignRole('guru');
            }else{
                $user_guru->update([
                    'nip' => $guru->nip,
                    'name' => $guru->name,
                    'password' => $guru->password,
                    'role' => 'Guru',
                ]);
            }
        });
    }
}

