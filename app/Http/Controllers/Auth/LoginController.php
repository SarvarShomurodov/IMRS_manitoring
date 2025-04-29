<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    // protected $redirectTo = '/home';
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    
    //     $credentials = $request->only('email', 'password');
    //     $remember = $request->has('remember'); // Check if "Remember Me" was selected
    
    //     if (Auth::attempt($credentials, $remember)) {
    //         // Authentication successful
    //         return redirect()->intended('dashboard'); // Redirect to the intended page
    //     }
    
    //     // Authentication failed
    //     return back()->withErrors(['email' => 'Логин ёки Парол хато']);
    // }
    protected function redirectTo()
    {
        $user = Auth::user();

        // Redirect based on role
        if ($user->role == 'superadmin') {
            return '/index';
        }

        if ($user->role == 'admin') {
            return '/training_courses';
        }

        if ($user->role == 'editor') {
            return '/business_trips';
        }

        if ($user->role == 'moderator') {
            return '/meeting';
        }

        if ($user->role == 'author') {
            return '/methods';
        }

        if ($user->role == 'subscriber') {
            return '/young_economists';
        }

        if ($user->role == 'noner') {
            return '/oavpublish';
        }
        if ($user->role == 'loyigaRaxbar') {
            return '/training_courses';
        }

        // Default fallback redirect
        return '/default-dashboard';
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
