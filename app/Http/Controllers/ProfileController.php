<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's card profile.
     */
    public function index()
    {
        $alumni = Profile::whereHas('user', function ($query) {
            $query->where('role', 'user');
        })->with('user')->paginate(6);
    
        return view('profile.alumni-profile', compact('alumni'));
    }

    public function show($id)
    {
        $profile = Profile::find($id); // Assuming a one-to-one relationship between User and Profile

        return view('profile.alumni-details', compact('profile'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $profile = $user->profile; // Assuming a one-to-one relationship between User and Profile

        return view('profile.profile', compact('user', 'profile'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the request
        $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date',
            'contact_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'job' => 'nullable|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the user's profile
        $profile = $user->profile ?? new Profile();
        $profile->user_id = $user->id;
        $profile->full_name = $request->input('full_name');
        $profile->gender = $request->input('gender');
        $profile->date_of_birth = $request->input('date_of_birth');
        $profile->contact_number = $request->input('contact_number');
        $profile->address = $request->input('address');
        $profile->bio = $request->input('bio');
        $profile->job = $request->input('job');
        $profile->facebook = $request->input('facebook');
        $profile->instagram = $request->input('instagram');
        $profile->linkedin = $request->input('linkedin');

        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            $profilePic = $request->file('profile_pic');
            $profilePicPath = $profilePic->store('profile_pictures', 'public');
            $profile->profile_pic = $profilePicPath;
        }

        $profile->save();

        return redirect()->route('profile.edit', $id)->with('success', 'Profile updated successfully!');
    }

    // Change the password
    public function changePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the request
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Check if the current password matches
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the password
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('profile.edit', $id)->with('success', 'Password changed successfully!');
    }


}