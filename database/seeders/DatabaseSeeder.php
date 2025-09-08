<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ---- Utilisateur admin ----
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // mot de passe: password
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ---- Régions ----
        $regionIds = DB::table('regions')->insertGetId([
            'nom' => 'Centre',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $regionNordId = DB::table('regions')->insertGetId([
            'nom' => 'Nord',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ---- Départements ----
        $deptOuaga = DB::table('departements')->insertGetId([
            'nom' => 'Ouagadougou',
            'region_id' => $regionIds,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $deptYako = DB::table('departements')->insertGetId([
            'nom' => 'Yako',
            'region_id' => $regionNordId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ---- Patronymes ----
        DB::table('patronymes')->insert([
            [
                'nom' => 'Ouedraogo',
                'region_id' => $regionIds,
                'departement_id' => $deptOuaga,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Zongo',
                'region_id' => $regionNordId,
                'departement_id' => $deptYako,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
