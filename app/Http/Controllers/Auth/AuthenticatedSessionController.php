<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $user = Auth::user();

        // Redirect one specific user to the index route, others to the home route
        if ($user->email == 'abdixojayev@example.com') {  // Replace with specific user condition
            return redirect('/index');
        }elseif($user->email == 'qarabayeva@example.com'){
            return redirect('/business_trips');
        }
        elseif($user->email == 'qutliyev@example.com'){
            return redirect('/training_courses');
        }
        elseif($user->email == 'maxmudov@example.com'){
            return redirect('/young_economists');
        }
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
