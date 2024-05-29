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

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($user) {
    //         $user->assignRole('siswa');
    //     });
    // }
}
