<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'UserName' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:users,Email',
            'Password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'UserName' => $request->UserName,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['Email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function dashboard()
{
    $user = Auth::user();
    $profile = $user->profile;
    $roles = Jobs::select('Role')->distinct()->get();
    $jobs = Jobs::all();

    // if (!$profile || !$profile->Description || !$profile->SkillName) {
    //     return view('dashboard', [
    //         'user' => $user,
    //         'recommendedJobs' => collect(), // Empty collection to avoid errors
    //     ]);
    // }

    $disabilities = ['Wheelchair', 'Deaf', 'Visual Impairment', 'Dyslexia', 'Hearing Impaired', 'Low Vision'];

    $disabilityMatches = array_filter($disabilities, function($disability) use ($profile) {
        return stripos($profile->Description, $disability) !== false;
    });

    $skills = array_map('trim', explode(',', $profile->SkillName));

    $recommendedJobs = Jobs::where(function ($query) use ($disabilityMatches) {
        foreach ($disabilityMatches as $disability) {
            $query->orWhere('SuitableFor', 'LIKE', "%$disability%");
        }
    })
    ->orWhere(function ($query) use ($skills) {
        foreach ($skills as $skill) {
            $query->orWhere('RequiredSkills', 'LIKE', "%$skill%");
        }
    })
    ->get();


    // Pass both recommendedJobs and roles to the view correctly
    return view('dashboard', [
        'user' => $user,
        'roles' => $roles,
        'recommendedJobs' => $recommendedJobs,
        'disabilities' => $disabilities,
        'jobs' => $jobs,
    ]);
}


}
