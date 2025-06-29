<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display the admin login view.
     */
    public function showAdminLoginForm(): View
    {
        return view('auth.admin-login');
    }

    /**
     * Handle admin login request.
     */
    public function adminLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Check if user is admin
            if ($user->isAdmin()) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            } else {
                // If not admin, logout and redirect back with error
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Access denied. Admin credentials required.',
                ])->onlyInput('email');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle admin logout request.
     */
    public function adminLogout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login');
    }

    /**
     * Display the user login view.
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Handle user login request.
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            $request->session()->regenerate();
            
            // Redirect based on role - users should only access user areas
            if ($user->isAdmin()) {
                // If admin tries to login via user login, redirect to admin portal
                return redirect()->route('admin.dashboard')->with('info', 'Please use the admin portal for admin access.');
            } else {
                return redirect()->intended(route('user.orders.index'));
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle user logout request.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }

    /**
     * Display the registration view.
     */
    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Check if this is an admin registration
        $isAdmin = $request->name === 'super admin' && $request->email === 'superadmin@gmail.com';
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $isAdmin ? 'admin' : 'user', // Set role based on registration
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect based on role
        if ($isAdmin) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.orders.index');
        }
    }
}
