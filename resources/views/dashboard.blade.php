<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container my-4">
    <h1>Welcome, {{ $user->UserName }}</h1>

    <div class="mt-4 mb-4">
        <a href="{{ route('profile.show') }}" class="btn btn-info">Show Profile</a>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <h2>Recommended Jobs for You</h2>
    @if($recommendedJobs->isEmpty())
        <p>No job recommendations available at this time.</p>
    @else
        <div class="row">
            @foreach($recommendedJobs as $job)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="job-title">{{ $job->Role }}</h5>
                            <p><strong>Company:</strong> {{ $job->company->CompanyName ?? 'Unknown' }}</p>
                            <p><strong>Suitable For:</strong> {{ $job->SuitableFor }}</p>
                            <p><strong>Required Skills:</strong> {{ $job->RequiredSkills }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

</body>
</html>
