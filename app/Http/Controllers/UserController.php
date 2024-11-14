<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller

{
    public function store(Request $request)
    {

     $validated = $request->validate([
        'name' => 'required|string|max:15',
        'apellido' => 'required|string|max:15',
        'email' => 'required|string|email|max:30',
        'password' => 'required|string|min:8',
        'rol' => 'required|string|max:255',
    ]);

    User::create([
        'name' => $validated['name'],
        'apellido' => $validated['apellido'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'rol' => $validated['rol'],
    ]);

    return redirect()->route('user.index');

   // Alert::success('Usuario creado', 'El usuario ha sido creado correctamente')->flash();




    }
}
