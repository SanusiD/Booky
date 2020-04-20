<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TodosTableSeeder extends Seeder
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
            DB::table('todolist')->insert([
                'todoName' => $faker->word,
                'id' => '1',
                'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = '-15 days', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-15 days', $endDate = 'now', $timezone = null)
            ]);

            DB::table('todolist')->insert([
                'todoName' => $faker->word,
                'id' => $faker->numberBetween($min = 1, $max = 100),
                'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = '-15 days', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-15 days', $endDate = 'now', $timezone = null)
            ]);
        }
    }
}
