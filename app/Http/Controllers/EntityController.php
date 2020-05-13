<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity;

class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {      
        // "entityId": (1) => Públicas; (2) = Privadas.
        $entityId = $request->entityId;
        $entityName = ($entityId == 1) ? "public" : "private";
        $theType = ($entityId == 1) ? "Públicas" : "Privadas";

        if($request->search)
        {
            //***********ARRRREEEEGLLLLARRRRRR */
            // $search = trim($request->search);
            // $entities = Entity::where('type', $entityName)
            //             ->where('name','LIKE', '%' . $search . '%')
            //             ->orderBy('name')
            //             ->get();
            
            // return view('admin.applicants.indexEntity', 
            //             ['entities' => $entities, 'type' => $theType, 'search' => $search]);
        }

        $entities = Entity::where('type', $entityName)->get();

        return view('admin.applicants.indexEntity', 
                        ['entities' => $entities, 'type' => $theType, 'search' => null]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => ['required', 'max:100'],
            'nit' => ['required', 'max:30'],
        ]);

        $entityId = $request->entityId;
        if($entityId == 1) //Entidad pública
        {
            $publicEntity = new Entity();
            $publicEntity->type = 'public';
            $publicEntity->name = $request->name;
            $publicEntity->nit = $request->nit;
            $publicEntity->cellphone = $request->cellphone;
            $publicEntity->email = $request->email;
            $publicEntity->save();
        }
        else if($entityId == 2) //Entidad privada
        {
            $privateEntity = new Entity();
            $privateEntity->type = 'private';
            $privateEntity->name = $request->name;
            $privateEntity->nit = $request->nit;
            $privateEntity->cellphone = $request->cellphone;
            $privateEntity->email = $request->email;
            $privateEntity->save();
        }

        return redirect()->route('entities.index');
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
