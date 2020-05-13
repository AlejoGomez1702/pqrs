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
        $applicants = User::role('applicant')->paginate(10);

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
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $applicant = User::role('applicant')->findOrFail($id);     
        return view('admin.applicants.editParticular')
                    ->with('applicant', $applicant);   
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
        $applicant = User::role('applicant')->findOrFail($id);
        $check = $applicant->update($request->all());
        if($check)
        {
            Alert::success('Peticionario Actualizado Correctamente!', 
                                $applicant->names . " " . $applicant->surnames);
        }
        else
        {
            Alert::warning('No Fue Posible Actualizar El Peticionario',
                                $applicant->name);
        }
        
        return redirect()->route('applicants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $applicant = User::role('applicant')->findOrFail($id);
        $check = $applicant->delete();
        if($check)
        {
            Alert::error('Peticionario Eliminado Correctamente!', 
                            $applicant->names . " " . $applicant->surnames);
        }

        return redirect()->route('applicants.index');
    }
}
