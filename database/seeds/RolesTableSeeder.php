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
        $admin_role->name = "administrador";  
        $admin_role->save();

        // Funcionario.
        $servant_role = new Role();
        $servant_role->name = "funcionario";
        $servant_role->save();
    }
}
