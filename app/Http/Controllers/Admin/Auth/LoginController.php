<?php

namespace App\Http\Controllers\Admin\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Model\admin\admin;

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
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and


        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
     

        return $this->sendFailedLoginResponse($request);
    }
      /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $admin = admin::where('email',$request->email)->first();
        
        if($admin){
            
            
            if($admin->status == 0){
                return ['email'=>'inactive','password'=>'You are not an active person, please contact your admin ']; 
            }else{
                return ['email'=>$request->email,'password'=>$request->password,'status'=>1];
            }

        }
       
        
         return $request->only($this->username(), 'password');
    }


    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
