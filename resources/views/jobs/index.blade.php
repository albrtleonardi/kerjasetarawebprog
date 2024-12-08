<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container my-4">
        <h1 class="text-center mb-4">Job Listings</h1>

        <form method="GET" action="{{ route('jobs.index') }}" class="mb-5">
            <div class="row g-3 align-items-end">
                <!-- Search Input -->
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by role, company..." value="{{ request('search') }}">
                </div>

                <!-- Job Type Dropdown -->
                <div class="col-md-2">
                    <select name="job_type" class="form-control">
                        <option value="">Select Job Type</option>
                        <option value="Full-Time" {{ request('job_type') == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                        <option value="Part-Time" {{ request('job_type') == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                    </select>
                </div>

                <!-- Remote or Onsite Dropdown -->
                <div class="col-md-2">
                    <select name="remote_or_onsite" class="form-control">
                        <option value="">Remote or On-Site</option>
                        <option value="Remote" {{ request('remote_or_onsite') == 'Remote' ? 'selected' : '' }}>Remote</option>
                        <option value="On-Site" {{ request('remote_or_onsite') == 'On-Site' ? 'selected' : '' }}>On-Site</option>
                    </select>
                </div>

                <!-- Career Level Dropdown -->
                <div class="col-md-2">
                    <select name="career_level" class="form-control">
                        <option value="">Career Level</option>
                        <option value="Entry-Level" {{ request('career_level') == 'Entry-Level' ? 'selected' : '' }}>Entry-Level</option>
                        <option value="Junior" {{ request('career_level') == 'Junior' ? 'selected' : '' }}>Junior</option>
                        <option value="Mid-Level" {{ request('career_level') == 'Mid-Level' ? 'selected' : '' }}>Mid-Level</option>
                        <option value="Senior" {{ request('career_level') == 'Senior' ? 'selected' : '' }}>Senior</option>
                    </select>
                </div>

                <!-- Suitable For Checkboxes -->
                <div class="col-md-12">
                    <label>Suitable For:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="suitable_for[]" value="Wheelchair" {{ in_array('Wheelchair', request('suitable_for', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">Wheelchair</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="suitable_for[]" value="Deaf" {{ in_array('Deaf', request('suitable_for', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">Deaf</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="suitable_for[]" value="Visual Impairment" {{ in_array('Visual Impairment', request('suitable_for', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">Visual Impairment</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="suitable_for[]" value="Dyslexia" {{ in_array('Dyslexia', request('suitable_for', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">Dyslexia</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="suitable_for[]" value="Hearing Impaired" {{ in_array('Hearing Impaired', request('suitable_for', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">Hearing Impaired</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="suitable_for[]" value="Low Vision" {{ in_array('Low Vision', request('suitable_for', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">Low Vision</label>
                    </div>
                </div>

                <!-- Salary Range Inputs -->
                <div class="col-md-2">
                    <input type="number" name="salary_min" class="form-control" placeholder="Min Salary" value="{{ request('salary_min') }}">
                </div>

                <div class="col-md-2">
                    <input type="number" name="salary_max" class="form-control" placeholder="Max Salary" value="{{ request('salary_max') }}">
                </div>

                <!-- Search Button -->
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach ($jobs as $job)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            @if ($job->company && $job->company->CompanyImage)
                                <img src="{{ asset($job->company->CompanyImage) }}" alt="{{ $job->company->CompanyName }} Logo" class="img-fluid rounded mb-3" style="max-height: 100px;">
                            @else
                                <p class="text-muted">No Image Available</p>
                            @endif

                            <h5 class="job-title">{{ $job->Role }}</h5>
                            <p class="company-name text-muted">{{ $job->company->CompanyName ?? 'Unknown Company' }}</p>
                            <p><strong>Type:</strong> {{ $job->JobType }}</p>
                            <p><strong>Location:</strong> {{ $job->RemoteOrOnsite }}</p>
                            <p><strong>Career Level:</strong> {{ $job->CareerLevel }}</p>
                            <p><strong>Suitable For:</strong> {{ $job->SuitableFor }}</p>
                            <p><strong>Salary:</strong> {{ $job->SalaryMin }} - {{ $job->SalaryMax }}</p>
                            <a href="{{ route('jobs.show', $job->JobID) }}" class="btn btn-primary mt-3">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
