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
        <h2>Job List</h2>
        <form method="GET" action="{{ route('jobs.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search companies..."
                    value="{{ $search ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>

        @foreach ($jobs as $job)
            <div class="company clickable"
                data-url="{{ route('jobs.index', ['selected_job' => $job->JobID]) }}">

                <!-- Company Image -->
                @if ($job->company->CompanyImage)
                    <img src="{{ asset($job->company->CompanyImage) }}" alt="{{ $job->company->CompanyName }} Logo"
                        class="company-image mb-2" style="max-height: 100px; width: auto;">
                @else
                    <img src="https://via.placeholder.com/100" alt="No Image Available"
                        class="company-image mb-2" style="max-height: 100px; width: auto;">
                @endif

                <!-- Job Details -->
                <h5>{{ $job->Role }}</h5>
                <p>{{ $job->JobType}} | {{ $job->CareerLevel }}</p>

                <!-- Company Description (with a limit on the character length) -->
                <p class="company-description">
                    {{ Str::limit($job->JobDescription, 100, '...') }}
                </p>
            </div>
        @endforeach

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $jobs->appends(['selected_job' => request('selected_job'), 'search' => request('search')])->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- Details Section -->
    <div class="details">
        @if ($selectedJob)
            <h1>{{ $selectedJob->Role }}</h1>

            @if ($selectedJob->company->CompanyImage)
                <img src="{{ asset($selectedJob->company->CompanyImage) }}" alt="{{ $selectedJob->company->CompanyName }} Logo"
                     class="img-fluid rounded mb-3" style="max-height: 150px;">
            @else
                <p class="text-muted">No Image Available</p>
            @endif

            <p><strong>Job Type :</strong> {{ $selectedJob->JobType }}</p>
            <p><strong>Employment Type :</strong> {{ $selectedJob->RemoteOrOnsite }}</p>
            <p><strong>Career Level :</strong> {{ $selectedJob->CareerLevel }}</p>
            <p><strong>Suitable For:</strong> {{ $selectedJob->RemoteOrOnsite }}</p>
            <p><strong>Requirements :</strong> {{ $selectedJob->Requirements }}</p>
            <p><strong>Required Skills :</strong> {{ $selectedJob->RequiredSkills }}</p>
            <p><strong>Salary :</strong> {{ $selectedJob->SalaryMin }} - {{ $selectedJob->SalaryMax }}</p>
            <p><strong>Company Website:</strong> <a href="{{ $selectedJob->company->CompanyLink }}" target="_blank">
                {{ $selectedJob->company->CompanyLink }}</a></p>
            <p><strong>City:</strong> {{ $selectedJob->company->CompanyCity }}</p>
            <button type="button" class="btn btn-primary">Apply</button>

            
        @else
            <p>Select a job to view its details.</p>
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