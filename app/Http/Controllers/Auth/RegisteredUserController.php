<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => [
                'required',
                'confirmed',
                Password::min(8) // Minimum length of 8 characters
                    ->letters() // Must contain at least one letter
                    ->mixedCase() // Must contain both uppercase and lowercase letters
                    ->numbers() // Must contain at least one number
                    ->symbols() // Must contain at least one special character
            ],
            [
                'password.required' => 'The password field is required.',
                'password.confirmed' => 'The password confirmation does not match.',
                'password.min' => 'The password must be at least 8 characters.',
                'password.letters' => 'The password must contain at least one letter.',
                'password.mixedCase' => 'The password must contain both uppercase and lowercase letters.',
                'password.numbers' => 'The password must contain at least one number.',
                'password.symbols' => 'The password must contain at least one special character.',
            ]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Profile::create([
            'user_id' => $user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);
        
        // Redirect to the profile edit page after registration
        return redirect()->route('profile.edit', $user->id)->with('warning', 'Sila lengkapkan profil anda sebelum ke halaman seterusnya.');
        // return redirect()->route('dashboard');
    }
}
