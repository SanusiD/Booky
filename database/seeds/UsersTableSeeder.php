<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('users')->insert([
            'firstName' => 'Damilola',
            'lastName' => 'Sanusi',
            'phoneNumber' => $faker->phoneNumber,
            'password' => bcrypt('password'),
            'email' => 'dami@dami.ca',
            'city' => 'Oshawa',
            'state' => 'Ontario',
            'country' => 'Canada',
            'isAdmin' => '1',
            'remember_token' => 'session_id',
            'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = '-15 days', $timezone = null),
            'updated_at' => $faker->dateTimeBetween($startDate = '-15 days', $endDate = 'now', $timezone = null)
        ]);


        foreach (range(1, 100) as $index) {
            DB::table('users')->insert([
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'phoneNumber' => $faker->phoneNumber,
                'password' => bcrypt('password'),
                'email' => $faker->email,
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => $faker->country,
                'isAdmin' => $faker->randomElement(['0', '0', '0', '0', '0', '0', '0', '0', '0', '1']),
                'remember_token' => 'session_id',
                'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = '-15 days', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-15 days', $endDate = 'now', $timezone = null)
            ]);
        }
    }
}
