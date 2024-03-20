<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Estado extends Model
{
    
    static $rules = [
		'name' => 'required|regex:/^[a-zA-Z\s]+$/',
    ];

    protected $perPage = 20;


    protected $fillable = ['name'];



}
