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
        Log::info($request->personalDetails);
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
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

