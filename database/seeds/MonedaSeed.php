<?php

use Illuminate\Database\Seeder;

class MonedaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'moneda' => 'Peso',],
            ['id' => 2, 'moneda' => 'Dolar',],

        ];

        foreach ($items as $item) {
            \App\Moneda::create($item);
        }
    }
}
