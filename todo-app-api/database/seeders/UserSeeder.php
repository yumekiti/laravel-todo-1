<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            "name" => "test user",
            "email" => "test@test.test",
            "password" => bcrypt("testtest")
        ]);
        User::factory()->count(3)->create();

        DB::insert([
            "name" => "test DB user",
            "email" => "testDB@testDB.test.DB",
            "password" => Hash::make("testDB")
        ]);
    }
}
