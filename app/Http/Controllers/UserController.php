<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    
    public function index(){
        return view('login');
    }


    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/box');
        }

        return back()->with('error', 'Invalid email or password')->withInput();
    }

    public function registerNewUser(){
        return view('register');
    }

    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Account created successfully');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function getUsers(){
        
        $users = User::all();

        return view('pages.users.dashboard', compact('users'));
    }

    public function addUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        Log::info($request->password);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'User created successfully!');
    }

    public function updateUser(Request $request, $id){

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name
        ]);

        return back()->with('success', 'User updated successfully!');
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'User Deleted Successfully!');
    }
}
