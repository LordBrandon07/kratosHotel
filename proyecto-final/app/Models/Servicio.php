<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 *
 * @property $id
 * @property $valor
 * @property $tipo_serv
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleFactura[] $detalleFacturas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{
    
    static $rules = [
		'valor' => 'required',
		'tipo_serv' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['valor','tipo_serv'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleFacturas()
    {
        return $this->hasMany('App\Models\DetalleFactura', 'servicio_id', 'id');
    }
    

}
