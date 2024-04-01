<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Factura extends Model
{
    
    static $rules = [
		'fecha' => 'required|date',
		'impuesto' => 'required|numeric|max:20|min:0',
		'total' => 'required|numeric|min:0',
		'id_cliente' => 'required|min:0',
    ];

    protected $perPage = 20;


    protected $fillable = ['fecha','impuesto','total','id_cliente'];



    public function detalleFacturas()
    {
        return $this->hasMany('App\Models\DetalleFactura', 'factura_id', 'id');
    }
    

    public function user()
    {
        return $this->hasOne('App\Models\User', 'documento', 'id_cliente');
    }
    

}
