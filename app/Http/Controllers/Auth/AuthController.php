<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }



        //protected $redirectPath = '/home';

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user,$provider);

        Auth::login($authUser, true);

        return redirect('dashboard');
        //return redirect()->route('home');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $userdata
     * @return User
     */
    private function findOrCreateUser($userdata,$provider)
    {
        
        if($provider=='facebook')
        {

            $authUser = User::where('facebook_id', $userdata->id)->first();

       

            if ($authUser){
                return $authUser;
            }

            return User::create([
                'login_with' => 'Facebook',
                'usertype' => 'User',
                'first_name' => $userdata->user['first_name'],            
                'last_name' => $userdata->user['last_name'],
                'email' => $userdata->email,
                'gender' => $userdata->user['gender'],
                'facebook_id' => $userdata->id,
                'image_icon' => $userdata->avatar
            ]);

        }
        else
          {

            $authUser = User::where('google_id', $userdata->id)->first();
 

            if ($authUser){
                return $authUser;
            }

            return User::create([
                'login_with' => 'Google',
                'usertype' => 'User',
                'first_name' => $userdata->first_name,            
                'last_name' => $userdata->last_name,
                'email' => $userdata->email,
                'gender' => $userdata->gender,
                'google_id' => $userdata->id,
                'image_icon' => $userdata->avatar
            ]);
            
          }  

        
    } 
}
