<?php

use Illuminate\Database\Seeder;
use App\Request;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $request = new Request();
        $request->description = "PQRS número 1 para ejemplito";
        $request->state = "pending";
        $request->category_id = 1;
        $request->dependence_id = 1;
        $request->save();

        $request2 = new Request();
        $request2->description = "PQRS número 2 para ejemplito";
        $request2->state = "pending";
        $request2->category_id = 2;
        $request2->dependence_id = 1;
        $request2->save();

    }
}
