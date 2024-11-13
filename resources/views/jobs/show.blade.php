<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->Role }} - Job Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">{{ $job->Role }}</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                @if ($job->company && $job->company->CompanyImage)
                    <img src="{{ asset($job->company->CompanyImage) }}" alt="{{ $job->company->CompanyName }} Logo" class="img-fluid rounded mb-3" style="max-height: 150px;">
                @else
                    <p class="text-muted">No Image Available</p>
                @endif

                <h2 class="company-name">{{ $job->company->CompanyName ?? 'Unknown Company' }}</h2>
                <p><strong>Type:</strong> {{ $job->JobType }}</p>
                <p><strong>Location:</strong> {{ $job->RemoteOrOnsite }}</p>
                <p><strong>Career Level:</strong> {{ $job->CareerLevel }}</p>
                <p><strong>Suitable For:</strong> {{ $job->SuitableFor }}</p>
                <p><strong>Salary:</strong> {{ $job->SalaryMin }} - {{ $job->SalaryMax }}</p>
                <p><strong>Required Skills:</strong> {{ $job->RequiredSkills }}</p>
                <p><strong>Description:</strong> {{ $job->JobDescription }}</p>

                <a href="{{ route('jobs.index') }}" class="btn btn-secondary mt-4">Back to Listings</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
