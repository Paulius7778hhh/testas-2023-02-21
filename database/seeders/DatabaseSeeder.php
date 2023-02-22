<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Bosh',
            'email' => 'boshwhirpool@gmail.com',
            'password' => Hash::make('10000'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Dan',
            'email' => 'danban@gmail.com',
            'password' => Hash::make('399'),
            'role' => 'user',
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $faker = Faker::create();
        foreach (range(0, 15) as $_) {
            DB::table('cities')->insert([
                'title' => $faker->city,

            ]);
        }
        foreach (range(0, 50) as $_) {
            DB::table('restaurants')->insert([
                'title' => rand(1, 4) > 2 ? $faker->streetName : '' . '' . $faker->company,
                'address' => $faker->streetAddress,
                'work_start' => $faker->dayOfWeek($min = 'now'),
                'work_end' => $faker->dayOfWeek($max = 'now'),
                'city_id' => rand(1, 15),

            ]);
        }
    }
}
