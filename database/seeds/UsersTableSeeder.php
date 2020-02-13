<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrador #1.
        $admin = new User();
        $admin->name = "administrador";
        $admin->email = "admin@mail.com";
        $admin->password = bcrypt('admin');
        $admin->assignRole('administrador');

        $admin->save();

        // Administrador #2.
        $admin2 = new User();
        $admin2->name = "Alejandro Gómez";
        $admin2->email = "alejandrogomez2339@gmail.com";
        $admin2->password = bcrypt('alejo');
        $admin2->assignRole('administrador');

        $admin2->save();


    }
}
