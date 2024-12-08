<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JobController extends Controller
{
    // public function index(Request $request)
    // {
    //     $query = Jobs::with('company');
    
    //     if ($request->filled('search')) {
    //         $search = $request->input('search');
    //         $query->where('Role', 'LIKE', "%$search%")
    //               ->orWhereHas('company', function ($q) use ($search) {
    //                   $q->where('CompanyName', 'LIKE', "%$search%");
    //               });
    //     }
    
    //     if ($request->filled('job_type')) {
    //         $query->where('JobType', $request->input('job_type'));
    //     }
    
    //     if ($request->filled('remote_or_onsite')) {
    //         $query->where('RemoteOrOnsite', $request->input('remote_or_onsite'));
    //     }
    
    //     if ($request->filled('career_level')) {
    //         $query->where('CareerLevel', $request->input('career_level'));
    //     }
    
    //     if ($request->filled('suitable_for')) {
    //         $suitableFor = $request->input('suitable_for');
    //         $query->where(function($q) use ($suitableFor) {
    //             foreach ($suitableFor as $option) {
    //                 $q->orWhere('SuitableFor', 'LIKE', "%$option%");
    //             }
    //         });
    //     }
    
    //     if ($request->filled('salary_min')) {
    //         $query->where('SalaryMin', '>=', $request->input('salary_min'));
    //     }
    //     if ($request->filled('salary_max')) {
    //         $query->where('SalaryMax', '<=', $request->input('salary_max'));
    //     }
    
    //     $jobs = $query->get();
    
    //     return view('jobs.index', compact('jobs'));
    // }

    // In JobsController
public function index(Request $request)
{
    $suitableFor = $request->query('suitable_for');
    
    // You can filter the jobs based on the disability type here
    $jobs = Job::when($suitableFor, function($query) use ($suitableFor) {
        return $query->where('suitable_for', $suitableFor);
    })->get();

    return view('jobs.index', compact('jobs'));
}


    public function recommendedJobs()
    {
        $user = Auth::user();
        $profile = $user->profile;

        if (!$profile || !$profile->Description || !$profile->SkillName) {
            return view('dashboard', [
                'user' => $user,
                'recommendedJobs' => collect(), // Empty collection to avoid errors
            ]);
        }

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

        return view('dashboard', [
            'user' => $user,
            'recommendedJobs' => $recommendedJobs,
        ]);
    }

    public function listing(Request $request)
    {
        $search = $request->input('search');
        $selectedJobId = $request->input('selected_job');
        $query = Jobs::with('company')->distinct();
    
        // Handle filtering logic
        if ($request->filled('job_type')) {
            $query->where('JobType', $request->input('job_type'));
        }
    
        if ($request->filled('remote_or_onsite')) {
            $query->where('RemoteOrOnsite', $request->input('remote_or_onsite'));
        }
    
        if ($request->filled('career_level')) {
            $query->where('CareerLevel', $request->input('career_level'));
        }
    
        if ($request->filled('suitable_for')) {
            $query->where('SuitableFor', $request->input('suitable_for'));
        }
    
        
    
        if ($request->filled('search')) {
            $query->where('Role', 'LIKE', "%{$search}%");
        }
    
        // Paginate the jobs list
        $jobs = $query->paginate(3);
        $selectedJob = $selectedJobId
            ? Jobs::with('company')->where('JobID', $selectedJobId)->first()
            : null;
    
        return view('jobs.listing', [
            'jobs' => $jobs->appends($request->all()),
            'selectedJob' => $selectedJob,
            'search' => $search
        ]);
    }

        public function show($JobID)
        {
            $job = Jobs::with('company')->where('JobID', $JobID)->firstOrFail(); 
        
            return view('jobs.show', compact('job'));
        }
    


}
