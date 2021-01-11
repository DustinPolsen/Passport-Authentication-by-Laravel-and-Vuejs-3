<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubLoginController extends Controller
{
       //Github Authentication
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback()
    {
                $user = Socialite::driver('github')->stateless()->user();
                $provider_id = Admin::where('provider_id' , $user->id)->first();
                if($provider_id){
                    Auth::login($provider_id);
                    return redirect()->intended('/dashboard');
                }else{
                if(isset( Admin::where('email' , $user->email)->first()->email)){
                    return redirect()->intended('/login');
               }else{
                        $new_user = new Admin();
                        $new_user->name                    =      $user->name ;
                        $new_user->email                    =      $user->email ;
                        $new_user->provider_id          =      $user->id;
                        $new_user->avatar_link           =      $user->avatar ;
                        $new_user->profile_link          =      $user->user['html_url'] ;
                        $new_user->email_verified_at =     now();
                        $new_user->_token                   =   $user->token;
                        if($new_user->save()){
                        Auth::login($new_user);
                    return redirect()->intended('/dashboard');
                }
            }  
        }
    }
}