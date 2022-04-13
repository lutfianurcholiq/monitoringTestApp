<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register Montoring TS'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns',
            'level' => 'required',
            'password' => 'required|min:5|max:10',
            'password_confirm' => 'required|min:5|max:10|required_with:password|same:password'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        
        $request->session()->flash('success', 'Your Register Success');

        return redirect('/login');

    }
}
