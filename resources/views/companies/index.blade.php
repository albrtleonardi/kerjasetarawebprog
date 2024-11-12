<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Listings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container my-4">
        <h1 class="text-center mb-4">Company Listings</h1>

        <form method="GET" action="{{ route('companies.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search companies..." value="{{ $search ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>

        <div class="row">
            @forelse ($companies as $company)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            @if ($company->CompanyImage)
                                <img src="{{ asset($company->CompanyImage) }}" alt="{{ $company->CompanyName }} Logo" class="img-fluid rounded mb-3" style="max-height: 100px;">
                            @else
                                <p class="text-muted">No Image Available</p>
                            @endif

                            <h5 class="company-name">{{ $company->CompanyName }}</h5>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No companies found.</p>
            @endforelse
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
