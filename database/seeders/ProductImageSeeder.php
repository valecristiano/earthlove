<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Recupero img prodotti dalla cartella
        $images = Storage::disk('public')->files('productsImg');

        //prendo prodotti
        $products = Product::all();

        foreach ($products as $index => $product) {

            // assegno img ai prodotti in ciclo - modulo fa fare ciclo
            $product->image = $images[$index % count($images)];

            // prezzo casuale tra 5 e 40 €
            $product->price = fake()->randomFloat(2, 5, 40);

            $product->save();
        }
    }
    }

