<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('users')->insert([
            [
                "roles_id" => "1",
                "genders_id" => "1",
                "firstname" => "Test",
                "lastname" => "Admin",
                "email" => "admin1@gmail.com",
                "display_picture_link" => $faker->image('public/storage/images',640,480, null, false),
                "password" => Hash::make('admin123')
            ],
            [
                "roles_id" => "2",
                "genders_id" => "1",
                "firstname" => "Test",
                "lastname" => "User",
                "email" => "User1@gmail.com",
                "display_picture_link" => $faker->image('public/storage/images',640,480, null, false),
                "password" => Hash::make('users123')
            ]
        ]);
    }
}
