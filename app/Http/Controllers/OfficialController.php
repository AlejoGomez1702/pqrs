<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfficial;
use Illuminate\Http\Request;
use App\Dependence;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;


class OfficialController extends Controller
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
        $officials = User::role('official')->paginate(10);
        return view('admin.officials.index')
                    ->with('officials', $officials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dependences = Dependence::all();
        return view('admin.officials.create', ['dependences' => $dependences]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficial $request)
    {
        $info = $request->all();
        $info['password'] = bcrypt($request->password);
        $official = User::create($info);
        $official->dependence_id = $request->dependence_id;
        $official->save();
        $official->assignRole('official');
        // $official->addMedia($request->photo)->toMediaCollection();

        if($official) 
        {
            Alert::success('Funcionario Creado Correctamente!', 
                                $official->names . " " . $official->surnames);
        }

        return redirect()->route('officials.index');
    }

    /**
     * Display the specified official.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $official = User::role('official')->findOrFail($id);

        return view('admin.officials.show')
                    ->with('official', $official);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $official = User::role('official')->findOrFail($id);
        $dependences = Dependence::all();

        return view('admin.officials.edit', ['official' => $official, 'dependences' => $dependences]);
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
        //return $request->all();
        $official = User::role('official')->findOrFail($id);
        $check = $official->update($request->except(['password', 'password_confirmation']));
        if($request->password)
        {
            if($request->password == $request->password_confirmation)
            {
                $encrypt = bcrypt($request->password);
                $official->password = $encrypt;
                $official->save();
            }
        }
        
        if($check)
        {
            Alert::success('Funcionario Actualizado Correctamente!', 
                                $official->names . " " . $official->surnames);
        }
        else
        {
            Alert::warning('No Fue Posible Actualizar El Funcionario',
                                $official->name);
        }
        
        return redirect()->route('officials.show', [$official]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $official = User::role('official')->findOrFail($id);
        $check = $official->delete();
        if($check)
        {
            Alert::error('Funcionario Eliminado Correctamente!', 
                            $official->names . " " . $official->surnames);
        }

        return redirect()->route('officials.index');
    }
}
