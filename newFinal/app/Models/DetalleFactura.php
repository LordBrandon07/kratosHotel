<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleFactura
 *
 * @property $id
 * @property $factura_id
 * @property $reserva_id
 * @property $servicio_id
 * @property $producto_id
 * @property $cantidad
 * @property $valor
 * @property $created_at
 * @property $updated_at
 *
 * @property Factura $factura
 * @property Producto $producto
 * @property Reserva $reserva
 * @property Servicio $servicio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleFactura extends Model
{
    
    static $rules = [
		'factura_id' => 'required',
		'reserva_id' => 'required',
		'servicio_id' => 'required',
		'producto_id' => 'required',
		'cantidad' => 'required',
		'valor' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['factura_id','reserva_id','servicio_id','producto_id','cantidad','valor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function factura()
    {
        return $this->hasOne('App\Models\Factura', 'id', 'factura_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'producto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reserva()
    {
        return $this->hasOne('App\Models\Reserva', 'id', 'reserva_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function servicio()
    {
        return $this->hasOne('App\Models\Servicio', 'id', 'servicio_id');
    }
    

}
