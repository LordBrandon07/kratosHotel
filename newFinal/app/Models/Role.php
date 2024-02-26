<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['nombre','descripcion'];


    public function users(){
        return $this->hasMany('App\Models\User', 'id_rol', 'id');
    }
    
}
