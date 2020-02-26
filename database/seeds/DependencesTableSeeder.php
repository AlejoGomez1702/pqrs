<?php

use Illuminate\Database\Seeder;
use App\Dependence;

class DependencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dependece = new Dependence();
        $dependece->name = "Administrativos";
        $dependece->save();

        $dependece2 = new Dependence();
        $dependece2->name = "Secretaría de educación";
        $dependece2->save();

    }
}
