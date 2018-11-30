<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(BarrioSeed::class);
        $this->call(MonedaSeed::class);
        $this->call(PermissionSeed::class);
        $this->call(TipooperacionSeed::class);
        $this->call(PropiedadeSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(RoleSeedPivot::class);
        $this->call(UserSeedPivot::class);

    }
}
