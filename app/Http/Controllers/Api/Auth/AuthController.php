<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        Auth::attempt($request->all());
        $user = Auth::user();
        $accessToken = $user->createToken('adminToken')->accessToken;
        return $accessToken;
    }

    public function accessToken()
    {

    }
}
