@extends('layouts.usernavbar')

@section('content')

<head>
    <title>Company Listings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<style>
    body {
        background-color: #eff7fe;
        margin-top: 2vh;
    }

    /* General layout styling */
    .container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    /* Sidebar styles (Company Listings) */
    .sidebar {
        flex: 1;
        max-width: 300px;
        padding: 0 15px;
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
        border: none;
        border-radius: 8px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width: 100%;
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
        border: none;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }

    .company.clickable:hover {
        background-color: #f0f0f0;
    }

    /* Company image styling */
    .company-image {
        max-width: 200px;
        max-height: 100px;
        width: auto;
        margin-bottom: 10px;
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

    .job-card {
        width: 100%;
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 16px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }

    .header {
        display: flex;
        gap: 16px;
    }

    .company-logo img {
        max-width: 200px;
        max-height: 100px;
        background: #e0e0e0;
        border-radius: 4px;
    }

    .job-info h3 {
        margin: 0;
        font-size: 20px;
    }

    .job-info p {
        margin: 4px 0;
        font-size: 14px;
        color: #666;
    }

    .salary {
        color: #2e7d32;
        font-size: 14px;
        font-weight: bold;
    }

    .actions {
        margin-top: 16px;
        display: flex;
        justify-content: space-between;
    }

    .save-btn,
    .apply-btn {
        max-width: 100px;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .save-btn {
        background: #f0f0f0;
        color: #555;
    }

    .apply-btn {
        background: #1976d2;
        color: white;
    }

    .info-card {
        width: 100%;
        background: #fff;
        border: none;
        border-radius: 8px;
        padding: 16px;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
    }

    .info-card h3 {
        margin: 0;
        color: #1976d2;
        font-size: 20px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin: 16px 0;
    }

    .info-grid div strong {
        display: block;
        font-size: 14px;
        color: #333;
    }

    .info-grid div p {
        margin: 4px 0 0;
        font-size: 14px;
        color: #666;
    }

    .job-description {
        margin-top: 16px;
    }

    .job-description strong {
        display: block;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .job-description ul {
        list-style: disc;
        margin: 0;
        padding-left: 20px;
        color: #666;
        font-size: 14px;
    }

    .job-description ul li {
        margin-bottom: 4px;
    }

    /* Custom Pagination Styles */
    .pagination {
    justify-content: center;
    display: flex;
    gap: 8px;  /* Reduced gap between pagination items */
}

.pagination li {
    font-size: 14px;  /* Smaller font size for pagination text */
}

.pagination .page-link {
    padding: 4px 8px;  /* Smaller padding for page links */
    font-size: 14px;  /* Smaller font size */
    border-radius: 4px;  /* Rounded corners for pagination items */
}

.pagination .page-item.active .page-link {
    background-color: #1976d2; /* Active page color */
    border-color: #1976d2;
    color: white;
}

.pagination .page-link:hover {
    background-color: #e0e0e0;  /* Hover effect */
}

.pagination .page-item:first-child .page-link {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}

.pagination .page-item:last-child .page-link {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}


</style>

<div class="container my-4">
  <!-- Filter Section -->
  <form method="GET" action="{{ route('jobs.index') }}">
    <div class="filter" style="display: flex;">
      <!-- Job Type Filter -->
      <div class="col-md-3" style="max-width: 150px;">
        <select name="job_type" class="form-control">
          <option value="">Job Types</option>
          <option value="Full-time" {{ request('job_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
          <option value="Part-time" {{ request('job_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
          <option value="Contract" {{ request('job_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
        </select>
      </div>

      <!-- Remote/Onsite Filter -->
      <div class="col-md-3"style="max-width: 150px;">
        <select name="remote_or_onsite" class="form-control">
          <option value="">Remote or Onsite</option>
          <option value="Remote" {{ request('remote_or_onsite') == 'Remote' ? 'selected' : '' }}>Remote</option>
          <option value="Onsite" {{ request('remote_or_onsite') == 'Onsite' ? 'selected' : '' }}>Onsite</option>
        </select>
      </div>

      <!-- Career Level Filter -->
      <div class="col-md-3"style="max-width: 150px;">
        <select name="career_level" class="form-control">
          <option value="">Career Level</option>
          <option value="Junior" {{ request('career_level') == 'Junior' ? 'selected' : '' }}>Junior</option>
          <option value="Mid-level" {{ request('career_level') == 'Mid-level' ? 'selected' : '' }}>Mid-level</option>
          <option value="Senior" {{ request('career_level') == 'Senior' ? 'selected' : '' }}>Senior</option>
        </select>
      </div>

      <!-- Suitable for Filter -->
      {{-- <div class="col-md-3"style="max-width: 150px;">
        <select name="suitable_for" class="form-control">
          <option value="">Disability</option>
          <option value="Wheelchair" {{ request('suitable_for') == 'Wheelchair' ? 'selected' : '' }}>Wheelchair</option>
          <option value="Deaf" {{ request('suitable_for') == 'Deaf' ? 'selected' : '' }}>Deaf</option>
          <option value="Visual Impairment" {{ request('suitable_for') == 'Visual Impairment' ? 'selected' : '' }}>Visual Impairment</option>
          <option value="Hearing Impaired" {{ request('suitable_for') == 'Hearing Impaired' ? 'selected' : '' }}>Hearing Impaired</option>
        </select>
      </div> --}}

      <div class="col-md-3"style="max-width: 150px;">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="suitableForDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Suitable for
          </button>
          <ul class="dropdown-menu" aria-labelledby="suitableForDropdown" style="padding: 10px;">
            <li>
              <label class="form-check">
                <input type="checkbox" name="suitable_for[]" value="Wheelchair" class="form-check-input" {{ in_array('Wheelchair', (array)request('suitable_for', [])) ? 'checked' : '' }}> Wheelchair
              </label>
            </li>
            <li>
              <label class="form-check">
                <input type="checkbox" name="suitable_for[]" value="Deaf" class="form-check-input" {{ in_array('Deaf', (array)request('suitable_for', [])) ? 'checked' : '' }}> Deaf
              </label>
            </li>
            <li>
              <label class="form-check">
                <input type="checkbox" name="suitable_for[]" value="Visual Impairment" class="form-check-input" {{ in_array('Visual Impairment', (array)request('suitable_for', [])) ? 'checked' : '' }}> Visual Impairment
              </label>
            </li>
            <li>
              <label class="form-check">
                <input type="checkbox" name="suitable_for[]" value="Hearing Impaired" class="form-check-input" {{ in_array('Hearing Impaired', (array)request('suitable_for', [])) ? 'checked' : '' }}> Hearing Impaired
              </label>
            </li>
            <li>
              <label class="form-check">
                <input type="checkbox" name="suitable_for[]" value="Dyslexia" class="form-check-input" {{ in_array('Dyslexia', (array)request('suitable_for', [])) ? 'checked' : '' }}> Dyslexia
              </label>
            </li>
          </ul>
        </div>
      </div>

      <!-- Salary Range Filter -->
      <div class="col-md-3"style="max-width: 150px;">
        <input type="number" name="salary_min" class="form-control" placeholder="Min Salary" value="{{ request('salary_min') }}">
      </div>
      <div class="col-md-3"style="max-width: 150px;">
        <input type="number" name="salary_max" class="form-control" placeholder="Max Salary" value="{{ request('salary_max') }}">
      </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>
</div>

<div class="container my-4">
    <!-- Sidebar Section -->
    <div class="sidebar">
        <form method="GET" action="{{ route('jobs.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search companies..." value="{{ $search ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>

        @foreach ($jobs as $job)
            <div class="company clickable" data-url="{{ route('jobs.index', ['selected_job' => $job->JobID, 'page' => $jobs->currentPage()]) }}">
                <img src="{{ asset($job->company->CompanyImage ?? 'https://via.placeholder.com/100') }}" alt="{{ $job->company->CompanyName }} Logo" class="company-image mb-2">
                <h5>{{ $job->Role }}</h5>
                <p>{{ $job->JobType}} | {{ $job->CareerLevel }}</p>
                <p class="company-description">{{ Str::limit($job->JobDescription, 100, '...') }}</p>
            </div>
        @endforeach

        <!-- Pagination -->
<!-- Pagination -->
<div class="mt-4 d-flex justify-content-center">
  {{ $jobs->onEachSide(1)->appends(['selected_job' => request('selected_job'), 'search' => request('search')])->links('pagination::simple-bootstrap-4') }}
</div>

    </div>

    <!-- Details Section -->
    <div class="details">
        @if ($selectedJob)
            <div class="job-card">
                <div class="header">
                    <div class="company-logo">
                        <img src="{{ asset($selectedJob->company->CompanyImage) }}" alt="Company Logo">
                    </div>
                    <div class="job-info">
                        <h3>{{ $selectedJob->Role }}</h3>
                        <p>{{ $selectedJob->company->CompanyName }} &bull; {{ $selectedJob->company->CompanyCity }}</p>
                        <span class="salary">{{ $selectedJob->SalaryMin }} - {{ $selectedJob->SalaryMax }}</span>
                    </div>
                </div>
                <div class="actions">
                    <button class="save-btn">Save</button>
                    <button class="apply-btn">Apply</button>
                </div>
            </div>

            <!-- Additional Job Info -->
            <div class="info-card">
                <h3>Information</h3>
                <div class="info-grid">
                    <div>
                        <strong>Job Type</strong>
                        <p>{{ $selectedJob->JobType }}</p>
                    </div>
                    <div>
                        <strong>Suitable For</strong>
                        <p>{{ $selectedJob->SuitableFor }}</p>
                    </div>
                    <div>
                        <strong>Remote/On-site</strong>
                        <p>{{ $selectedJob->RemoteOrOnsite }}</p>
                    </div>
                </div>
                <div class="job-description">
                    <strong>Job Description</strong>
                    <p>{{ $selectedJob->JobDescription }}</p>
                </div>
            </div>

            <!-- Job Requirements -->
            <div class="info-card">
                <h3>Requirements</h3>
                <div class="info-grid">
                    <div>
                        <ul>
                            <li><p>{{ $selectedJob->CareerLevel }}</p></li>
                            <li><p>{{ $selectedJob->RequiredSkills }}</p></li>
                            <li><p>{{ $selectedJob->Requirements }}</p></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Job Location -->
            <div class="info-card">
                <h3>Location</h3>
                <div class="info-grid">
                    <div>
                        <strong>City</strong>
                        <p>{{ $selectedJob->company->CompanyCity }}</p>
                    </div>
                    <div>
                        <strong>Address</strong>
                        <p>{{ $selectedJob->company->Address }}</p>
                    </div>
                </div>
            </div>
        @else
            <p>Select a job to view its details.</p>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const companyContainers = document.querySelectorAll('.company.clickable');
        companyContainers.forEach(container => {
            container.addEventListener('click', function () {
                const searchParams = new URLSearchParams(window.location.search);
                const search = searchParams.get('search') || '';
                const page = searchParams.get('page') || '';
                const url = this.dataset.url + `&search=${search}&page=${page}`;
                if (url) {
                    window.location.href = url;
                }
            });
        });
    });
</script>

@endsection
