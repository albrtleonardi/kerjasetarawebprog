<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $company->CompanyName }} - Company Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">{{ $company->CompanyName }}</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                @if ($company->CompanyImage)
                    <img src="{{ asset($company->CompanyImage) }}" alt="{{ $company->CompanyName }} Logo" class="img-fluid rounded mb-3" style="max-height: 150px;">
                @else
                    <p class="text-muted">No Image Available</p>
                @endif

                <p><strong>Address:</strong> {{ $company->Address }}</p>
                <p><strong>Industry:</strong> {{ $company->Industry }}</p>
                <p><strong>Employee Count:</strong> {{ $company->EmployeeCount }}</p>
                <p><strong>Work Time:</strong> {{ $company->WorkTime }}</p>
                <p><strong>Dress Code:</strong> {{ $company->DressCode }}</p>
                <p><strong>Company Description:</strong> {{ $company->CompanyDescription }}</p>
                <p><strong>Company Website:</strong> <a href="{{ $company->CompanyLink }}" target="_blank">{{ $company->CompanyLink }}</a></p>
                <p><strong>City:</strong> {{ $company->CompanyCity }}</p>

                <h3 class="mt-4">Available Jobs at {{ $company->CompanyName }}</h3>
                <ul>
                    @forelse ($company->jobs as $job)
                        <li>{{ $job->Role }} - <a href="{{ route('jobs.show', $job->JobID) }}">View Job</a></li>
                    @empty
                        <p>No jobs available at this company.</p>
                    @endforelse
                </ul>

                <a href="{{ route('companies.index') }}" class="btn btn-secondary mt-4">Back to Listings</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
