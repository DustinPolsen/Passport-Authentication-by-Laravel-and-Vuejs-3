<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegistrationRequest;

class LoginController extends Controller
{
    protected $registration_rules ;
    public function __construct()
    {
        $rules = new RegistrationRequest();
        $this->registration_rules = $rules->rules();
    }
    
    // Login Authentication
     public function authentication(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'email'         => "required|email",
            'password'  => "required|min:6"
        ]);
        if($validator->fails()){
            return response()->json(["error" => $validator->errors()] , 203);
        };
        if(Auth::attempt(
        $request->only('email' , 'password'),
        $request->filled('remember')
        )){
            return response()->json(['success' => 'true'] , 200);
        }else{
            return response()->json(['erorr' => "Password or Email Not Found" ] , 201);
        }
    }

    public function registration(Request $request)
    {
        $validator = Validator::make($request->all() , $this->registration_rules);
        if($validator->fails()){
            return response()->json($validator->errors() , 202);
        }else{
            $data = [
                "name" => $request->name , 
                "email" => $request->email , 
                "password" => Hash::make($request->password ), 
        ];
        if(Admin::create($data)){
            if(Auth::attempt($request->only('email' , 'password'))){
                return response()->json(["userData"  => Auth::user() , 'success' => 'true'] , 200);
            }else{
                return response()->json([ 'error' => 'true'] , 401);
            }
        }
    }
    }
    //Logout Authentication
     public function logout()
    {
         Auth::logout();
         return redirect()->to('/login');
    }
}