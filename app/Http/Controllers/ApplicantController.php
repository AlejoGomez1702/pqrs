<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\User;

class ApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)
        {
            $search = trim($request->search);
            $applicants = User::role('applicant')
                        ->where('identification_card','LIKE', '%' . $search . '%')
                        ->orderBy('names')
                        ->get();

            return view('admin.applicants.indexParticular')
                            ->with(['applicants'=> $applicants, 'search' => $search]);
        }

        $applicants = User::role('applicant')->get();

        return view('admin.applicants.indexParticular')
                    ->with('applicants', $applicants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.applicants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'identification_card' => ['required', 'max:20'],
            'names' => ['required', 'max:100'],
            'surnames' => ['required', 'max:30'],
        ]);
        //return $request;
        $applicant = User::create($request->all());
        $applicant->assignRole('applicant');

        if($applicant)        
            Alert::success('Peticionario Creado Correctamente!', 
                                $applicant->names . " " . $applicant->surnames);
        

        return redirect()->route('applicants.index');
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
