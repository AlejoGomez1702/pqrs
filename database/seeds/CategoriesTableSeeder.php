<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Categoria #1
        $category = new Category();
        $category->name = "Solicitud de información";
        $category->save();

        // Categoria #2
        $category2 = new Category();
        $category2->name = "Derecho de petición";
        $category2->save();

    }
}
