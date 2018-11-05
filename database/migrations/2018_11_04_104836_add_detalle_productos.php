<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetalleProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallesProductos',function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('producto_id')->unsigned()->nullable();
            $table->integer('detalle_id')->unsigned()->nullable();
            $table->integer('cantidad')->unsigned()->nullable();

            $table->foreign('detalle_id')->references('id')->on('detalles')->onDelete('cascade');;
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');;
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('detalles_productos');
    }
}
