<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Show the profile edit form
    public function edit()
    {
        // Fetch the authenticated user's data
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    // Update the user's profile data
    public function update(Request $request)
    {
        $user = auth()->user();  // Get the authenticated user

        // Validate the request
        $request->validate([
            'UserName' => 'required|string|max:255',
            'Email' => 'required|email|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',  // Optional profile picture
            'PhoneNumber' => 'nullable|string|max:15',
            'Address' => 'nullable|string|max:500',
            'Country' => 'nullable|string|max:100',
            'Province' => 'nullable|string|max:100',
            'City' => 'nullable|string|max:100',
            'DOB' => 'nullable|date',
            'Gender' => 'nullable|string',
        ]);

        // Update basic user details
        $user->UserName = $request->input('UserName');
        $user->Email = $request->input('Email');
        $user->PhoneNumber = $request->input('PhoneNumber');
        $user->Address = $request->input('Address');
        $user->Country = $request->input('Country');
        $user->Province = $request->input('Province');
        $user->City = $request->input('City');
        $user->DOB = $request->input('DOB');
        $user->Gender = $request->input('Gender');

        // Handle profile photo update
        if ($request->hasFile('photo')) {
            // If there's an old profile photo, delete it
            if ($user->profile_photo && Storage::exists('/public/profilephoto' . $user->profile_photo)) {
                Storage::delete('/public/profilephoto' . $user->profile_photo);
            }

            // Store the new profile photo
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->storeAs('/public/profilephoto', $imageName);
            $user->profile_photo = $imageName;
        }

        // Save updated user profile
        $user->save();

        // Redirect back with a success message
        return redirect()->route('profile.edit')->with('success', 'Profile successfully updated!');
    }
}
