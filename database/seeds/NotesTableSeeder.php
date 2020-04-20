<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('notes')->insert([
            'id' => '1',
            'noteName' => $faker->word,
            'noteText' => $faker->realText($maxNbChars = 200, $indexSize = 3),
            'noteColor' => $faker->randomElement(['#dddd63', '#f06363', '#675cc8']),
            'remember_token' => 'session_id',
            'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = '-15 days', $timezone = null),
            'updated_at' => $faker->dateTimeBetween($startDate = '-15 days', $endDate = 'now', $timezone = null)
        ]);


        foreach (range(1, 100) as $index) {
            DB::table('notes')->insert([
                'id' => '1',
                'noteName' => $faker->word,
                'noteText' => $faker->realText($maxNbChars = 200, $indexSize = 3),
                'noteColor' => $faker->randomElement(['#dddd63', '#f06363', '#675cc8']),
                'remember_token' => 'session_id',
                'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = '-15 days', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-15 days', $endDate = 'now', $timezone = null)
            ]);

            DB::table('notes')->insert([
                'id' => $faker->numberBetween($min = 1, $max = 100),
                'noteName' => $faker->word,
                'noteText' => $faker->realText($maxNbChars = 200, $indexSize = 3),
                'noteColor' => $faker->randomElement(['#dddd63', '#f06363', '#675cc8']),
                'remember_token' => 'session_id',
                'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = '-15 days', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-15 days', $endDate = 'now', $timezone = null)
            ]);
        }
    }
}
