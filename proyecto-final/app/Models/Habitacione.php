<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Habitacione
 *
 * @property $id
 * @property $hab_numero
 * @property $estado
 * @property $tipo_hab
 * @property $tarifa
 * @property $capacidad
 * @property $ruta_imagen
 * @property $created_at
 * @property $updated_at
 *
 * @property Tipo $tipo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Habitacione extends Model
{
    
    static $rules = [
		'hab_numero' => 'required',
		'estado' => 'required',
		'tipo_hab' => 'required',
		'tarifa' => 'required',
		'capacidad' => 'required',
		'ruta_imagen' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['hab_numero','estado','tipo_hab','tarifa','capacidad','ruta_imagen'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipo()
    {
        return $this->hasOne('App\Models\Tipo', 'id', 'tipo_hab');
    }
    

}
