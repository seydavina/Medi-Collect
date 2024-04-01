<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedecinsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medecins')->insert([
            'matricule' => 'M001',
            'mail' => 'medecin@gmail.com',
            'specialite' => 'Généraliste',
            'adresse' => 'Adresse du médecin',
            'compte' => 'Nom d\'utilisateur du médecin',
        ]);
    }
}
