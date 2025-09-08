<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Departement;

class RegionDepartementSeeder extends Seeder
{
    public function run()
    {
        // Liste des régions et départements du Burkina Faso
        $data = [
            'Centre' => ['Ouagadougou', 'Kaya', 'Ziniaré'],
            'Centre-Est' => ['Tenkodogo', 'Koupéla', 'Gounghin'],
            'Centre-Nord' => ['Koudougou', 'Boussé', 'Kongoussi'],
            'Centre-Ouest' => ['Koudougou', 'Béré', 'Sissili'],
            'Est' => ['Fada N’Gourma', 'Gorom-Gorom', 'Gounghin'],
            'Hauts-Bassins' => ['Bobo-Dioulasso', 'Banfora', 'Kénédougou'],
            'Nord' => ['Ouahigouya', 'Dori', 'Titao'],
            'Sahel' => ['Dori', 'Gorom-Gorom', 'Djibo'],
            'Sud-Ouest' => ['Gaoua', 'Poni', 'Noumbiel'],
            'Boucle du Mouhoun' => ['Dédougou', 'Boromo', 'Toma'],
            'Cascades' => ['Banfora', 'Karangasso-Vigué', 'Sidéradougou'],
            'Plateau-Central' => ['Ziniaré', 'Boussé', 'Komsilga'],
            'Est' => ['Fada N’Gourma', 'Gorom-Gorom', 'Gounghin'],
        ];

        foreach ($data as $regionName => $departements) {
            $region = Region::create(['nom' => $regionName]);

            foreach ($departements as $departementName) {
                Departement::create([
                    'nom' => $departementName,
                    'region_id' => $region->id
                ]);
            }
        }
    }
}
