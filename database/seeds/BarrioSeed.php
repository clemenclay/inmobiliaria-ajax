<?php

use Illuminate\Database\Seeder;

class BarrioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'barrio' => 'Almagro',],
            ['id' => 2, 'barrio' => 'Abasto',],

        ];

        foreach ($items as $item) {
            \App\Barrio::create($item);
        }
    }
}
