<?php

namespace App\Http\Controllers;

use App\Models\Companies; 
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $companies = Companies::when($search, function($query, $search) {
            $query->where('CompanyName', 'LIKE', "%{$search}%");
        })->get();

        return view('companies.index', compact('companies', 'search'));
    }

    public function showListCompanies()
    {
        $companies = Companies::all();
        return view('home', compact('companies'));
    }

    public function show($CompanyID)
    {
        $company = Companies::with('jobs')->where('CompanyID', $CompanyID)->firstOrFail(); // Fetch the company by CompanyID
        return view('companies.show', compact('company'));
    }
}
