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
use Illuminate\Support\Facades\Storage;

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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required','string','max:255','unique:users'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone_number' => ['required', 'digits_between:10,15'],
            'other_phone' => ['nullable','digits_between:10,15' ],
            'address' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'image' => 'nullable|max:1024',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' =>$request->username,
            'email' => $request->email,
            'phone_number' =>$request->phone_number,
            'other_phone' => $request->other_phone,
            'image' => $this->Image($request),
            'address' => $request->address,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]);
                
        event(new Registered($user));
        
        Auth::login($user);

        if(!$user->hasVerifiedEmail()){
            return redirect()->route('verification.notice');

        }else{
            return redirect()->route('home');
        }
    }
    
    public function Image(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $request->first_name . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('users', $imageName, 'public');
            return $imageName;
        }
        return null;
    }   
}
