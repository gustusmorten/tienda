<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle extends Model
{
    protected $table='detalles';
    protected $fillable=['venta_id','total'];


    public function venta()
    {
        return $this->belongsTo('App\venta');
    }

    public function detallesProductos()
    {
        return $this->hasMany('App\detallesProductos');
    }
}
