<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tipo extends Model
{
    
    static $rules = [
		'name' => 'required',
		'description' => 'required',
    ];

    protected $perPage = 20;


    protected $fillable = ['name','description'];



}
