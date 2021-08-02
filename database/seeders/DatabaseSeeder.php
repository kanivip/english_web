<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\questions;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(rolesUserSeeder::class);
        $this->call(statusUserSeeder::class);
        $this->call(vocabulariesSeeder::class);
        $this->call(categoriesSeeder::class);
        $this->call(usersSeeder::class);
        $this->call(levelsSeeder::class);
        $this->call(questionsSeeder::class);
        $this->call(CommentSeeder::class);

        //questions::factory(1000)->create();
    }
}