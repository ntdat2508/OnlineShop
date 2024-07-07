<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Nguyen Van A',
                'email' => 'ANguyenVan@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '0325331312',
                'address' => 'Van Quan, Ha Dong, Ha Noi',
                'role' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Nguyen Van B',
                'email' => 'BNguyenVan@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '0325331311',
                'address' => 'Van Quan, Ha Dong, Ha Noi',
                'role' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Nguyen Van C',
                'email' => 'CNguyenVan@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '0325331313',
                'address' => 'Van Quan, Ha Dong, Ha Noi',
                'role' => 2,
            ],
            [
                'id' => 4,
                'name' => 'Le Van F',
                'email' => 'FLeVan@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '0325331314',
                'address' => 'Van Quan, Ha Dong, Ha Noi',
                'role' => 3,
            ],
        ]);

        DB::table('brands')->insert([
            [
                'name' => 'Calvin Klein',
            ],
            [
                'name' => 'Diesel',
            ],
            [
                'name' => 'Polo',
            ],
            [
                'name' => 'Tommy Hilfiger',
            ],
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'Men',
            ],
            [
                'name' => 'Women',
            ],
            [
                'name' => 'Kids',
            ],
        ]);

        DB::table('products')->insert([
            [
                'id' => 1,
                'brand_id' => 1,
                'category_id' => 2,
                'name' => 'Pure Pineapple',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'price' => 629.99,
                'quantity' => 20,
                'tag' => 'Clothing',
            ],
            [
                'id' => 2,
                'brand_id' => 2,
                'category_id' => 2,
                'name' => 'Guangzhou sweater',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'price' => 35,
                'quantity' => 20,
                'tag' => 'Clothing',
            ],
            [
                'id' => 3,
                'brand_id' => 3,
                'category_id' => 2,
                'name' => 'Guangzhou sweater',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'price' => 35,
                'quantity' => 20,
                'tag' => 'Clothing',
            ],
            [
                'id' => 4,
                'brand_id' => 4,
                'category_id' => 1,
                'name' => 'Microfiber Wool Scarf',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'price' => 64,
                'quantity' => 20,
                'tag' => 'Accessories',
            ],
            [
                'id' => 5,
                'brand_id' => 1,
                'category_id' => 3,
                'name' => "Men's Painted Hat",
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'price' => 44,
                'quantity' => 20,
                'tag' => 'Accessories',
            ],
            [
                'id' => 6,
                'brand_id' => 1,
                'category_id' => 2,
                'name' => 'Converse Shoes',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'price' => 35,
                'quantity' => 20,
                'tag' => 'Clothing',
            ],
            [
                'id' => 7,
                'brand_id' => 1,
                'category_id' => 1,
                'name' => 'Pure Pineapple',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod temporull',
                'price' => 64,
                'quantity' => 20,
                'tag' => 'HandBag',
            ],
            [
                'id' => 8,
                'brand_id' => 1,
                'category_id' => 1,
                'name' => '2 Layer Windbreaker',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'price' => 44,
                'quantity' => 20,
                'tag' => 'Clothing',
            ],
            [
                'id' => 9,
                'brand_id' => 1,
                'category_id' => 1,
                'name' => 'Converse Shoes',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'price' => 35,
                'quantity' => 20,
                'tag' => 'Shoes',
            ],
        ]);

        DB::table('product_details')->insert([
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => 'S',
                'quantity' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => 'M',
                'quantity' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => 'L',
                'quantity' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => 'XS',
                'quantity' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'yellow',
                'size' => 'S',
                'quantity' => 0,
            ],
            [
                'product_id' => 1,
                'color' => 'violet',
                'size' => 'S',
                'quantity' => 0,
            ],
        ]);

        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'path' => 'product-1.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-1.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-2.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2.jpg',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8.jpg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9.jpg',
            ],
        ]);

        DB::table('product_ratings')->insert([

            [
                'product_id' => 1,
                'user_id' => 2,
                'name' => 'Nguyen Van B',
                'email' => 'NguyenVanB@gmail.com',
                'evaluate' => 'Nice !',
                'rating' => 4,
            ],
            [
                'product_id' => 1,
                'user_id' => 3,
                'name' => 'Nguyen Van C',
                'email' => 'NguyenVanC@gmail.com',
                'evaluate' => 'Nice !',
                'rating' => 4,
            ],
        ]);
    }
}
