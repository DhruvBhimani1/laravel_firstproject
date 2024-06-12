<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i <= 10; $i++){
            $user = new User;
            $user->firstname = $faker->firstName;
            $user->lastname = $faker->lastName;
            $user->email = $faker->email;
            $user->password = bcrypt($faker->password);
            $user->save();
        }
    }
}
