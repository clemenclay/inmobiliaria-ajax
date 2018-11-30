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
            
            ['id' => 1, 'publicado' => 1, 'titulo' => 'asdasd', 'descripcion' => 'asdasdasdasdasddasdasdasd', 'precio' => '234324.00', 'moneda_id' => 1, 'barrio_id' => 1, 'operacion_id' => 1,],

        ];

        foreach ($items as $item) {
            \App\Propiedade::create($item);
        }
    }
}
