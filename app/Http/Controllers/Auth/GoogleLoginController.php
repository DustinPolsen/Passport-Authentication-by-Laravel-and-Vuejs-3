<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    //Google Authentication
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $old_user = Admin::where('provider_id' , $user->id)->first();
        if($old_user){
           Auth::login($old_user);
           return redirect()->intended('/dashboard');
        }else{
            if(isset(Admin::where('email' , $user->email )->first()->email)){
                    return redirect()->intended('/login');
               }else{
                        $new_user = new Admin();
                        $new_user->name                     =      $user->name ;
                        $new_user->email                     =      $user->email ;
                        $new_user->provider_id           =      $user->id;
                        $new_user->avatar_link            =      $user->avatar_original ;
                        $new_user->email_verified_at  =     now();
                        $new_user->_token                   =   $user->token;     
                        if($new_user->save()){
                        Auth::login($new_user);
                      return redirect()->intended('/dashboard');
                   }
              }
        }
    }
}