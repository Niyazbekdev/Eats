<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AMenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Salad',
                'image' => 'salad.jpeg'
            ],
            [
                'name' => 'soap',
                'image' => 'soap.jpeg'
            ]
        ];
        DB::table('menus')->insert($menus);
    }
}
