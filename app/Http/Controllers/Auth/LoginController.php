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
        
                $token = Password::getRepository()->create($user);
                $user->sendPasswordResetNotification($token);

          $message = 'Reset password link sent to your email.Please set your password and login.';
          return  \Response::json($message, 200);
     }else{
         $message = ['msg' => 0];
         return  \Response::json($message, 200);
     }   
      
    }

     /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'kundennummer';
    }


    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function login(Request $request)
    // {
    //     $this->validateLogin($request);

    //     // If the class is using the ThrottlesLogins trait, we can automatically throttle
    //     // the login attempts for this application. We'll key this by the username and
    //     // the IP address of the client making these requests into this application.
    //     // if (method_exists($this, 'hasTooManyLoginAttempts') &&
    //     //     $this->hasTooManyLoginAttempts($request)) {
    //     //     $this->fireLockoutEvent($request);

    //     //     return $this->sendLockoutResponse($request);
    //     // }

    //     if ($this->attemptLogin($request)) {
    //         return $this->sendLoginResponse($request);
    //     }

    //     $user = User::where($request->only($this->username()))->first();

    //     dd($user);
    //     // If the login attempt was unsuccessful we will increment the number of attempts
    //     // to login and redirect the user back to the login form. Of course, when this
    //     // user surpasses their maximum number of attempts they will get locked out.
    //     // $this->incrementLoginAttempts($request);

    //     return $this->sendFailedLoginResponse($request);
    // }

}
