<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KerjaSetara')</title>
    <!-- Bootstrap 4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome (for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Additional custom styling -->
    <style>
        body {
            padding-top: 56px; /* Space for fixed navbar */
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure body takes at least full viewport height */
        }

        /* Profile image in the navbar */
        .profile-img {
            border-radius: 50%;
            width: 30px;
            height: 30px;
            margin-right: 8px;
        }

        /* Custom dropdown styling */
        .dropdown-menu {
            width: 200px; /* Make the dropdown menu wider for a cleaner look */
        }

        .dropdown-item {
            padding: 10px 15px;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        /* Optional: Customize the dropdown toggle button */
        .dropdown-toggle::after {
            content: none; /* Remove the default caret */
        }

        /* Footer styling */
        footer {
            width: 100%; /* Ensure footer spans full width */
            background-color: #f8f9fa;
            position: relative;
            bottom: 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
        }

        .footer-content a {
            text-decoration: none;
            color: #6c757d;
        }

        .footer-content a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>

    <!-- Navbar (Fixed at top) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="{{ url('/') }}">KerjaSetara</a>
            <ul class="navbar-nav d-flex flex-row ml-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/jobs">Lowongan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/companies">Perusahaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>

                <!-- Profile Section with Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://via.placeholder.com/40" alt="Profile Picture" class="profile-img">
                        Hello, {{ $user->UserName }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/profile/edit">
                            <i class="fas fa-user-circle mr-2"></i> Profile
                        </a>
                        <!-- Logout Form -->
                        <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-link p-0 m-0 text-decoration-none">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content Section -->
    <div class="container mt-4 flex-fill p-3 ">
        @yield('content')
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="footer-content">
            <div>
                <p class="mb-0">&copy; {{ date('Y') }} KerjaSetara. All rights reserved.</p>
            </div>
            <div>
                <a href="/privacy" class="mr-3">Privacy Policy</a>
                <a href="/terms">Terms of Service</a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 4 JS, Popper.js and Full jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Use full version of jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
