<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfirmiersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('infirmiers')->insert([
            'matricule' => 'I001',
            'compte' => 'Nom d\'utilisateur de l\'infirmier',
            'adresse' => 'Adresse de l\'infirmier',
        ]);
    }
}
