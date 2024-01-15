<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\user;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/request_capex';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){

        $user = User::where('username', $request->username)->first();  
       
        if($user)
        {
            if($user->is_ldap)
            {
                if(self::is_exsits_domain($request->username,$request->password))
                {
                    Auth::loginUsingId($user->id);
                    if(auth()->user()->is_admin == 1){
                        return redirect()->route('company');
                    }else if(auth()->user()->is_admin == 2){
                        return redirect()->route('company');
                    }else{
                        return redirect()->route('capex_new');
                    }
                }
                else {
                    return redirect()->route('login')->with('error', 'Username หรือ Password ไม่ถูกต้อง / Username in domain is locked.');
                }

            }else{
                return redirect()->route('login')->with('error', 'Username ถูก Disable.');
            }
        }
        else
        {
            return redirect()->route('login')->with('error', 'Username นี้ไม่มีสิทธิ์เข้าใช้งาน.');
        }
    }
   
    public function is_exsits_domain($userid,$password)
    {
        $status = 0;
        $message_error = "";
        $ldap_Server = 'deestonegrp.com';
        $domain_login = 'deestonegrp' . "\\" . 'webmaster';
        $domain_pw = 'Webma$ter!';
        $ldap_port = '389';

        $ldap_connect = @ldap_connect($ldap_Server,$ldap_port);
        if (!$ldap_connect) {
            $message_error = 'Cannot Connect to LDAP server';
            die('Cannot Connect to LDAP server');
        }
        else{
            $user_ad = 'deestonegrp' . "\\" . $userid;
            $ldap_bind = @ldap_bind($ldap_connect,$user_ad,$password);
        }
        if($ldap_bind) return true;
        return false;
        
    }

    // public function login_(Request $request)
    // {
    //     $input = $request->all();

    //     $this->validate($request, [
    //         'username' => 'required',
    //         'password' => 'required'
    //     ]);
    //     if(auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))){
    //         if(auth()->user()->is_admin == 1){
    //             return redirect()->route('company');
    //         }else if(auth()->user()->is_admin == 2){
    //             return redirect()->route('company');
    //         }else{
    //             return redirect()->route('capex_new');
    //         }
    //     }else{
    //         return redirect()->route('login')->with('error', 'Email-address and Password are wrong.');
    //     }
    // }
    // public function username(){
    //     return 'username';
    // }
}
