<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Company;
use Auth;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

session_start();
session_destroy();
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


    protected function redirectTo()
    {
        return url()->previous();
    }

    public function __construct()
    {
        $this->middleware('customer.guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('client.website.login');
    }
    public function redirectLoginCustomer()
    {
        return view('client.website.login');
    }
    public function redirectRegisterCustomer()
    {
        return view('client.website.register');
    }
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard('customer')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('customer');
    }

    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        //echo config("services.{$provider}.redirect").'<br>';
        config(["services.{$provider}.redirect" => url("login/employer/{$provider}/callback")]);
        //echo config("services.{$provider}.redirect");exit;
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::guard('customer')->login($authUser, true);
        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        if ($user->getEmail() != '') {
            $authUser = Customer::where('email', 'like', $user->getEmail())->first();
            if ($authUser) {
                /* $authUser->provider = $provider;
                  $authUser->provider_id = $user->getId();
                  $authUser->update(); */
                return $authUser;
            }
        }
        $str = $user->getName() . $user->getId() . $user->getEmail();
        return Customer::create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            //'provider' => $provider,
            //'provider_id' => $user->getId(),
            'password' => bcrypt($str),
            'is_active' => 1,
            'verified' => 1,
        ]);
    }
}
