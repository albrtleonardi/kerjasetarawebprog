<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    
    
    public function edit()
    {
        $user = Auth::user();
        $profile = Profile::firstOrCreate(['user_id' => Auth::id()]);
    
        $profile->refresh();
    
        return view('profile.edit', compact('profile','user'));
    }
    

    public function update(Request $request)    
    {
        $data = $request->validate([
            // 'NamaLengkap' => 'nullable|string|max:255',
            'UserName' => 'required|string|max:255',
            'Email' => 'required|email|max:255',
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
    
    $user = Auth::user();
    DB::table('users')->where('id', Auth::id())->update($data);

    return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
}}
