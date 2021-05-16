<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
use App\User;

class GoogleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //echo 'vlvlv1' ; die();
        //$this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        //echo 'vlvlv2' ; die();
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        try {
            $user = Socialite::driver('google')->user();

            $finduser = User::where('provider_id', $user->id)->first();

            if($finduser){

                if(session()->has('login_user')){
                    session()->forget('login_user');
                }
                auth()->login($finduser);
                session()->put('login_user' ,\Auth::user());
                session()->save();

                 return redirect('/tintuc/post');

            }else{

                     $User = User::create([
                         'image' => 'default-user.png',
                        'name' => $user->name,
                        'email' => $user->email,
                        'provider_id'=> $user->id,
                        'password' => null,
                        'provider' => 'google',
                        'lever' => 0,
                    ]);
                    auth()->login($User);
                    if(session()->has('login_user')){
                        session()->forget('login_user');
                    }

                    session()->put('login_user' ,\Auth::user());
                    session()->save();
                    return redirect('/tintuc/post') ;

            }

        } catch (Exception $e) {

            return redirect('auth/google');
        }
    }
}
