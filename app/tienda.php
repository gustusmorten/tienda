<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tienda extends Model
{
    protected $table = 'tiendas';
    protected $fillable = ['nombre','direccion'];

    public function ventas()
    {
        return $this->hasMany('App\venta');
    }

}
