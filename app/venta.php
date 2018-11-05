<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    protected $table='ventas';
    protected $fillable=['fecha','cliente_id','tienda_id'];

    public function cliente()
    {
        return $this->belongsTo('App\cliente');
    }

    public function tienda()
    {
        return $this->belongsTo('App\tienda');
    }
    public function detalle()
    {
        return $this->hasOne('App\detalle');
    }

}
