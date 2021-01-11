<?php
     
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Auth\GithubLoginController;
    use App\Http\Controllers\Auth\GoogleLoginController;
    use App\Http\Controllers\Auth\FacebookLoginController;


    Route::group(['prefix' => 'login'], function () {
    //Forgotten Password
    Route::get('/forgot-password' , [ForgetPasswordController::class,'forgetPasswordIndex'] )->name('login.forget-password');
    Route::post('/forgot-password' ,[ForgetPasswordController::class,'forgetPasswordStore'] )->name('login.passwor_store');
    
    Route::get('/password-confirm' ,[ForgetPasswordController::class,'resetConfirmForm']);
    Route::post('/password-confirm' ,[ForgetPasswordController::class,'resetConfirm'])->name('reset.confirm');
    
    /* Social Media Authentication */
    // Google Authentication
    Route::get('/google' , [GoogleLoginController::class , "redirectToGoogle"])->name('login.google');
    Route::get('/google/callback' , [GoogleLoginController::class , 'googleCallback']);
    
    // Facebook Authentication
    Route::get('/facebook' , [FacebookLoginController::class,'redirectToFacebook'])->name('login.facebook');
    Route::get('/facebook/callback' , [FacebookLoginController::class,'facebookCallback']);
    
    // Github Authentication
    Route::get('/github' , [GithubLoginController::class,'redirectToGithub'])->name('login.github');
    Route::get('/github/callback' , [GithubLoginController::class,'githubCallback']);
});