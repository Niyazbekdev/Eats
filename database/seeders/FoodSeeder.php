<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{

    public function run(): void
    {
        $foods = [
            [
                'name' => 'Big lavash',
                'description' => 'salad.jpeg',
                'price' => '1000',
                'menu_id' => 1,
                'image' => 'lavash.jpg'
            ],
            [
                'name' => 'burger',
                'description' => 'bul bolimde burger bar',
                'price' => '12000',
                'menu_id' => 2,
                'image' => 'burger.jpeg'
            ]
        ];
        DB::table('food')->insert($foods);
    }
}
