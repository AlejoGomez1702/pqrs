<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Request as Pqrs;
use App\user;
use App\Dependence;
use App\Entity;

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
        if(Auth::user()->isAdmin())
        {
            $cant_pqrs = Pqrs::all()->count();
            $cant_officials = User::role('official')->count();
            $cant_entities = Entity::all()->count();
            $cant_applicants = User::role('applicant')->count() + $cant_entities;
            $cant_dependences = Dependence::all()->count();

            // PQRS pendientes y completadas.
            $pendings = Pqrs::where('state', 'pending')->count();
            $pendings = $pendings + Pqrs::where('state', 'read')->count();
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
        else
        {
            $pqrs = Auth::user()->requests;
            $cant_pqrs = count($pqrs);

            // PQRS pendientes y completadas.
            $pendings = 0;
            $completes = 0;

            foreach($pqrs as $pqr)
            {
                if($pqr->state == 'pending' || $pqr->state == 'read')
                {
                    $pendings ++;
                }
                else if($pqr->state == 'completed')
                {
                    $completes ++;
                }
            }

            return view('home', [
                'cant_pqrs' => $cant_pqrs,
                'pendings' => $pendings,
                'completes' => $completes
            ]);

        }
        
    }
}
