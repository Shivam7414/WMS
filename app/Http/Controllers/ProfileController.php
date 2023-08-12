<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request){
        return view('auth.profile');
    }

    public function store(Request $request){
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return back()->with('success', 'Profile updated sucessfully');
    }
}