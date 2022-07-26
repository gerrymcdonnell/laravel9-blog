<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Listing;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //create 10 users
         //User::factory(10)->create();

         //create a default user to login
         User::factory()->create([
            'name'=>'ged',
            'email'=>'ged@ged.com',
            'password'=>bcrypt('123456')
         ]);

         $user=User::factory()->create([
            'name'=>'John doe',
            'email'=>'john@gmail.com'
         ]);



        //use the factory to create listings
         Listing::factory(6)->create([
            'user_id'=>$user->id
         ]);

    }
}
