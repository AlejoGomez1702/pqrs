<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Pqrs;

class RequestOfficialController extends Controller
{
    public function giveAnswer(Request $request)
    {
        $pqr = Pqrs::findOrFail($request->pqr);

        return view('admin.pqrs.giveAnswer', ['pqr' => $pqr]);
    }

    public function reply(Request $request)
    {
        return $request->all();
    }
}
