<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $categories = Category::all();
        $brands = Brand::all();
        $tags = Tag::all();

        for ($i = 0; $i < 40; $i++) {
            
            $name = $faker->words(3, true);

            $newProduct = new Product();

            $newProduct->name = ucfirst($name);
            $newProduct->slug = Str::slug($name . '-' . $i);
            $newProduct->description = $faker->paragraph(4);
            $newProduct->price = $faker->randomFloat(2, 5, 500);
            $newProduct->stock = $faker->numberBetween(0, 100);
            $newProduct->image = 'https://via.placeholder.com/300';

            $newProduct->brand_id = $brands->random()->id;
            $newProduct->category_id = $categories->random()->id;

            $newProduct->save();

            $randomTags = $tags->random(rand(2, 5))->pluck('id');
            $newProduct->tags()->attach($randomTags);
        }
    }
}
