<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Dependence;

class DependenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dependences = Dependence::all();

        return view('admin.dependences.index')
                    ->with('dependences', $dependences);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dependences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $dependence = Dependence::create($request->all());
        if($dependence)        
            Alert::success('Dependencia Creada Correctamente!', $dependence->name);                                
        
        return redirect()->route('dependences.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dependence = Dependence::findOrFail($id);

        return view('admin.dependences.show')
                    ->with('dependence', $dependence);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dependence = Dependence::findOrFail($id);
        
        return view('admin.dependences.edit')
                    ->with('dependence', $dependence);
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
        $dependence = Dependence::findOrFail($id);
        $check = $dependence->update($request->all());
        if($check)
        {
            Alert::success('Dependencia Actualizada Correctamente!', 
                                $dependence->name);
        }
        else
        {
            Alert::warning('No Fue Posible Actualizar La Dependencia',
                                $dependence->name);
        }

        return redirect()->route('dependences.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dependence = Dependence::findOrFail($id);
        $check = $dependence->delete();

        if($check)        
            Alert::error('Dependencia Eliminado Correctamente!', $dependence->name);
        

        return redirect()->route('dependences.index');
    }
}
