<?php

namespace App\Http\Controllers;

use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Registration
     *
     * Table structure:
     *   username : string
     *   email    : string
     *   password : string
     *   enabled  : integer (0 disabled, 1 enabled => 0 default)
     *   lastLogin: datetime (null default)
     *   expired  : datetime (null default)
     *   role     : integer (0 user, 1 admin => 0 default)
     *   company  : string (null default)
     *   loggedIn : datetime (null default)
     *   package  : integer (0 default)
     *
     *   Roles:
     *      1: superuser
     *      2: admin
     *      3: user
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerAction(Request $request)
    {
        $this->validate($request, array(
            'username'              => 'required|alpha_num|unique:users',
            'email'                 => 'email|unique:users',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ));

        $username   = $request['username'];
        $email      = $request['email'];
        $password   = bcrypt($request['password']);
        $enabled    = 0;
        $lastLogin  = null;
        $expired    = null;
        $roleId     = 1;
        $companyId  = 1;
        $firstName  = null;
        $lastName   = null;
        $phone      = null;
        $salutation = null;
        $loggedIn   = null;
        $packageId  = 1;

        $user             = new User();
        $user->username   = $username;
        $user->email      = $email;
        $user->password   = $password;
        $user->enabled    = $enabled;
        $user->last_login = $lastLogin;
        $user->expired    = $expired;
        $user->role_id    = $roleId;
        $user->company_id = $companyId;
        $user->first_name = $firstName;
        $user->last_name  = $lastName;
        $user->phone      = $phone;
        $user->salutation = $salutation;
        $user->logged_in  = $loggedIn;
        $user->package_id = $packageId;

        $user->save();

        Auth::login($user);

        return redirect()->route('editProfile');
    }

    /**
     * Login
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginAction(Request $request)
    {
        $this->validate($request, array(
            'username' => 'required',
            'password' => 'required',
        ));

        if (Auth::attempt(array('username' => $request['username'], 'password' => $request['password']))) {
            $user = Auth::user();
            if($user->enabled == 1){
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->withErrors(array('error' => 'This account is not enabled'));
            }
        }

        return redirect()->back()->withErrors(array('error' => 'Username or password is incorrect'));
    }

    /**
     * Logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutAction()
    {
        Auth::logout();

        return redirect()->route('login');
    }


}