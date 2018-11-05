<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detallesProductos extends Model
{
    protected $table='detallesProductos';
    protected $fillable=['detalle_id','producto_id','cantidad'];

    public function producto()
    {
        return $this->belongsTo('App\producto');
    }

    public function detalles()
    {
        return $this->belongsTo('App\detalle');
    }

}
