<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create 20 customer profiles with unique user IDs
        for ($i = 0; $i < 20; $i++) {
            DB::table('customer_profiles')->insert([
                'cus_name' => $faker->name(),
                'cus_add' => $faker->streetAddress(),
                'cus_city' => $faker->city(),
                'cus_state' => $faker->state(),
                'cus_postcode' => $faker->postcode(),
                'cus_country' => $faker->country(),
                'cus_phone' => $faker->phoneNumber(),
                'cus_fax' => $faker->optional()->phoneNumber(),
                'ship_name' => $faker->name(),
                'ship_add' => $faker->streetAddress(),
                'ship_city' => $faker->city(),
                'ship_state' => $faker->state(),
                'ship_postcode' => $faker->postcode(),
                'ship_country' => $faker->country(),
                'ship_phone' => $faker->phoneNumber(),
                'user_id' => $i + 1, // Ensure unique user IDs
            ]);
        }
    }
}

