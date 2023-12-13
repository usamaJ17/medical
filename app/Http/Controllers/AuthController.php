<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserEmergency;
use App\Models\UserLifestyle;
use App\Models\UserTravel;
use App\Models\VaccineHistory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'personalDetails' => 'required',
            ]);
            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $user = User::create([
                'firstName' => $request->personalDetails['firstName'],
                'lastName' => $request->personalDetails['lastName'],
                'dateOfBirth' => $request->personalDetails['dateOfBirth'],
                'gender' => $request->personalDetails['gender'],
                'email' => $request->personalDetails['email'],
                'password' => Hash::make($request->personalDetails['password']),
                'country' => $request->personalDetails['country'],
                'address' => $request->personalDetails['address'],
                'bloodType' => $request->personalDetails['bloodType'],
                'city' => $request->personalDetails['city'],
                'postalCode' => $request->personalDetails['postalCode'],
                'passportNumber' => $request->personalDetails['passportNumber'],
                'height' => $request->personalDetails['height'],
                'weight' => $request->personalDetails['weight'],
            ]);
            $user->assignRole($request->role);

            $t_d = array_merge($request->travelDetails, ['user_id' => $user->id]);
            UserTravel::create($t_d);

            $m_h = array_merge($request->medicalHistory, ['user_id' => $user->id]);
            MedicalHistory::create($m_h);

            $v_h = array_merge($request->vaccineHistory, ['user_id' => $user->id]);
            VaccineHistory::create($v_h);

            $e_c = array_merge($request->emergencyContacts, ['user_id' => $user->id]);
            UserEmergency::create($e_c);

            $l_f = array_merge($request->lifestyleFactors, ['user_id' => $user->id]);
            UserLifestyle::create($l_f);

            return response()->json([
                'user' => $user,
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'status' => true,
            ], 200);


        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
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

