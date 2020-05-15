<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Pqrs;
use App\user;
use App\Dependence;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cant_pqrs = Pqrs::all()->count();
        $cant_officials = User::role('official')->count();
        $cant_applicants = User::role('applicant')->count();
        $cant_dependences = Dependence::all()->count();

        // PQRS pendientes y completadas.
        $pendings = Pqrs::where('state', 'pending')->count();
        $completes = Pqrs::where('state', 'complete')->count();

        return view('home', [
            'cant_pqrs' => $cant_pqrs,
            'cant_officials' => $cant_officials,
            'cant_dependences' => $cant_dependences,
            'cant_applicants' => $cant_applicants,
            'pendings' => $pendings,
            'completes' => $completes
        ]);
    }
}
