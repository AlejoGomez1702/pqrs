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
        $dependece->email = "ajkbfk@jskdgfn.com";
        $dependece->cellphone = "3217816495";
        $dependece->save();

        $dependece2 = new Dependence();
        $dependece2->name = "Secretaría de educación";
        $dependece2->email = "lkshgi@jknhñ.com";
        $dependece2->cellphone = "3217816400";
        $dependece2->save();

    }
}
