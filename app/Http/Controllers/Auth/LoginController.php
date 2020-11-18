<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use Auth;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = 'admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
        $this->middleware('guest:customer')->except('logout');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);

            return redirect()->route('customer.login')->withErrors(trans('theme.notify.authentication_failed', ['msg' => $response['error']['message']]));
        }

        $email = $user->getEmail();

        if($provider == 'line') {
            $email = $user->id . '@line.me';
        }

        $customer = Customer::where('email', $email)->first();

        if ( ! $customer ){
            $customer = new Customer;
            $customer->name = $user->getName();
            $customer->nice_name = $user->getNickname();
            $customer->email = $email;
            $customer->active = 1;
            $customer->save();

            $customer->saveImageFromUrl($user->avatar_original ?? $user->getAvatar());
        }

        Auth::guard('customer')->login($customer);

        return redirect()->intended('/')->with('success', trans('theme.notify.logged_in_successfully'));
    }
}
