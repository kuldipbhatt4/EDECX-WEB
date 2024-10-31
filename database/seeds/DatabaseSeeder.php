<?php

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
         $this->call(EdecxAdminSeeder::class);
         $this->call(LevelSeeder::class);
         $this->call(SubjectSeeder::class);
         $this->call(ClasstypeSeeder::class);
         $this->call(LocationSeeder::class);
         $this->call(FcontactSeeder::class);
         $this->call(DaysSeeder::class);
    }
}
