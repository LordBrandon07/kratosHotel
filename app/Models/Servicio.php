<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Servicio extends Model
{
    
    static $rules = [
		'valor' => 'required|numeric|min:0',
		'tipo_serv' => 'required',
    ];

    protected $perPage = 20;


    protected $fillable = ['valor','tipo_serv'];



    public function detalleFacturas()
    {
        return $this->hasMany('App\Models\DetalleFactura', 'servicio_id', 'id');
    }
    

}
