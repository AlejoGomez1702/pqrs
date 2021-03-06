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
        $this->call(DependencesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);   
        $this->call(CategoriesTableSeeder::class);
        $this->call(RequestsTableSeeder::class);
        $this->call(RequestsUsersTableSeeder::class);
        $this->call(ApplicantSeeder::class);
    }
}
