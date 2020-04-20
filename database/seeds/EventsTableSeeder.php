<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            DB::table('events')->insert([
                'id' => '1',
                'eventTitle' => $faker->word,
                'eventDescription' => $faker->realText($maxNbChars = 200, $indexSize = 3),
                'startDate' => $faker->dateTimeBetween($startDate = 'now', $endDate = '15 days', $timezone = null),
                'endDate' => $faker->dateTimeBetween($startDate = '15 days', $endDate = '30 days', $timezone = null),
                'allday' => $faker->boolean,
                'eventLocation' => $faker->address,
                'recipients' => $faker->email,
                'remember_token' => 'session_id',
                'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = '-15 days', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-15 days', $endDate = 'now', $timezone = null)
            ]);

            DB::table('events')->insert([
                'id' => $faker->numberBetween($min = 1, $max = 100),
                'eventTitle' => $faker->word,
                'eventDescription' => $faker->realText($maxNbChars = 200, $indexSize = 3),
                'startDate' => $faker->dateTimeBetween($startDate = 'now', $endDate = '15 days', $timezone = null),
                'endDate' => $faker->dateTimeBetween($startDate = '15 days', $endDate = '30 days', $timezone = null),
                'allday' => $faker->boolean,
                'eventLocation' => $faker->address,
                'recipients' => $faker->email,
                'remember_token' => 'session_id',
                'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = '-15 days', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-15 days', $endDate = 'now', $timezone = null)
            ]);
        }
    }
}

