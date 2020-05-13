<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

// Rutas para el CRUD de funcionarios.
Route::resource('officials', 'OfficialController');

// Rutas para el CRUD de Dependencias.
Route::resource('dependences', 'DependenceController');

// Rutas para el CRUD de solicitantes.
Route::resource('applicants', 'ApplicantController')->except('show');
Route::resource('entities', 'EntityController');

// Rutas para el CRUD de categorías.
Route::resource('categories', 'CategoryController');

// Rutas para el CRUD de peticiones (PQRS).
Route::resource('requests', 'RequestController');

Route::get('pruebitas', function(){
    // $request = App\request::find(1);

    $dependece = App\Dependence::find(1)->getLeader();

    if($dependece != null)
    {
        echo var_dump($dependece);
    }
    else{
        echo "ohohohooho" . "<br>";
    }

    

    // foreach ($request->users as $user) 
    // {
    //     echo $user->names . "<br>";
    // }
});

