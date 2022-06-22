<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Auth;

class AuthController extends Controller
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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/admin/login';


    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function getlogin()
    {
        return view('admin.auth.login');
    }

    /**
     * Admin login.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function login(Request $request)
    {
         // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6' 
      ]);

      // ddd(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]));

      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

        // $user = auth()->guard('admin')->user();
        $user = Auth::guard('admin')->user();

        return redirect()->intended(route('admin.dashboard'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
     
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

}
