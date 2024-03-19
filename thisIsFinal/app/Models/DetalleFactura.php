<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DetalleFactura extends Model
{
    
    static $rules = [
		'factura_id' => 'required',
		'reserva_id' => '',
		'servicio_id' => '',
		'cantidad' => 'required|numeric|min:0',
		'valor' => 'required|numeric|min:0',
    ];

    protected $perPage = 20;


    protected $fillable = ['factura_id','reserva_id','servicio_id','cantidad','valor'];



    public function factura()
    {
        return $this->hasOne('App\Models\Factura', 'id', 'factura_id');
    }
    

    public function reserva()
    {
        return $this->hasOne('App\Models\Reserva', 'id', 'reserva_id');
    }
    

    public function servicio()
    {
        return $this->hasOne('App\Models\Servicio', 'id', 'servicio_id');
    }
    

}
