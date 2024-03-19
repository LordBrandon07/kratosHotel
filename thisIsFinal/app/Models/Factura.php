<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Factura
 *
 * @property $id
 * @property $fecha
 * @property $impuesto
 * @property $total
 * @property $id_cliente
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleFactura[] $detalleFacturas
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Factura extends Model
{
    
    static $rules = [
		'fecha' => 'required|date',
		'impuesto' => 'required|numeric|max:20|min:0',
		'total' => 'required|numeric|min:0',
		'id_cliente' => 'required|min:0',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','impuesto','total','id_cliente'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleFacturas()
    {
        return $this->hasMany('App\Models\DetalleFactura', 'factura_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'documento', 'id_cliente');
    }
    

}
