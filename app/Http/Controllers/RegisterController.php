<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){
        // return view('register.index', [
        //     'title' => 'Register'
        // ]);
        
        // return $request->all();
        $validatedData = $request->validate([
            'name' => 'required',
            'prodi' => 'required',
            'nim' => 'required|unique:users',
            'password' => 'required|min:5'
        ]);

        $validatedData['password'] = bcrypt( $validatedData['password']);

        User::create($validatedData);
        
        return redirect('/login');
    }
}
