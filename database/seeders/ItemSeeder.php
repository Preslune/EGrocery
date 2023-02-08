<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                "item_name" => "Carrot",
                "item_desc" => "Its a Carrot",
                "price" => 15000
            ],
            [
                "item_name" => "Potato",
                "item_desc" => "Its a Potato",
                "price" => 15000
            ],
            [
                "item_name" => "Broccoli",
                "item_desc" => "Its a Broccoli",
                "price" => 15000
            ],
            [
                "item_name" => "Eggplant",
                "item_desc" => "Its an Eggplant",
                "price" => 15000
            ],
            [
                "item_name" => "Lettuce",
                "item_desc" => "Its a Lettuce",
                "price" => 15000
            ],
            [
                "item_name" => "Pea",
                "item_desc" => "Its a Pea",
                "price" => 15000
            ],
            [
                "item_name" => "Pumpkin",
                "item_desc" => "Its a Pumpkin",
                "price" => 15000
            ],
            [
                "item_name" => "Spinach",
                "item_desc" => "Its a Spinach",
                "price" => 15000
            ],
            [
                "item_name" => "Leek",
                "item_desc" => "Its a Leek",
                "price" => 15000
            ],
            [
                "item_name" => "Tomato",
                "item_desc" => "Its a Tomato",
                "price" => 15000
            ],
            [
                "item_name" => "Garlic",
                "item_desc" => "Its a Garlic",
                "price" => 15000
            ],
            [
                "item_name" => "Onion",
                "item_desc" => "Its an Onion",
                "price" => 15000
            ],
            [
                "item_name" => "Pepper",
                "item_desc" => "Its a Pepper",
                "price" => 15000
            ]
        ]);
    }
}
