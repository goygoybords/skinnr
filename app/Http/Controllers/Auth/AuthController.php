<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
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
        //session_start();
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'username' => 'required|min:8|unique:employee',
            'password' => 'required|min:8|confirmed|alpha_num',
            'password_confirmation'=> 'required|min:6',
            'name' => 'required|max:255|',
            'position' => 'required'
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function getRegister()
    {
        $title = "Registration";
        return view('auth.register')->with(compact('title'));
    }
    public function getLogin()
    {
        $title = "Login";
        return view('auth.login')->with(compact('title'));
    }

    public function postLogin(Request $request)
    {
        $rules = ['username' => 'required' , 'password' => 'required'];
        $this->validate($request,$rules);

        $credentials = [
                        'username' => $request->input('username'), 
                        'password' => $request->input('password'),
                        'status'   => 1
                    ];
        
        if (Auth::attempt($credentials, $request->has('remember_me'))) 
        {
            //$_SESSION['isLogin'] = true;
            return redirect()->intended($this->redirectPath());
        }
      
        return redirect('auth/login')
            ->withInput($request->only('username', 'remember_me'))
            ->withErrors([
                'username' => $this->getFailedLoginMessage(),
            ]);
    }

    protected function create(array $data)
    {
        $user = new User;
        $user->username = $data['username'];
        $user->password = bcrypt($data['password']);
        $user->name = $data['name'];
        $user->position = $data['position'];
        $user->status = User::STATUS_ACTIVE;
        $user->save();
        return $user;
    }
    public function getLogout()
    {
        //session_destroy();
        Auth::logout();
        return redirect('/');
    }
}
