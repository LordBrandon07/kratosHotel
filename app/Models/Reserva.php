<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Reserva extends Model
{
    
    static $rules = [
		'adultos' => 'required|numeric|min:0|max:8',
		'ninos' => 'required|numeric|min:0|max:8',
		'fecha_inicio' => 'required|date|after_or_equal:yesterday',
		'fecha_final' => 'required|date|after:fecha_inicio',
		'valor' => 'required|numeric|min:0',
		'documento' => 'required|numeric',
		'nro_hab' => 'required|numeric',
		'est_id' => 'required',
    ];

    protected $perPage = 20;


    protected $fillable = ['adultos','ninos','fecha_inicio','fecha_final','valor','documento','nro_hab','est_id'];



    public function detalleFacturas()
    {
        return $this->hasMany('App\Models\DetalleFactura', 'reserva_id', 'id');
    }
    

    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'est_id');
    }


    public function habitaciones()
    {
        return $this->hasOne('App\Models\Habitacione', 'hab_numero', 'nro_hab');
    }
    

    public function user()
    {
        return $this->hasOne('App\Models\User', 'documento', 'documento');
    }
    

}
