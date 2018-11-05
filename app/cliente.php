<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class cliente extends Authenticatable
{
    use Notifiable;
    protected $guard = 'cliente';
    protected $table = 'clientes';

    protected $fillable = ['name', 'email', 'password', 'type'];


    protected $hidden = ['password', 'remember_token'];

    public function ventas()
    {
        return $this->hasMany('App\venta');
    }

}
