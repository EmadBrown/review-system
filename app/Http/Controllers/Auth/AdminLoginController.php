<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Session;
use Auth;

class AdminLoginController extends Controller
{
    
  /**
   * 
   * @param AdminValidator $formValidator
   */
    public function __construct( )
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    
    /**
     * 
     * @return view
     */
    public function showLoginForm()
    {
      return view('auth.admin-login');
    }
    
    /**
     * 
     * @param AdminLoginRequest $request
     * @return view Admin Dashboard
     */
    public function login(AdminLoginRequest $request)
    {
                // Attempt to log the user in
                if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) 
                {
                  // if successful, then redirect to their intended location
                  return redirect()->intended(route('admin.dashboard'));
                }
            else {
                      // Flash message
                   Session::flash('danger','Wrong Email or Password ');
                }

                // if unsuccessful, then redirect back to the login with the form data
                return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    
    /**
     * 
     * @return Home page
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
