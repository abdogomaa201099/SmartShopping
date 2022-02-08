<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'=> 'T-shirt',
            'image_name'=> 'im1.jpg',
            'price'=>200,
        ]);

        Product::create([
            'name'=> 'Shoes',
            'image_name'=> 'im2.jpg',
            'price'=>150,
        ]);

        Product::create([
            'name'=> 'Jacket',
            'image_name'=> 'im3.jpg',
            'price'=>450,
        ]);

        Product::create([
            'name'=> 'Trouser',
            'image_name'=> 'im4.jpg',
            'price'=>190,
        ]);

        Product::create([
            'name'=> 'Scarf',
            'image_name'=> 'im5.jpg',
            'price'=>50,
        ]);

        Product::create([
            'name'=> 'Hat',
            'image_name'=> 'im6.jpg',
            'price'=>60,
        ]);
    }
}
