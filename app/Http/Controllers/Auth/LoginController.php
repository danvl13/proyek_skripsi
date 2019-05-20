<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logoutpost');
    }

    public function loginpost(Request $request){

        $this->validate($request, [
            'username'=>'required',
            'password'=>'required',
        ]);
        $username=$request->input('username');
        $password=$request->input('password');

        // ambil user dari username
        $user=User::where('username', $username)->where('password',$password)->first();
        //cek password
        if($user){
            if($request->input('remember')){
                Auth::login($user, true);
            }else{
                Auth::login($user);
            }
            return redirect()->route('acara.index');
        }else{
            $request->session()->flash('failLogin','Email atau Password salah');
            return redirect()->route('login');
        }
    }
    public function logoutpost()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
