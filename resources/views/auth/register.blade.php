<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1); /* Transparent background */
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
            backdrop-filter: blur(10px); /* Apply background blur */
            border: 1px solid rgba(255, 255, 255, 0.3); /* Light border */
        }

        /* Make the Register text bigger and align it to the left */
        .glass-card h3 {
            font-size: 32px; /* Increase font size */
            font-weight: 600;
            text-align: left; /* Align text to the left */
            color: #003366; /* Dark blue color */
            margin-bottom: 30px;
        }

        .form-group label {
            font-weight: 600;
            color: #003366; /* Dark blue color */
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-muted {
            color: #003366; /* Dark blue color for muted text */
        }

        /* Style error messages */
        .text-danger {
            font-size: 0.875rem;
            margin-top: 5px;
            color: #b33030; /* Red color for errors */
        }

        /* Add some margin between the links and the form */
        .text-center.mt-4 {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-11">
                <div class="card glass-card">
                    <div class="card-body">
                        <h3>Register</h3>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <!-- Username Field -->
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="UserName" id="username" class="form-control" placeholder="Enter your username" required>
                            </div>

                            <!-- Email Field -->
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="Email" id="email" class="form-control" placeholder="Enter your email" required>
                            </div>

                            <!-- Password Field -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="Password" id="password" class="form-control" placeholder="Enter your password" required>
                            </div>

                            <!-- Password Confirmation Field -->
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="Password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm your password" required>
                            </div>

                            <!-- Register Button -->
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
                    </div>
                    <div class="text-center mt-4">
                    <p class="text-muted">Already have an account? <a href="{{ route('login') }}" class="font-weight-bold">Login</a></p>
                </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
