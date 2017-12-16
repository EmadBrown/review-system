<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Validators\AdminValidator;
use Illuminate\Support\Facades\Session;
use Auth;

class AdminLoginController extends Controller
{
    
    private $formValidator;
    
    public function __construct(AdminValidator $formValidator)
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
      $this->formValidator = $formValidator;
    }

    public function showLoginForm()
    {
      return view('auth.admin-login');
    }

    public function login(Request $request)
    {
      // Validate the form data
        $this->formValidator->validateRequest($request);
       if($this->formValidator->isValid())
        {
                // Attempt to log the user in
                if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) 
                {
                  // if successful, then redirect to their intended location
                  return redirect()->intended(route('admin.dashboard'));
                }
            else {
                      // Flash message
                   Session::flash('danger','Wrong email or password ');
                }
         }

                // if unsuccessful, then redirect back to the login with the form data
                return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
