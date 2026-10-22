<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $categories = [
            'Eco Home',
            'Sustainable Fashion',
            'Organic Food',
            'Zero Waste',
            'Natural Skincare',
            'Reusable Products',
            'Green Technology',
            'Eco Travel',
            'Home Cleaning Eco',
            'Plastic Free Living',
            'Natural Health',
            'Eco Office',
            'Sustainable Kids',
            'Outdoor & Nature',
            'Eco Living Essentials'
        ];

        foreach ($categories as $category) {

            $newCategory = new Category();

            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category);
            $newCategory->description = $faker->sentence(18);

            $newCategory->save();
        }
    }
}
