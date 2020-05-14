<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Pqrs; // Sobrenombre para las PQRS
use App\User;
use App\Entity;
use App\Dependence;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //     $petitions = Petition::all();
    //     $users = $petitions[0]->category[+
    // ];

    //     return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publics = Entity::where('type', 'public')->get();
        $privates = Entity::where('type', 'private')->get();
        $particulars = User::role('applicant');
        $dependences = Dependence::all();
        $officials = User::role('official')->get();

        return view('admin.pqrs.create', 
                        ['publics' => $publics, 
                        'privates' => $privates, 
                        'particulars' => $particulars,
                        'dependences' => $dependences,
                        'officials' => $officials
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
