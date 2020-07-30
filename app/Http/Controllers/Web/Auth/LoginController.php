<?php

namespace App\Http\Controllers\Web\Auth;

use App\Entities\Users\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle the social login request.
     *
     * @return \Illuminate\Http\Response
     */
    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }

    /**
     * Obtain user information from the social login provider.
     *
     * @param $social
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($social)
    {
        $userSocial = Socialite::driver($social)->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();

        if ($user) {
            Auth::login($user);

            return redirect(route('dashboard'));
        } else {
            return view('auth.register', ['name' => $userSocial->name, 'email' => $userSocial->email]);
        }
    }
}
