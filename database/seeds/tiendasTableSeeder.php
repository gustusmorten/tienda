<?php

use Illuminate\Database\Seeder;

class tiendasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\tienda::class,3)->create();
    }
}
