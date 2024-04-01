<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => Str::random(20),
            'email' => Str::random(20) . '@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $this->call(PatientsSeeder::class);
        $this->call(MedecinsSeeder::class);
        $this->call(InfirmiersSeeder::class);
        $this->call(ConsultationsSeeder::class);
        
    }
}
