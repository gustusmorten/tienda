<?php

use Illuminate\Database\Seeder;

class ventasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ventas')->insert([

            'cliente_id' => random_int(1,10),
            'tienda_id' => random_int(2,10),
        ]);
    }
}
