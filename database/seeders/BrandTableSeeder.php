<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
      $brands = [
            'EcoWave',
            'GreenNest',
            'PureEarth',
            'NatureLoop',
            'BioSphere',
            'EverGreen Co',
            'ReRoot',
            'EarthKind',
            'Sustainify',
            'Organic Origins',
            'Leaf & Living',
            'Green Horizon',
            'Blue Planet Goods',
            'WildCrafted',
            'EcoBloom',
            'Natural State',
            'TerraNova Eco',
            'GoodPlanet',
            'ZeroWaste Lab',
            'BloomCycle'
        ];

        foreach ($brands as $brand) {

            $newBrand = new Brand();

            $newBrand->name = $brand;
            $newBrand->slug = Str::slug($brand);
            $newBrand->description = $faker->sentence(20);

            $newBrand->save();
        }
    }
}
