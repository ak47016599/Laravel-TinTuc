<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use Validator,Redirect,Response,File;
 use Socialite;
 use App\User;
 use App\userDemo;
 class SocialController extends Controller
 {
 public function redirect($provider)
 {
     return Socialite::driver($provider)->redirect();
 }
 public function callback($provider)
 {
   $getInfo = Socialite::driver($provider)->user();
   $user = $this->createUser($getInfo,$provider);
   auth()->login($user);
   if(session()->has('login_user')){
    session()->forget('login_user');
}
   session()->put('login_user' ,\Auth::user());
   session()->save();
   return redirect('/tintuc/post') ;
 }
 function createUser($getInfo,$provider){
 $user = User::where('provider_id', $getInfo->id)->first();
 if (!$user) {
     $image = 'default-user.png';
      $user = User::create([
          'image' => $image,
          'lever' => 0,
         'name'     => $getInfo->name,
         'email'    => $getInfo->email,
         'password' => null,
         'provider' => $provider,
         'provider_id' => $getInfo->id,
     ]);

   }
   return $user;
 }
 }
