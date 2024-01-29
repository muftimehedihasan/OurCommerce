<?php
namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Create 20 users with unique emails and random OTPs
        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'email' => $faker->unique()->safeEmail(),
                'otp' => $faker->randomNumber(6, true),  // 6-digit OTP
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
