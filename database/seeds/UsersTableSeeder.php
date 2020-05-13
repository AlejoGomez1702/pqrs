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
        $admin->identification_card = "123";
        $admin->names = "administrador";
        $admin->surnames = "administrador";
        $admin->email = "admin@mail.com";
        $admin->password = bcrypt('admin');
        $admin->assignRole('administrator');
        $admin->save();

        // Administrador #2.
        $admin2 = new User();
        $admin2->identification_card = "1234";
        $admin2->names = "Luis Alejandro";
        $admin2->surnames = "Gómez Castaño";
        $admin2->email = "alejandrogomez2339@gmail.com";
        $admin2->password = bcrypt('alejo');
        $admin2->assignRole('administrator');
        $admin2->save();

        // Funcionario #1.
        $official = new User();
        $official->identification_card = "12345";
        $official->names = "Pepito";
        $official->surnames = "Pimenton";
        $official->email = "ejemplito@mail.com";
        $official->password = bcrypt('official');
        $official->dependence_id = 1;
        $official->assignRole('leader');
        $official->assignRole('official');
        $official->save();

        // Funcionario #2.
        $official2 = new User();
        $official2->identification_card = "123456";
        $official2->names = "Jorgito";
        $official2->surnames = "Meza";
        $official2->email = "jorgito@mail.com";
        $official2->password = bcrypt('official');
        $official2->dependence_id = 2;
        // $official2->assignRole('leader');
        $official2->assignRole('official');        
        $official2->save();

        // Funcionario #3.
        $official3 = new User();
        $official3->identification_card = "745646354";
        $official3->names = "Luz";
        $official3->surnames = "Castaño";
        $official3->email = "luz@mail.com";
        $official3->password = bcrypt('official');
        $official3->dependence_id = 2;
        // $official3->assignRole('leader');
        $official3->assignRole('official');        
        $official3->save();

    }
}
