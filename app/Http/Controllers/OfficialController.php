<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfficial;
use Illuminate\Http\Request;
use App\User;

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
        $officials = User::role('official')->get();
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

        return redirect()->route('officials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photos = User::find(10)->getMedia();
        //$photos = Auth()->user()->getMedia();

        return view('admin.officials.show')
                    ->with('photos', $photos);
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
