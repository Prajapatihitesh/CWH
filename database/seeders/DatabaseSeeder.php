<?php

namespace Database\Seeders;
use Database\Seeders\languageSeeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"=>"Hitesh",
            "email"=>"hp8866763022@gmail.com",
            "password"=> Hash::make("Hitesh2001@")
        ]);
        $this->call([
            languageSeeder::class,
        ]);
    }
}
