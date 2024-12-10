@extends('layouts.usernavbar')

@section('content')

<head>
    <title>Company Listings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    body {
    background-color: #eff7fe;
    font-family: 'Poppins', sans-serif; /* Use Poppins font globally */
    margin-top: 2vh;
}

    /* General layout styling */
    .container {
        display: flex;
        gap: 20px;
    }

    /* Sidebar styles (Company Listings) */
.sidebar {
    margin: 0 auto;
    max-width: 600px;
}

.sidebar h2 {
    font-size: 1.5em;
    margin-bottom: 20px;
    color: #333;
}

/* Company List Container */
.sidebar .company {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 15px;
    border: 1px solid #ddd; /* Border for the main clickable container */
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

/* Top Section (Logo and Details) */
.sidebar .company .top-section {
    display: flex;
    gap: 15px;
    align-items: center;
}

/* Company Logo */
.sidebar .company .top-section .logo-container img {
    width: 80px;
    height: 60px;
}

/* Company Details */
.sidebar .company .top-section .detailsSidebar {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.sidebar .company .top-section .detailsSidebar h5 {
    margin: 0;
    font-size: 1.1em;
    color: #333;
}

.sidebar .company .top-section .detailsSidebar .industry {
    font-size: 0.9em;
    color: #0066cc;
}

.sidebar .company .top-section .detailsSidebar .location {
    font-size: 0.9em;
    color: #777;
}

/* Description Section */
.sidebar .company .description {
    margin-top: 10px;
    font-size: 0.85em;
    color: #555;
    line-height: 1.4;
    max-height: 40px;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Pagination */
.sidebar .pagination {
    margin-top: 20px;
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

    /* 1st Container Styling */
.container-1 {
    display: flex;
    align-items: center;
    gap: 20px;
}

.nested-container-1 img {
    max-width: 100%;
    max-height: 150px;
    border-radius: 8px;
}

.nested-container-2 {
    display: flex;
    flex-direction: column;
}

.nested-container-2 .company-name {
    font-size: 1.5em;
    margin: 0;
    color: #333;
}

.nested-container-2 .company-address {
    font-size: 1em;
    color: #777;
}

/* 2nd Container Styling */
.container-2 {
  background-color: #ffffff;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 20px;
  font-family: Arial, sans-serif;
}

.container-2 h4 {
  font-size: 18px;
  color: #007bff; /* Blue color for the heading */
  margin-bottom: 15px;
  font-family: 'Poppins', sans-serif;
}

.container-2 .info-wrapper {
  display: flex;
  flex-wrap: wrap; /* Enables wrapping for smaller screens */
  gap: 20px; /* Adds spacing between items */
}

.container-2 .info-item {
  flex: 1 1 calc(50% - 20px); /* Each item takes 50% width with space between */
  min-width: 200px; /* Ensures a minimum width */
}

.container-2 .info-item strong {
  display: block;
  font-size: 14px;
  color: #333333;
  margin-bottom: 5px; /* Space between label and value */
}

.container-2 .info-item p,
.container-2 .info-item a {
  font-size: 14px;
  color: #666666;
  margin: 0;
  line-height: 1.6;
  word-wrap: break-word; /* Prevents long text (e.g., URLs) from overflowing */
  font-family: 'Poppins', sans-serif;
}

.container-2 .info-item a {
  color: #007bff; /* Blue color for links */
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}

.container-2 .info-item a:hover {
  text-decoration: underline; /* Add underline on hover */
  font-family: 'Poppins', sans-serif;
}


/* 3rd Container Styling */
.container-3 {
  background-color: #ffffff;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 20px;
  font-family: Arial, sans-serif;
}

.container-3 h4 {
  font-size: 18px;
  color: #007bff; /* Blue color for the heading */
  margin-bottom: 15px;
  font-family: 'Poppins', sans-serif;
}

.container-3 .info-wrapper {
  display: flex;
  flex-wrap: wrap; /* Allows items to wrap to the next line */
  gap: 20px; /* Adds spacing between items */
}

.container-3 .info-item {
  flex: 1 1 calc(50% - 20px); /* Each item takes up 50% width minus the gap */
  min-width: 200px; /* Ensures a minimum width for smaller screens */
}

.container-3 .info-item strong {
  display: block;
  font-size: 14px;
  color: #333333;
  margin-bottom: 5px; /* Space between the label and query */
  font-family: 'Poppins', sans-serif;
}

.container-3 .info-item p {
  font-size: 14px;
  color: #666666;
  margin: 0;
  line-height: 1.6;
  font-family: 'Poppins', sans-serif;
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

    .container-4 {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
    font-family: 'Poppins', sans-serif;
    margin-top: 20px; /* Add spacing above */
}

.container-4 h4 {
    font-size: 1.5rem;
    margin-bottom: 15px; /* Adjusted spacing for better alignment */
    color: #007bff; /* Blue color for the heading */
    font-family: 'Poppins', sans-serif;
}

.company-logo-and-details {
    display: flex;
    justify-content: flex-start;
    gap: 1rem; /* Space between logo and details */
    margin-bottom: 15px; /* Space after this section */
}

.company-logo {
    flex: 0 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
}

.logo-img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 50%;
}

.job-details {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.job-position h5 {
    margin: 0;
    font-weight: 600;
    color: #333333;
}

.company-name,
.job-salary,
.job-location {
    margin: 0.3rem 0;
    color: #666666;
    font-size: 0.9rem;
}

.logo-img {
    max-width: 50px;
    max-height: 50px;
    object-fit: cover;
}

.job-title {
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.salary {
    font-size: 0.9rem;
    font-weight: bold;
}


.job-card-link {
        text-decoration: none;
        color: inherit;
    }
    .job-card-link:hover .card {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .container-4 {
    padding: 20px;
}

.jobs-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* Changed to 2 columns */
    gap: 20px;
    margin-top: 20px;
}

.job-card {
    height: 100%; /* Ensure full height */
}

.job-card-link {
    text-decoration: none;
    color: inherit;
    display: block;
    height: 100%; /* Ensure full height */
}

.card {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    display: flex;
    flex-direction: column;
    height: 100%; /* Ensure full height */
}

.card-body {
    flex: 1; /* Allow card body to grow */
    padding: 20px;
    display: flex;
    flex-direction: column;
}

.company-logo-card {
    margin-bottom: 15px;
}

.logo-img {
    width: 60px;
    height: 60px;
    object-fit: contain;
    border-radius: 8px;
}

.job-title-card {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 10px;
    color: #333;
}

.company-name-card {
    color: #666;
    margin-bottom: 8px;
}

.salary-card {
    font-weight: 600;
    margin-bottom: 8px;
    color: #28a745;
}

.location-card {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 0;
}

.card-footer {
    background-color: #f8f9fa;
    border-top: 1px solid #e0e0e0;
    padding: 12px 20px;
    margin-top: auto; /* Push footer to bottom */
}

.date-posted-card {
    font-size: 0.85rem;
}

.no-jobs-card {
    grid-column: span 2; /* Span both columns */
}

/* Responsive design */
@media (max-width: 768px) {
    .jobs-grid {
        grid-template-columns: 1fr; /* Single column on mobile */
    }
    
    .no-jobs-card {
        grid-column: 1;
    }
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
        <div class="company clickable" data-url="{{ route('companies.index', ['selected_company' => $company->CompanyID]) }}">
            <!-- Top Section -->
            <div class="top-section">
                <!-- Left Side (Company Image) -->
                <div class="logo-container">
                    <img src="{{ $company->CompanyImage ? asset($company->CompanyImage) : 'https://via.placeholder.com/60' }}"
                        alt="{{ $company->CompanyName }} Logo">
                </div>

                <!-- Right Side (Company Details) -->
                <div class="detailsSidebar">
                    <h5 class="company-name">{{ $company->CompanyName }}</h5>
                    <p class="industry">{{ $company->Industry }}</p>
                    <p class="location">{{ $company->CompanyCity }}</p>
                </div>
            </div>

            <!-- Description Section -->
            <div class="description">
                <p>{{ Str::limit($company->CompanyDescription, 80, '...') }}</p>
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $companies->appends(['selected_company' => request('selected_company'), 'search' => request('search')])->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- Company Details Section -->
    <div class="details">
        @if ($selectedCompany)
            <!-- 1st Container -->
            <div class="container-1 d-flex">
                <!-- 1st Nested Container -->
                <div class="nested-container-1 mr-4">
                    @if ($selectedCompany->CompanyImage)
                        <img src="{{ asset($selectedCompany->CompanyImage) }}"
                             alt="{{ $selectedCompany->CompanyName }} Logo"
                             class="img-fluid rounded"
                             style="max-height: 150px;">
                    @else
                        <p class="text-muted">No Image Available</p>
                    @endif
                </div>

                <!-- 2nd Nested Container -->
                <div class="nested-container-2">
                    <h1 class="company-name">{{ $selectedCompany->CompanyName }}</h1>
                    <p class="company-address text-muted">{{ $selectedCompany->Address }}, {{ $selectedCompany->CompanyCity }}</p>
                </div>
            </div>

            <div class="container-2 mt-4">
                <h4>Company Information</h4>
                <div class="info-wrapper">
                    <!-- Industry -->
                    <div class="info-item">
                        <strong>Industry</strong>
                        <p>{{ $selectedCompany->Industry }}</p>
                    </div>
                    <!-- Employee Count -->
                    <div class="info-item">
                        <strong>Employee Count</strong>
                        <p>{{ $selectedCompany->EmployeeCount }}</p>
                    </div>
                    <!-- Dress Code -->
                    <div class="info-item">
                        <strong>Dress Code</strong>
                        <p>{{ $selectedCompany->DressCode }}</p>
                    </div>
                    <!-- Work Time -->
                    <div class="info-item">
                        <strong>Work Time</strong>
                        <p>{{ $selectedCompany->WorkTime }}</p>
                    </div>
                    <!-- Website -->
                    <div class="info-item">
                        <strong>Website</strong>
                        <a href="{{ $selectedCompany->CompanyLink }}" target="_blank">
                            {{ $selectedCompany->CompanyLink }}
                        </a>
                    </div>
                </div>
            </div>


            <!-- 3rd Container -->
            <div class="container-3 mt-4">
                <h4>Company Address</h4>
                <div class="info-wrapper">
                    <!-- City -->
                    <div class="info-item">
                        <strong>City</strong>
                        <p>{{ $selectedCompany->CompanyCity }}</p>
                    </div>
                    <!-- Address -->
                    <div class="info-item">
                        <strong>Address</strong>
                        <p>{{ $selectedCompany->Address }}</p>
                    </div>
                </div>
            </div>


            <!-- 4th Container -->
            <div class="container-4">
    <h4>Jobs at {{ $selectedCompany->CompanyName }}</h4>
    <div class="jobs-grid">
        @forelse ($selectedCompany->jobs as $job)
        <div class="job-card">
        <a href="{{ url('jobs') }}?selected_job={{ $job->JobID }}&page={{ request('page') }}&search={{ request('search', '') }}" class="job-card-link">
        <div class="card h-100"> <!-- Added h-100 class -->
                    <div class="card-body d-flex flex-column"> <!-- Added flex classes -->
                        <div class="company-logo-card">
                            @if($selectedCompany->CompanyImage)
                                <img src="{{ $selectedCompany->CompanyImage }}" 
                                     alt="{{ $selectedCompany->CompanyName }} Logo" 
                                     class="logo-img">
                            @else
                                <img src="https://via.placeholder.com/60" 
                                     alt="Default Logo" 
                                     class="logo-img">
                            @endif
                        </div>
                        <h5 class="job-title-card">{{ $job->Role }}</h5>
                        <p class="company-name-card"><strong>{{ $selectedCompany->CompanyName }}</strong></p>
                        <p class="salary-card text-success">{{ $job->Salary }}</p>
                        <p class="location-card mb-auto">{{ $job->Location }} / {{ $selectedCompany->CompanyCity }}</p>
                    </div>
                    <div class="card-footer">
                        <div class="date-posted-card text-muted">
                            <small><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($job->PostedDate)->format('d F Y') }}</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="no-jobs-card">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa fa-briefcase fa-3x mb-3 text-muted"></i>
                    <h5>No Jobs Available</h5>
                    <p class="text-muted">Currently there are no job openings at {{ $selectedCompany->CompanyName }}</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>



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
                // Get the current search and pagination params
                const searchParams = new URLSearchParams(window.location.search);
                const search = searchParams.get('search') || '';
                const page = searchParams.get('page') || '';

                // Navigate to the URL with the selected_company ID and retain query params
                const url = this.dataset.url + `&search=${search}&page=${page}`;
                if (url) {
                    window.location.href = url;
                }
            });
        });
    });
</script>


@endsection
