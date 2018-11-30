<?php

use Illuminate\Database\Seeder;

class TipooperacionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'tipooperacion' => 'Venta',],
            ['id' => 2, 'tipooperacion' => 'Alquiler',],

        ];

        foreach ($items as $item) {
            \App\Tipooperacion::create($item);
        }
    }
}
