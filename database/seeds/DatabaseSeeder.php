<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {

    $faker = Faker::create();
    foreach (range(1,10) as $index) {
        DB::table('users')->insert([
            'first_name' => $faker->name,
            'middle_initial' => $faker->letter,
            'last_name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('secret'),
        ]);
    }

  }

}
