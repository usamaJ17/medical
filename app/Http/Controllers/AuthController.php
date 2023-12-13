<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        Log::info('register');
        Log::info(json_encode($request->all()));
        Log::info($request->all());
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
        // Validate and store new user
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);
        $user= new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function login(Request $request)
    {
        // Validate and perform login
    }

    public function logout(Request $request)
    {
        // Perform logout
    }
}

