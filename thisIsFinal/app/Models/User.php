<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    static $rules = [
		'tipo_doc' => 'required',
		'documento' => 'required',
		'nombres' => 'required',
		'apellidos' => 'required',
		'fecha_nacimiento' => 'required',
		'email' => 'required',
        'password' => 'required',
		'telefono' => 'required',
		'id_rol' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['tipo_doc','documento','nombres','apellidos','fecha_nacimiento','email','password','telefono','id_rol'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    public function role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'id_rol');
    }
    

}
