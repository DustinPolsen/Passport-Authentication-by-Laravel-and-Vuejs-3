<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ForgetPasswordController extends Controller
{
        public function forgetPasswordIndex()
    {
        return view('auth.forget-password');
    }

    public function forgetPasswordStore(Request $request)
    {
        $request->validate([
            'email'   =>  'required|email'
        ]);
        $email = $request->email;
        $user = Admin::where('email' , $email)->first();
        if($user){
            $code                                     =  rand('11111111' , '99999999');
            $user->verification_code      =  $code;
            if($user->save()){
                $this->data['email'] = $email;
                $this->data['full_name'] = $user->name;
                $this->data['code'] = $code;
                Mail::send('auth.passwordEmail', $this->data, function ($message) {
                    $message->from('no-reply@mini-post.com', 'Developer-Rezwan');
                    $message->to($this->data['email'], $this->data['full_name']);
                    $message->subject('Password Reset Request From (Laravel MINI POS Application)');
                    });
                Alert::toast('Verification is code send to your email ! Please check your email' , 'success');
                if(!Mail::failures()){
                Session::put('email' , $email);
                return redirect()->to('login/password-confirm');
                }
            }
        }else{
            Alert::error("Email Not Found!");
           return redirect()->route('login.forget-password');
        }
    }

    public function resetConfirmForm()
    {
        return view('auth.reset-password');
    }
    public function resetConfirm(Request $request )
    {
        $request->validate([
            'code'                  => 'required|min:8|max:8',
            'password'          => 'required|min:8|confirmed',
        ]);
        $code           = $request->code;
        $password   = $request->password;
        $user = Admin::where('verification_code' , $code)->where('email' , Session::get('email'))->first();
        if($user){
            $user->password     =  Hash::make($password);
            if($user->save()){
                $user->verification_code = null;
                $user->save();
                 Alert::success("Password Successfully Updated!");
                 return redirect()->route('login');
            }else{
                 Alert::error("Something Wents Wrong!");
                 return redirect()->route('login'); 
            }
        }
    }

}