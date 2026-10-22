<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $tags = [
            'Organic',
            'Plastic-Free',
            'Reusable',
            'Biodegradable',
            'Eco-Friendly',
            'Vegan',
            'Zero Waste',
            'Handmade',
            'Fair Trade',
            'Sustainable',
            'Recyclable',
            'Natural',
            'Non-Toxic',
            'Carbon Neutral',
            'Locally Sourced',
            'Cruelty Free',
            'Energy Efficient',
            'Compostable',
            'Eco Packaging',
            'Green Certified'
        ];

        foreach ($tags as $tag) {

            $newTag = new Tag();

            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag);
            $newTag->description = $faker->sentence(15);

            $newTag->save();
        }
    }
}
