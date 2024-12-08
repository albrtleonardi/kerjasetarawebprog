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
            'Photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',  // Optional profile picture
            'PhoneNumber' => 'nullable|string|max:15',
            'Address' => 'nullable|string|max:500',
            'Country' => 'nullable|string|max:100',
            'Province' => 'nullable|string|max:100',
            'City' => 'nullable|string|max:100',
            'DOB' => 'nullable|date',
            'Gender' => 'nullable|string|max:100',
            'Description' => 'nullable|string|max:255',
            'SkillName' => 'nullable|string|max:255',
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
        $user->Description = $request->input('Description');
        $user->SkillName = $request->input('SkillName');
        
        $user = auth()->user();  

        if ($request->hasFile('Photo')) {
            // Store the uploaded file
            $filePath = $request->file('Photo')->store('profilephoto', 'public');
    
            // Delete the old photo if it's not the default
            if ($user->profile_photo && $user->profile_photo !== 'default.jpg') {
                Storage::disk('public')->delete('profilephoto/' . $user->profile_photo);
            }
    
            // Update the user's profile photo in the database
            $user->profile_photo = basename($filePath);
        }
    
        $user->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
