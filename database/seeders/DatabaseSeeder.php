<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //short cut = ctrl + p
        // \App\Models\User::factory(10)->create();
        // $this->call(CategorySeeder::class);
        // $this->call(TagSeeder::class);
        // $this->call(RoleSeeder::class);
        $this->call(UserSeed::class);
    }
}
