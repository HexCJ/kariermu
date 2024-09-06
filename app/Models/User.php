<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $table = 'users';

    protected $fillable = [
        'nisn',
        'nip',
        'id_admin',
        'name',
        'password',
        'role',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'nisn');
    }
    public function guru()
    {
        return $this->hasOne(Guru::class, 'nip');
    }
    public function admin()
    {
        return $this->hasOne(Admin::class, 'id_admin');
    }
    public function laporan()
    {
        return $this->hasOne(Laporan::class, 'nisn','nisn');
    }

    // protected static function boot(){
    //     parent::boot();

    //     static::created(function($user){
    //         if($user->role === 'Admin'){
    //             $admin = Admin::create([
    //                 'id_admin' => $user->id_admin,
    //                 'name' => $user->name,
    //                 'password' => $user->password,
    //             ]);
    //             $user->assignRole('admin');
    //         }
    //         elseif($user->role === 'Guru'){
    //             $guru = Guru::create([
    //                 'nip' => $user->nip,
    //                 'name' => $user->name,
    //                 'password' => $user->password,
    //             ]);
    //             $user->assignRole('guru');
    //         }
    //         elseif($user->role === 'Siswa'){
    //             $user->assignRole('siswa');
    //             $siswa = Siswa::create([
    //                 'nisn' => $user->nisn,
    //                 'name' => $user->name,
    //                 'password' => $user->password,
    //             ]);
    //             $datalaporansiswa = Laporan::create(['nisn' => $user->nisn, 'name' => $user->name]); 
    //         }
    //     });
    // }
}
