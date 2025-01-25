<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Services\LocationService; // Import LocationService
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class WebAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token to prevent session fixation attacks
        $request->session()->regenerateToken();

        // Redirect to the login page or any other route
        return redirect()->route('login');
    }
}
