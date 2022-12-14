<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::insert([
            "name"=>"Ahmet Atılgan",
            "email"=>"kazimnazir480@gmail.com",
            "email_verified_at"=>now(),
            "type"=>"admin",
            "password"=>"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "remember_token"=>Str::random(10),
        ]);

        User::factory(5)->create();
    }
}
