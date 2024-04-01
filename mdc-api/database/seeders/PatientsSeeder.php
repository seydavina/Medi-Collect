<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('patients')->insert([
            'numero' => 'P002',
            'infoSocio' => 'Informations socio-démographiques du patient',
            'antecedent' => 'Antécédents médicaux du patient',
            'signesCliniques' => 'Signes Cliniques du patient',
        ]);
    }
}
