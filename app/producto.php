<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    //
    use Sluggable;
      /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }
    //
    protected $table='productos';
    protected $fillable = ['nombre','precio','image'];


    public function detallesProductos()
    {
        return $this->hasMany('App\detallesProductos');
    }


}
