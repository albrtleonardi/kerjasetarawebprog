<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Listings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .company-card {
            transition: transform 0.2s ease-in-out;
        }
        .company-card:hover {
            transform: translateY(-5px);
        }
        .company-name {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .no-companies-msg {
            font-size: 1.2rem;
            color: #555;
        }
        .collapse-content {
            padding: 10px;
            background-color: #f9f9f9;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="container my-4">
    <h1 class="text-center mb-4">Company Listings</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('companies.index') }}" class="mb-4">
        <div class="input-group input-group-lg">
            <input type="text" name="search" class="form-control" placeholder="Search companies..." value="{{ $search ?? '' }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <!-- Company Listings -->
    <div class="row">
        @forelse ($companies as $company)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 company-card shadow-sm">
                    <div class="card-body text-center">
                        <!-- Company Logo -->
                        @if ($company->CompanyImage)
                            <img src="{{ asset($company->CompanyImage) }}" alt="{{ $company->CompanyName }} Logo" class="img-fluid rounded mb-3" style="max-height: 120px;">
                        @else
                            <p class="text-muted">No Image Available</p>
                        @endif

                        <!-- Company Name -->
                        <h5 class="company-name">{{ $company->CompanyName }}</h5>

                        <!-- Toggle Button for Dropdown -->
                        <button class="btn btn-secondary mt-2" data-toggle="collapse" data-target="#company-{{ $company->CompanyID }}" aria-expanded="false" aria-controls="company-{{ $company->CompanyID }}">
                            Show Details
                        </button>

                        <!-- Collapsible Content -->
                        <div class="collapse" id="company-{{ $company->CompanyID }}">
                            <div class="collapse-content">
                                <p><strong>Industry:</strong> {{ $company->Industry }}</p>
                                <p><strong>Location:</strong> {{ $company->CompanyCity }}</p>
                                <p><strong>Description:</strong> {{ Str::limit($company->CompanyDescription, 80, '...') }}</p>
                            </div>
                        </div>

                        <!-- View Details Button -->
                        <a href="{{ route('companies.show', $company->CompanyID) }}" class="btn btn-primary mt-3">View Full Details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center no-companies-msg">No companies found matching your search.</p>
            </div>
        @endforelse
    </div>
</div>

<!-- JS Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
