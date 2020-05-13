<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrador.
        $admin_role = new Role();
        $admin_role->name = "administrator";  
        $admin_role->save();

        // Funcionario.
        $official_role = new Role();
        $official_role->name = "official";
        $official_role->save();

        // Lider de dependencia
        $leader_role = new Role();
        $leader_role->name = "leader";
        $leader_role->save();

        // Solicitantes.
        $applicant_role = new Role();
        $applicant_role->name = "applicant";
        $applicant_role->save();

        // // Solicitantes (particulares).
        // $particular_role = new Role();
        // $particular_role->name = "particular_person";
        // $particular_role->save();

        // // Solicitantes (entidad privada).
        // $private_entity = new Role();
        // $private_entity->name = "private_entity";
        // $private_entity->save();

        // // Solicitantes (entidad publica).
        // $public_entity = new Role();
        // $public_entity->name = "public_entity";
        // $public_entity->save();

    }
}
