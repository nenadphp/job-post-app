<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    /**
     * Check user's role and redirect user based on their role
     */
    public function authenticated()
    {
        $user = User::find(auth()->user()->id);
        foreach ($user->roles as $role) {
           $this->getUserRole($role);
        }
    }

    /**
     * Set route
     *
     * @param string $route
     */
    public function setRedirectTo($route)
    {
        $this->redirectTo = $route;
    }

    /**
     * Set route by user role
     *
     * @param $role
     */
    public function getUserRole($role)
    {
        switch ($role->role){
            case 'moderator':
                $this->setRedirectTo('/job-add');
                break;
            case 'manager':
                $this->setRedirectTo('/');
                break;
            default :
                $this->setRedirectTo('/');
        }
    }
}
