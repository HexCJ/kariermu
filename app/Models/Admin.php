<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = [
        'id_admin',
        'name',
        'photo',
        'email',
        'jenis_kelamin',
        'password',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }

    protected static function boot(){
        parent::boot();

        static::creating(function($admin){
            $data_admin = [
                'id_admin' => $admin->id_admin,
                'name' => $admin->name,
                'password' => $admin->password,
            ];
            $admin_user = User::create($data_admin);
            $admin_user->assignRole('admin');
        });
    }
}
