<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */

    protected $redirectTo = '/home';

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required'
        ]);
    }

    protected function getCredentials(Request $request)
    {
        return $request->only('phone');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::guard($this->getGuard())->attempt(['user_phone'=>$_POST['phone'],'password'=>$_POST['password'],
                'status'=>1,'user_type'=>'admin'], $request->has('remember'))) {
            User::where('user_phone',$request->phone)->update([
                'login_at' => date("Y-m-d H:i:s"),
            ]);
            return $this->handleUserWasAuthenticated($request, $throttles);
        }else if(Auth::guard($this->getGuard())->attempt(['user_phone'=>$_POST['phone'],'password'=>$_POST['password'],
            'status'=>1,'user_type'=>'company'], $request->has('remember'))) {
            User::where('user_phone',$request->phone)->update([
                'login_at' => date("Y-m-d H:i:s"),
            ]);
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles && ! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }
        if(User::where('user_phone',$_POST['phone'])->count()!=0){
            if(User::where('user_phone',$_POST['phone'])->first()->status=="0"){
                return $this->mysendFailedLoginResponse($request);
            }else{
                return $this->sendFailedLoginResponse($request);
            }
        }else{
            return $this->sendFailedLoginResponse($request);
        }
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->secondsRemainingOnLockout($request);

        return redirect()->back()
            ->withInput($request->only('phone', 'remember'))
            ->withErrors([
                'phone' => $this->getLockoutErrorMessage($seconds),
            ]);
    }

    public function sendFailedLoginResponse(Request $request){
        return redirect()->back()
            ->withInput($request->only('phone', 'remember'))
            ->withErrors([
                'phone' => $this->getFailedLoginMessage(),
            ]);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->create($request->all()));
        if(session('url.intended')!=""){
            return redirect(session('url.intended'));
        }else{
            return redirect($this->redirectPath());
        }
    }

    public function mysendFailedLoginResponse(Request $request){
        return redirect()->back()
            ->withInput($request->only('phone', 'remember'))
            ->withErrors([
                'phone' => "该账户已被禁用，请联系管理员",
            ]);
    }

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'phone' => array( 'required','min:11','regex:/^13[\d]{9}$|^14[5,
            7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$/'),
            'password' => 'required|min:6|confirmed',
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
            'user_name' => $data['name'],
            'user_phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'user_type' => "admin",
            'groupid' => "admin",
            'status' => 1
        ]);
    }
}
