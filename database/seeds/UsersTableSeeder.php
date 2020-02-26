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
        $official->assignRole('official');
        $official->save();

        // Funcionario #2.
        $official2 = new User();
        $official2->identification_card = "123456";
        $official2->names = "Jorgito";
        $official2->surnames = "Meza";
        $official2->email = "jorgito@mail.com";
        $official2->password = bcrypt('official');
        $official2->assignRole('official');
        $official2->save();

        // Solicitante #1.
        $applicant = new User();
        $applicant->identification_card = "183570235";
        $applicant->names = "Casa";
        $applicant->surnames = "cultura";
        $applicant->email = "applicant@mail.com";
        $applicant->assignRole('applicant');
        $applicant->save();

        // Solicitante #2.
        $applicant2 = new User();
        $applicant2->identification_card = "183570230";
        $applicant2->names = "Casitaa";
        $applicant2->surnames = "curall";
        $applicant2->email = "applicant2@mail.com";
        $applicant2->assignRole('applicant');
        $applicant2->save();


    }
}
