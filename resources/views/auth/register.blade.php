<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #003366;
            --background-color: #f4f6f9;
            --glass-background: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.3);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0e4eb 0%, #f4f6f9 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(0, 123, 255, 0.1) 0%, transparent 70%);
            z-index: -1;
        }

        .glass-card {
            background: var(--glass-background);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.05), 
                0 5px 15px rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            transition: all 0.3s ease;
            max-width: 500px;
            width: 100%;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.08), 
                0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .glass-card h3 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group label {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 8px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.4);
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.15);
            border-color: var(--primary-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .text-muted {
            color: var(--secondary-color);
            opacity: 0.7;
        }

        .text-danger {
            font-size: 0.875rem;
            margin-top: 5px;
            color: #dc3545;
        }

        @media (max-width: 576px) {
            .glass-card {
                padding: 30px 25px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-11">
                <div class="glass-card">
                    <div class="card-body">
                        <h3>Register</h3>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fas fa-user text-muted"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="UserName" id="username" class="form-control border-left-0" placeholder="Enter your username" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fas fa-envelope text-muted"></i>
                                        </span>
                                    </div>
                                    <input type="email" name="Email" id="email" class="form-control border-left-0" placeholder="Enter your email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="Password" id="password" class="form-control border-left-0" placeholder="Enter your password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="Password_confirmation" id="password_confirmation" class="form-control border-left-0" placeholder="Confirm your password" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-4">Register</button>
                        </form>
                    </div>
                    <div class="text-center mt-4">
                        <p class="text-muted">Already have an account? <a href="{{ route('login') }}" class="font-weight-bold">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>