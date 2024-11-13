<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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

        session()->flash('success', [
            'message' => 'Login was successful!',
            'duration' => $this->alert_message_duration,
        ]);

        return $this->redirectBasedOnRole(Auth::user());
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function authenticated(Request $request, $user)
    {
        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('verification.notice')
                ->with('warning', 'You need to verify your email address before accessing the System.');
        }

        return redirect()->intended($this->redirectPath());
    }


    private function redirectBasedOnRole($user)
    {        
        if (!isset($user->user_level)) {
            return redirect()->route('home');
        }
    
        $role = (int) $user->user_level;
    
        return match ($role) {
            0 => redirect()->route('admin_dashboard'),
            1 => redirect()->route('admin_dashboard'),
            2 => redirect()->route('teacher_dashboard'),
            3 => redirect()->route('accountant_dashboard'),
            4 => redirect()->route('student_dashboard'),
            5 => redirect()->route('parent_dashboard'),
            default => redirect()->route('home'),
        };
    }
    
}
