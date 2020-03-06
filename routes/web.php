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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

// Ruta para cambiar la contraseña de un usuario.
Route::get('/changePassword', 'HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

// Rutas para el CRUD de funcionarios.
Route::resource('officials', 'OfficialController');

// Rutas para el CRUD de Dependencias.
Route::resource('dependences', 'DependenceController');

// Rutas para el CRUD de solicitantes.
Route::resource('applicants', 'ApplicantController');

// Rutas para el CRUD de categorías.
Route::resource('categories', 'CategoryController');

Route::get('pruebitas', function(){

    $request = App\request::find(1);

    foreach ($request->users as $user) 
    {
        echo $user->names . "<br>";
    }

    // $dependence = App\Dependence::find(1);
    // $requests = $dependence->requests;

    // foreach($requests as $request)
    // {
    //     echo $request->description . "<br>";
    // }

    // $request = App\Request::find(1);
    // $dependence = $request->dependence->name;
    // echo $dependence;


});

