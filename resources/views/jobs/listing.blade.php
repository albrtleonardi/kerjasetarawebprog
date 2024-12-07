@extends('layouts.with_sidebar')

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
        border: none;
        border-radius: 8px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        display: flex;
        flex-direction: column;
        gap: 10px;
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



</style>

{{-- <div class="container my-4" style="height: 50px;">
  <div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Career Level
    </a>
  
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Junior</a></li>
      <li><a class="dropdown-item" href="#">Mid-level</a></li>
      <li><a class="dropdown-item" href="#">Senior</a></li>
    </ul>
  </div>

  <div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Job Type
    </a>
  
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Full-time</a></li>
      <li><a class="dropdown-item" href="#">Part-time</a></li>
      <li><a class="dropdown-item" href="#">Contract</a></li>
    </ul>
  </div>

  <div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Remote/Onsite
    </a>
  
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Remote</a></li>
      <li><a class="dropdown-item" href="#">Onsite</a></li>
    </ul>
  </div>

  <div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Disability Suitability
    </a>
  
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Wheelchair</a></li>
      <li><a class="dropdown-item" href="#">Deaf</a></li>
      <li><a class="dropdown-item" href="#">Visual Impairment</a></li>
      <li><a class="dropdown-item" href="#">Hearing Impaired</a></li>
    </ul>
  </div>
</div> --}}

<div class="container my-4">
  <!-- Filter Section -->
  <form method="GET" action="{{ route('jobs.index') }}">
    <div class="filter" style="display: flex;">
      <!-- Job Type Filter -->
      <div class="col-md-3">
        <select name="job_type" class="form-control">
          <option value="">Job Types</option>
          <option value="Full-time" {{ request('job_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
          <option value="Part-time" {{ request('job_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
          <option value="Contract" {{ request('job_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
        </select>
      </div>

      <!-- Remote/Onsite Filter -->
      <div class="col-md-3">
        <select name="remote_or_onsite" class="form-control">
          <option value="">Remote or Onsite</option>
          <option value="Remote" {{ request('remote_or_onsite') == 'Remote' ? 'selected' : '' }}>Remote</option>
          <option value="Onsite" {{ request('remote_or_onsite') == 'Onsite' ? 'selected' : '' }}>Onsite</option>
        </select>
      </div>

      <!-- Career Level Filter -->
      <div class="col-md-3">
        <select name="career_level" class="form-control">
          <option value="">Career Level</option>
          <option value="Junior" {{ request('career_level') == 'Junior' ? 'selected' : '' }}>Junior</option>
          <option value="Mid-level" {{ request('career_level') == 'Mid-level' ? 'selected' : '' }}>Mid-level</option>
          <option value="Senior" {{ request('career_level') == 'Senior' ? 'selected' : '' }}>Senior</option>
        </select>
      </div>

      <!-- Suitable for Filter -->
      <div class="col-md-3">
        <select name="suitable_for" class="form-control">
          <option value="">Disability</option>
          <option value="Wheelchair" {{ request('suitable_for') == 'Wheelchair' ? 'selected' : '' }}>Wheelchair</option>
          <option value="Deaf" {{ request('suitable_for') == 'Deaf' ? 'selected' : '' }}>Deaf</option>
          <option value="Visual Impairment" {{ request('suitable_for') == 'Visual Impairment' ? 'selected' : '' }}>Visual Impairment</option>
          <option value="Hearing Impaired" {{ request('suitable_for') == 'Hearing Impaired' ? 'selected' : '' }}>Hearing Impaired</option>
        </select>
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
                <input type="text" name="search" class="form-control" placeholder="Search companies..."
                    value="{{ $search ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>

        @foreach ($jobs as $job)
            <div class="company clickable"
                data-url="{{ route('jobs.index', ['selected_job' => $job->JobID, 'page' => $jobs->currentPage()]) }}">

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
          {{ $jobs->onEachSide(1)->appends(['selected_job' => request('selected_job'), 'search' => request('search')])->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- Details Section -->
    <div class="details">
        @if ($selectedJob)
        <div class="job-card">
          <div class="header">
            <div class="company-logo">
              <img src="{{ asset($selectedJob->company->CompanyImage) }}" alt="Company Logo" />
            </div>
            <div class="job-info">
              <h3>{{ $selectedJob->Role }}</h3>
              <p>{{ $selectedJob->company->CompanyName }} &bull; {{ $selectedJob->company->CompanyCity }}</p>
              <span class="salary">{{ $selectedJob->SalaryMin }} - {{ $selectedJob->SalaryMax }}</span>
            </div>
          </div>
          <div class="actions">
            <button class="save-btn">Save</i></button>
            <button class="apply-btn">Apply</button>
          </div>
        </div>

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