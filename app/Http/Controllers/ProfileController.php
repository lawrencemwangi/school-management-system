<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('success', [
            'message' => 'Profile details update successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::back();
    }

    public function Profile_image(Request $request)
    {
        $validated = $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = auth()->user();
    
        if($request->hasFile('profile_image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image); 
            }
    
            $image = $request->file('profile_image');
            $imageName = $user->first_name . '.' . $image->getClientOriginalExtension(); 
            $imagePath = $image->storeAs('users', $imageName, 'public'); 
    
            // Save the path to the user's image field
            $user->image = $imageName;
        }
    
        $user->save();
    
        return redirect()->route('profile.edit')->with('success', [
            'message' => 'Profile picture updated successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }
}
