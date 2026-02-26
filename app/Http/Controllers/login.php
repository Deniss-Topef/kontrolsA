<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\darbinieks;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
     public function login(Request $request)
{
   $request->validate([
        'lietotajvards' => 'required',
        'parole' => 'required'
    ]);

    if (Auth::attempt([
        'lietotajvards' => $request->lietotajvards,
        'password' => $request->parole
    ])) {

        $request->session()->regenerate();

        return redirect('/home');
    }

    // return back()->withErrors([
    //     'lietotajvards' => 'Nepareizs lietotājvārds vai parole.',
    // ]);

    return back()
    ->withErrors(['login' => 'Nepareizs lietotājvārds vai parole.'])
    ->withInput();

}
}