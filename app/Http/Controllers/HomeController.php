<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Dependence;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cant_officials = User::role('official')->count();
        $cant_dependences = Dependence::all()->count();
        //$cant_applicants = User::role('applicant')->count();
        $cant_applicants = 0;

        return view('home', [
            'cant_officials' => $cant_officials,
            'cant_dependences' => $cant_dependences,
            'cant_applicants' => $cant_applicants
        ]);
    }

    // /**
    //  * Retorna la vista para el cambio de contraseña.
    //  */
    // public function showChangePasswordForm()
    // {
    //     return view('auth.changepassword');
    // }

    // /**
    //  * Cambia la contraseña del usuario en la base de datos.
    //  */
    // public function changePassword(Request $request)
    // {
    //     if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
    //         // The passwords matches
    //         return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
    //     }

    //     if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
    //         //Current password and new password are same
    //         return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
    //     }

    //     $validatedData = $request->validate([
    //         'current-password' => 'required',
    //         'new-password' => 'required|string|min:6|confirmed',
    //     ]);

    //     //Change Password
    //     $user = Auth::user();
    //     $user->password = bcrypt($request->get('new-password'));
    //     $user->save();

    //     return redirect()->back()->with("success","Password changed successfully !");
    // }

}
