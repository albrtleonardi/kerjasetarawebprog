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

    public function listing(Request $request)
{
    $search = $request->input('search');
    $selectedCompanyId = $request->input('selected_company');

    // Fetch companies with optional search
    $companies = Companies::when($search, function ($query, $search) {
        $query->where('CompanyName', 'LIKE', "%{$search}%");
    })->paginate(3);

    // Fetch selected company details (if provided)
    $selectedCompany = $selectedCompanyId
        ? Companies::with('jobs')->where('CompanyID', $selectedCompanyId)->first()
        : null;

    // Return view with the query preserved for pagination
    return view('companies.listing', [
        'companies' => $companies->appends(['selected_company' => $selectedCompanyId, 'search' => $search]),
        'selectedCompany' => $selectedCompany,
        'search' => $search
    ]);
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
