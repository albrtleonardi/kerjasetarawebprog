<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::firstOrCreate(['user_id' => Auth::id()]);

        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'PhoneNumber' => 'nullable|string|max:15',
            'Country' => 'nullable|string|max:255',
            'Province' => 'nullable|string|max:255',
            'City' => 'nullable|string|max:255',
            'Address' => 'nullable|string|max:255',
            'Gender' => 'nullable|string|max:10',
            'DOB' => 'nullable|date',
            'Description' => 'nullable|string|max:500',
            'SkillName' => 'nullable|string|max:255',
        ]);

        $profile = Auth::user()->profile;
        $profile->update($request->all());

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }

    public function show()
    {
        $profile = Auth::user()->profile;

        return view('profile.show', compact('profile'));
    }
}
