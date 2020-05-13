<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfficial;
use Illuminate\Http\Request;
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
        return view('admin.officials.create')
                    ->with('type', 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficial $request)
    {
        $info = $request->except('photo');
        $info['password'] = bcrypt($request->password);
        $official = User::create($info);
        $official->assignRole('official');
        $official->addMedia($request->photo)->toMediaCollection();

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
        return view('admin.officials.edit')
                    ->with('official', $official);
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
        $official = User::role('official')->findOrFail($id);
        if($request->photo)
        {
            $official->addMedia($request->photo)->toMediaCollection();
        }

        $check = $official->update($request->except('photo'));
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
