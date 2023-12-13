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
            if($request->role == 'patient'){
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
                $t_d = array_merge($request->travelDetails, ['user_id' => $user->id]);
                UserTravel::create($t_d);

                $medicalHistory = new MedicalHistory();
                $medicalHistory->user_id = $user->id;
                $medicalHistory->medication = $request->medicalHistory['medication'];
                $medicalHistory->sicknessHistory = json_encode($request->medicalHistory['sicknessHistory']);
                $medicalHistory->medicalCondition = $request->medicalHistory['medicalCondition'];
                $medicalHistory->surgicalHistory = $request->medicalHistory['surgicalHistory'];
                $medicalHistory->allergy = $request->medicalHistory['allergy'];
                $medicalHistory->medicationTypes = json_encode($request->medicalHistory['medicationTypes']);
                $medicalHistory->customInputMedications = json_encode($request->medicalHistory['customInputMedications']);
                $medicalHistory->save();

                $v_h = new VaccineHistory();
                $v_h->user_id = $user->id;
                $v_h->hasReceivedCovidVaccine = $request->vaccineHistory['hasReceivedCovidVaccine'];
                $v_h->dosesReceived = $request->vaccineHistory['dosesReceived'];
                $v_h->timeSinceLastVaccination = $request->vaccineHistory['timeSinceLastVaccination'];
                $v_h->immunizationHistory = json_encode($request->vaccineHistory['immunizationHistory']);

                $v_h->save();


                $l_f = new UserLifestyle();
                $l_f->user_id = $user->id;
                $l_f->smokingHabits = $request->lifestyleFactors['smokingHabits'];
                $l_f->alcoholConsumptions = $request->lifestyleFactors['alcoholConsumptions'];
                $l_f->physicalActivityLevel = $request->lifestyleFactors['physicalActivityLevel'];
                $l_f->preferences = $request->lifestyleFactors['preferences'];

                $l_f->save();

                foreach($request->emergencyContacts as $item) {
                    $e_c = new UserEmergency();
                    $e_c->user_id = $user->id;
                    $e_c->nameOfEmergencyContact = $item[0]->nameOfEmergencyContact;
                    $e_c->phoneNumber = $item[0]->phoneNumber;
                    $e_c->relationship = $item[0]->relationship;
                    $e_c->email = $item[0]->email;
                    $e_c->mediaiId = $item[0]->mediaiId;

                    $e_c->save();
                }

            }elseif($request->role == 'hospital'){
                $user = User::create([
                    'name' => $request->personalDetails['name'],
                    'phoneNumber' => $request->personalDetails['phoneNumber'],
                    'location' => $request->personalDetails['location'],
                    'email' => $request->personalDetails['email'],
                    'password' => Hash::make($request->personalDetails['password']),
                    'country' => $request->personalDetails['country'],
                    'address' => $request->personalDetails['address'],
                    'websiteUrl' => $request->personalDetails['websiteUrl'],
                    'city' => $request->personalDetails['city'],
                    'postalCode' => $request->personalDetails['postalCode'],
                    'currency' => $request->personalDetails['currency'],

                ]);   
            }
            $user->assignRole($request->role);

            return response()->json([
                'user' => $user,
                'role' => $request->role,
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

