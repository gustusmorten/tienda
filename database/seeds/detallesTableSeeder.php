<?php

use Illuminate\Database\Seeder;

class detallesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalles')->insert([

            'venta_id' => random_int(1,10),
            'cantidad' => random_int(1,10),
        ]);
    }
}
