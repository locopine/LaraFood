<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();

        foreach (range(1,10) as $index) {
            DB::table('plans')->insert([
                'name' => $faker->firstName. " " . $faker->lastName,
                'url' => $faker->url,
                'price' => $faker->randomFloat(2, 101, 600),
                'description' => $faker->text(50),
            ]);
        }
    }
}
