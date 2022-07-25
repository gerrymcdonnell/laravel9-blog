<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Listing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

        //use the factory to create listings
         Listing::factory(6)->create();

         /*Listing::create([
            'title'=>'my job title',
            'tags'=>'tag1,tag2',
            'company'=>'acme company',
            'location'=>'boston',
            'email'=>'email@email.com',
            'website'=>'http://www.website.com',
            'description'=>'fdgfdgfgfgdfgfdg'
         ]);


         Listing::create([
            'title'=>'my job title2',
            'tags'=>'tag1,tag2',
            'company'=>'acme company2',
            'location'=>'boston',
            'email'=>'email@email.com',
            'website'=>'http://www.website.com',
            'description'=>'fdgfdgfgfgdfgfdg2'
         ]);*/
    }
}
