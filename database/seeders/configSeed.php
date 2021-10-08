<?php

namespace Database\Seeders;

use App\Models\app_config;
use Illuminate\Database\Seeder;

class configSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app_config::create([
            "raio_espaco" => 2,
            "trigger_denuncias" => 10,

        ]);
    }
}
