<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
        'cpf',
        'address',
        'phone',
        'cep',
        'is_admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'email_verified_at'
    ];

    protected $casts = [
        'birth_date' => 'datetime:Y-m-d',
        'is_admin' => 'boolean'
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'user_id');
    }
}
