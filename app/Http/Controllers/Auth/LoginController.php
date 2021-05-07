<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;


class LoginController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function firstLogin($id){

     $user = User::where('kundennummer',$id)->first();
      
     if (!$user) {
         $message = 'Kundennummer is isvalid.';
         return  \Response::json($message, 404);
     } elseif ($user->first_login == User::DEFAULT_FIRST_LOGIN) {
             $credentials = ['email' => $user->email];

                $token = Password::getRepository()->create($user);
                $user->sendPasswordResetNotification($token);

          $message = 'Reset password link sent to your email.Please set your password and login.';
          return  \Response::json($message, 200);
     }else{
         $message = ['msg' => 0];
         return  \Response::json($message, 200);
     }   
      
    }

}
