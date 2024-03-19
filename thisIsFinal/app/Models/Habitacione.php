<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Habitacione extends Model
{
    
    static $rules = [
		'hab_numero' => 'required|regex:/^\d{3}$/',
		'tipo_hab' => 'required',
		'tarifa' => 'required|numeric|max:9999999999',
		'capacidad' => 'required|numeric|between:1,8',
		'ruta_imagen' => 'required',
        'disponible' => 'required|in:1,0',
    ];

    protected $perPage = 20;


    protected $fillable = ['hab_numero','tipo_hab','tarifa','capacidad','ruta_imagen','disponible'];



    public function tipo()
    {
        return $this->hasOne('App\Models\Tipo', 'id', 'tipo_hab');
    }


    public function reservas()
    {
        return $this->hasMany('App\Models\Reservas', 'hab_numero', 'nro_hab');
    }
    

}
