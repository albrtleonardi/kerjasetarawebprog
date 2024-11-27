@extends('layouts.without_sidebar')

@section('content')

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    /* Banner Section with Background Image */
    #jobs {
        position: relative;
        background-image: url('https://mms.businesswire.com/media/20240724996718/en/2194539/4/Albertsons_Companies_Earns_Top_Score_on_Disability_Equality_Index.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        color: white;
        text-align: center;
        overflow: hidden;
    }

    /* Overlay to darken the background image for better text visibility */
    #jobs .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7); /* Darker overlay */
        z-index: 1;
    }

    /* Heading and description */
    #jobs h1 {
        font-size: 3rem;
        font-weight: bold;
        z-index: 2;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Shadow for better readability */
    }

    #jobs p {
        font-size: 1.25rem;
        z-index: 2;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Shadow for better readability */
        max-width: 50%; /* Set the description width to 50% */
        margin: 0 auto; /* Center the description */
    }

    /* Button */
    #jobs a.btn {
        z-index: 2;
        font-size: 1.2rem;
        padding: 15px 30px;
    }

    /* Glassmorphism Effect */
    .glass-card {
        background: rgba(255, 255, 255, 0.1); /* Semi-transparent white */
        backdrop-filter: blur(10px); /* Blur effect */
        border-radius: 10px; /* Rounded corners */
        padding: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow */
        color: #fff; /* White text */
        transition: transform 0.3s ease;
    }

    .glass-card:hover {
        transform: scale(1.05); /* Slight zoom effect on hover */
    }

    /* Why Join Section */
    #why-join h2 {
        font-weight: bold;
        margin-bottom: 40px;
        color: #003366; /* Dark blue color */
    }

    #why-join .reason-card {
        margin-bottom: 30px;
    }

    #why-join .reason-card h5 {
        color: #007bff; /* Blue color for the title */
    }

    #why-join .reason-card p {
        color: #0056b3; /* Slightly darker blue for the description text */
    }

    #why-join .reason-card i {
        color: #007bff; /* Blue color for icons */
    }

    /* Glassmorphism effect for the list container */
    .glass-list-container {
        background: rgba(255, 255, 255, 0.1); /* Semi-transparent white */
        backdrop-filter: blur(12px); /* Blur effect */
        border-radius: 20px; /* Rounded corners */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow */
        width: 85%; /* Changed to 85% */
        margin: 0 auto;
        padding: 40px;
    }

    /* Glassmorphism effect for each list item */
    .glass-list-item {
        background: rgba(255, 255, 255, 0.2); /* Slightly opaque background */
        backdrop-filter: blur(8px); /* Blur effect */
        border-radius: 10px; /* Rounded corners for list items */
        color: #fff; /* White text color */
        transition: transform 0.3s ease;
        padding: 20px;
        margin-bottom: 20px;
    }

    /* Hover effect on each list item */
    .glass-list-item:hover {
        transform: scale(1.05); /* Slight zoom effect on hover */
    }

    .glass-list-item h5 {
        color: #007bff; /* Blue color for headings */
    }

    /* Change description color to dark blue */
    .glass-list-item p {
        color: #003366; /* Dark blue for descriptions */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .glass-list-container {
            width: 90%; /* Make the list container wider on smaller screens */
        }

        .glass-list-item {
            padding: 20px; /* Adjust padding for smaller screens */
        }
    }
</style>

<!-- Banner -->
<header id="jobs" class="banner text-center d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <div class="overlay"></div>
    <h1 class="display-4 font-weight-bold">Selamat Datang di KerjaSetara</h1>
    <p class="lead">Kami memberikan kesempatan pekerjaan untuk semua, termasuk penyandang disabilitas, di satu platform yang inklusif.</p>
    <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-3">Get Started</a>
</header>

<!-- Why Join Section -->
<section id="why-join" class="container my-5 text-center">
    <h2 class="dark-heading">Kenapa Harus Memilih KerjaSetara?</h2>
    <div class="row">
        <!-- Reason 1 -->
        <div class="col-md-3">
            <div class="reason-card glass-card text-center p-4">
                <i class="fas fa-users mb-3" style="font-size: 3rem;"></i> <!-- Icon -->
                <h5 class="font-weight-bold">Pekerjaan untuk Semua</h5>
                <p>KerjaSetara memberikan kesempatan yang setara untuk semua orang, termasuk penyandang disabilitas, tanpa diskriminasi.</p>
            </div>
        </div>

        <!-- Reason 2 -->
        <div class="col-md-3">
            <div class="reason-card glass-card text-center p-4">
                <i class="fas fa-handshake mb-3" style="font-size: 3rem;"></i> <!-- Icon -->
                <h5 class="font-weight-bold">Kemitraan dengan Perusahaan Terbaik</h5>
                <p>Dengan kemitraan kami bersama berbagai perusahaan terkemuka, kami membuka peluang kerja terbaik bagi pengguna.</p>
            </div>
        </div>

        <!-- Reason 3 -->
        <div class="col-md-3">
            <div class="reason-card glass-card text-center p-4">
                <i class="fas fa-briefcase mb-3" style="font-size: 3rem;"></i> <!-- Icon -->
                <h5 class="font-weight-bold">Pekerjaan yang Sesuai dengan Keahlian</h5>
                <p>Temukan pekerjaan yang sesuai dengan keahlian dan minat Anda dengan fitur pencarian yang canggih.</p>
            </div>
        </div>

        <!-- Reason 4 -->
        <div class="col-md-3">
            <div class="reason-card glass-card text-center p-4">
                <i class="fas fa-globe mb-3" style="font-size: 3rem;"></i> <!-- Icon -->
                <h5 class="font-weight-bold">Pekerjaan di Seluruh Dunia</h5>
                <p>Kami menawarkan peluang pekerjaan dari berbagai perusahaan yang tersebar di seluruh dunia, membuka peluang global.</p>
            </div>
        </div>
    </div>
</section>

<!-- How to Use Section -->
<section id="how-to-use" class="container my-5 text-center">
    <h2 class="font-weight-bold mb-4">Cara Menggunakan KerjaSetara</h2>
    <div class="glass-list-container">
        <ul class="list-unstyled">
            <li class="glass-list-item">
                <h5 class="font-weight-bold">Step 1: Daftar Akun</h5>
                <p>Bergabunglah dengan KerjaSetara dengan mendaftar melalui email atau akun media sosial. Proses pendaftaran cepat dan mudah.</p>
            </li>
            <li class="glass-list-item">
                <h5 class="font-weight-bold">Step 2: Lengkapi Profil</h5>
                <p>Isi data profil Anda dengan informasi yang relevan, termasuk keterampilan dan pengalaman kerja.</p>
            </li>
            <li class="glass-list-item">
                <h5 class="font-weight-bold">Step 3: Cari Pekerjaan</h5>
                <p>Gunakan fitur pencarian untuk menemukan pekerjaan yang sesuai dengan keahlian dan minat Anda.</p>
            </li>
            <li class="glass-list-item">
                <h5 class="font-weight-bold">Step 4: Lamar Pekerjaan</h5>
                <p>Kirimkan lamaran Anda untuk pekerjaan yang Anda pilih, dan tunggu notifikasi dari perusahaan terkait.</p>
            </li>
        </ul>
    </div>
</section>

<section id="cta" class="text-center my-5">
    <h2 class="font-weight-bold">Bergabunglah dengan Kami!</h2>
    <p>Jangan lewatkan kesempatan untuk menemukan karir terbaik Anda.</p>
    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg mr-2">Login</a>
    <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Register</a>
</section>

@endsection
