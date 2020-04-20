<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('tasks')->insert([
                'todoId' => $faker->numberBetween($min = 1, $max = 100),
                'taskTitle' => $faker->word,
                'isComplete' => $faker->randomElement(['Y', 'N']),
                'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = '-15 days', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-15 days', $endDate = 'now', $timezone = null)
            ]);
            
        }
    }
}
