@extends('layouts.with_sidebar')

@section('content')

<head>
    <title>Company Listings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<style>
    body {
    background-color: #eff7fe;
    margin-top: 2vh;
}

    /* General layout styling */
    .container {
        display: flex;
        gap: 20px;
    }

    /* Sidebar styles (Company Listings) */
    .sidebar {
        flex: 1;
    }

    .sidebar .company {
        width: 100%;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
        margin-bottom: 15px;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .sidebar .company:hover {
        background-color: #f9f9f9;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .sidebar .company h5 {
        margin: 0;
        font-size: 1.2em;
        color: #333;
    }

    .sidebar .company p {
        margin: 5px 0;
        color: #555;
    }

    /* Details section (Company Details) */
    .details {
        background-color: #fff;
        flex: 2;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .details h1 {
        font-size: 1.8em;
        margin-bottom: 20px;
    }

    .details p {
        margin: 10px 0;
        font-size: 1em;
        color: #333;
    }

    .details ul {
        padding-left: 20px;
        margin: 10px 0;
    }

    /* Company clickable container */
    .company.clickable {
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .company.clickable:hover {
        background-color: #f0f0f0;
    }

    /* Company image styling */
    .company-image {
        max-width: 200px;
        max-height: 100px;
        width: auto;
    }

    /* Company description (limited text with hover to show full) */
    .company-description {
        font-size: 0.9em;
        color: #555;
        margin-top: 5px;
        line-height: 1.4;
        max-height: 50px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .company-description:hover {
        max-height: none; /* Show full description on hover */
    }

</style>

<div class="container my-4">
    <!-- Sidebar Section -->
    <div class="sidebar">
        <h2>Company List</h2>
        <form method="GET" action="{{ route('companies.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search companies..."
                    value="{{ $search ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>

        @foreach ($companies as $company)
            <div class="company clickable"
                data-url="{{ route('companies.index', ['selected_company' => $company->CompanyID]) }}">

                <!-- Company Image -->
                @if ($company->CompanyImage)
                    <img src="{{ asset($company->CompanyImage) }}" alt="{{ $company->CompanyName }} Logo"
                        class="company-image mb-2" style="max-height: 100px; width: auto;">
                @else
                    <img src="https://via.placeholder.com/100" alt="No Image Available"
                        class="company-image mb-2" style="max-height: 100px; width: auto;">
                @endif

                <!-- Company Details -->
                <h5>{{ $company->CompanyName }}</h5>
                <p>{{ $company->Industry }} | {{ $company->CompanyCity }}</p>

                <!-- Company Description (with a limit on the character length) -->
                <p class="company-description">
                    {{ Str::limit($company->CompanyDescription, 100, '...') }}
                </p>
            </div>
        @endforeach

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $companies->appends(['selected_company' => request('selected_company'), 'search' => request('search')])->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- Details Section -->
    <div class="details">
        @if ($selectedCompany)
            <h1>{{ $selectedCompany->CompanyName }}</h1>

            @if ($selectedCompany->CompanyImage)
                <img src="{{ asset($selectedCompany->CompanyImage) }}" alt="{{ $selectedCompany->CompanyName }} Logo"
                     class="img-fluid rounded mb-3" style="max-height: 150px;">
            @else
                <p class="text-muted">No Image Available</p>
            @endif

            <p><strong>Address:</strong> {{ $selectedCompany->Address }}</p>
            <p><strong>Industry:</strong> {{ $selectedCompany->Industry }}</p>
            <p><strong>Employee Count:</strong> {{ $selectedCompany->EmployeeCount }}</p>
            <p><strong>Work Time:</strong> {{ $selectedCompany->WorkTime }}</p>
            <p><strong>Dress Code:</strong> {{ $selectedCompany->DressCode }}</p>
            <p><strong>Company Description:</strong> {{ $selectedCompany->CompanyDescription }}</p>
            <p><strong>Company Website:</strong> <a href="{{ $selectedCompany->CompanyLink }}" target="_blank">
                {{ $selectedCompany->CompanyLink }}</a></p>
            <p><strong>City:</strong> {{ $selectedCompany->CompanyCity }}</p>

            <h3 class="mt-4">Available Jobs at {{ $selectedCompany->CompanyName }}</h3>
            <ul>
                @forelse ($selectedCompany->jobs as $job)
                    <li>{{ $job->Role }} - <a href="{{ route('jobs.show', $job->JobID) }}">View Job</a></li>
                @empty
                    <p>No jobs available at this company.</p>
                @endforelse
            </ul>
        @else
            <p>Select a company to view its details.</p>
        @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Select all clickable company containers
        const companyContainers = document.querySelectorAll('.company.clickable');

        companyContainers.forEach(container => {
            container.addEventListener('click', function () {
                // Navigate to the URL stored in the data-url attribute
                const url = this.dataset.url;
                if (url) {
                    window.location.href = url;
                }
            });
        });
    });
</script>

@endsection
