<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use App\Announcement;
use App\User;
use App\Project;

class DatabaseSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {

    $faker = Faker::create();
    foreach (range(1,50) as $index) {
      DB::table('users')->insert([
        'first_name' => $faker->firstname,
        'middle_initial' => 'A.', 
        'last_name' => $faker->lastname,
        'email' => $faker->email,
        'password' => bcrypt('secret'),
        'bio' => $faker->paragraph,
      ]);
    }

    $users = User::all()->pluck('user_id')->toArray();
    foreach(range(1, 300) as $index) {
      $project = Project::create([
        'user_id' => $faker->randomElement($users),
        'name' => $faker->catchPhrase,
        'description' => $faker->paragraph,
        'public' => $faker->randomElement([ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1 ]),
      ]);
    }

    foreach(range(1, 150) as $index) {
      $announcement = Announcement::create([
        'user_id' => $faker->randomElement($users),
        'name' => $faker->bs,
        'description' => $faker->paragraph,
        'expires_on' => $faker->date,
      ]);
    }

  }

}
