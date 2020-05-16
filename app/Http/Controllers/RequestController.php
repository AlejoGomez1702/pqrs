<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Request as Pqrs; // Sobrenombre para las PQRS
use App\User;
use App\Entity;
use App\Dependence;

class RequestController extends Controller
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
    public function index()
    {
        if(Auth::user()->isAdmin())
        {
            $pqrs = Pqrs::paginate(10);
            return view('admin.pqrs.index', ['pqrs' => $pqrs]);
        }   

        $pqrs = Auth::user()->requests;
        return view('admin.pqrs.index', ['pqrs' => $pqrs]);        
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
        // return dd($request->file('files'));
        $request->validate([
            'number_of_pages' => 'required',
            'description' => 'required',
            'dependence' => 'required',
            'official' => 'required',
            'max_date' => 'required',            
        ]);

        $pqrs = new Pqrs();
        $pqrs->description = $request->description;
        $pqrs->state = 'pending';
        $pqrs->number_of_pages = $request->number_of_pages;
        $pqrs->maximun_date = $request->max_date;

        // Dependencia de la pqrs.
        $dependence = Dependence::findOrFail($request->dependence);
        $pqrs->dependence_id = $dependence->id;
        $pqrs->save();

        // Funcionario al que se le asigna la pqrs.
        $user = User::role('official')->findOrFail($request->official);
        $pqrs->users()->attach($user, ['receiver' => false]);

        // Persona que creo la pqrs en el sistema.
        $user_create = Auth::user();
        $pqrs->users()->attach($user_create, ['receiver' => true]);

        // Añadiendo el archivo a la pqrs.
        $file = $request->file('files');
        if($file)
        {
            // return var_dump($file);          
            // $name_file = 'file_pqrs' . $pqrs->id . Carbon::now();
            //return $name_file;
            $pqrs->addMedia($file)->toMediaCollection();
        }

        // if($pqrs)        
        Alert::success('PQRS Creada Correctamente!', 'Radicado #: ' . $pqrs->id);                                
        
        return redirect()->route('requests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {      
        $pqr = Pqrs::findOrFail($id);
        if(!Auth::user()->isAdmin())
        {
            $pqr->state = 'read';
            $pqr->save();
        }            

        return view('admin.pqrs.show', ['pqr' => $pqr]);
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
        $request = Pqrs::findOrFail($id);
        $check = $request->delete();
        if($check)
        {
            Alert::error('PQRS Eliminada Correctamente!', 
                            'Radicado #: ' .  $request->id);
        }

        return redirect()->route('requests.index');
    }
}
