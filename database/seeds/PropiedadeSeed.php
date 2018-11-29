<?php

use Illuminate\Database\Seeder;

class PropiedadeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'propiedades' => 'cvx',],

        ];

        foreach ($items as $item) {
            \App\Propiedade::create($item);
        }
    }
}
