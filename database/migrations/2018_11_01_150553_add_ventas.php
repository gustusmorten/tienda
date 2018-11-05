<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha')->nullable();
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('tienda_id')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('tienda_id')->references('id')->on('tiendas')->onDelete('set null');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
