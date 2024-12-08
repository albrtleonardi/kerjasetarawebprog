@extends('layouts.usernavbar')

@section('content')

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: white;
    }

    .search-bar {
    height: 15vh;
    background-color: #007bff; /* Blue background */
    padding: 20px;
    display: flex;
    align-items: flex-end;
    color: white;
}

    .search-bar .prompt {
        margin-left: 10vw;
      margin-right: 20px;
      margin-bottom: 0.5vh;
      font-size: 1.25rem;
    }

    .search-bar .search-container {
        margin-left: 10vw;
        margin-right: 13vw;
      display: flex;
      flex-grow: 1;
      background-color: white;
      border-radius: 5px;
      overflow: hidden;
    }

    .search-container input {
      border: none;
      padding: 10px;
      font-size: 14px;
      outline: none;
    }

    .search-container .search-input {
      flex: 5.5;
    }

    .search-container .location-input {
      flex: 2.5;
      border-left: 1px solid #ddd;
    }

    .search-container .search-btn {
        flex: 1;
      background-color: #0056b3;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 14px;
    }

    .search-container .search-btn:hover {
      background-color: #003d80;
    }

    .carousel {
    display: block;
    margin: 0 auto; /* Centers horizontally */
    width: 80%;
    max-height: 20vw;
    max-width: 70vw;
    overflow: hidden;
    position: relative;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}


    .carousel-track {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .carousel-slide {
      min-width: 100%;
      box-sizing: border-box;
    }

    .carousel-slide img {
      width: 100%;
      display: block;
      border-radius: 10px;
    }

    .carousel-controls {
      position: absolute;
      top: 50%;
      width: 100%;
      display: flex;
      justify-content: space-between;
      transform: translateY(-50%);
    }

    .carousel-button {
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 50%;
    }

    .carousel-button:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }


    .job-roles {
  display: flex;
  gap: 20px;
  justify-content: center;
  flex-wrap: wrap;
  padding: 40px 20px;
}

.job-role {
  position: relative;
  width: 300px;
  height: 200px;
  border-radius: 15px;
  background-size: cover;
  background-position: center;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s;
}

.job-role:hover {
  transform: scale(1.05);
}

.job-role .overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom, rgba(0, 123, 255, 0) 50%, rgba(0, 123, 255, 0.6) 100%);
  z-index: 1; /* Ensure overlay is above the image */
  pointer-events: none; /* Allows hover events to pass through */
}

.job-role:hover .overlay {
  opacity: 0; /* Overlay disappears on hover */
  transition: opacity 0.3s;
}

.job-role .content {
  position: relative;
  z-index: 2; /* Ensures the text is above the overlay */
  color: white;
  padding: 0 10px; /* Prevent text from touching the edges */
}

.job-role h3 {
  margin: 0;
  font-size: 24px;
  font-weight: bold;
}

.job-role p {
  margin: 5px 0 0;
  font-size: 16px;
}

.suitable-section {
    margin-left: 10vw;
    margin-right: 10vw;
  display: flex;
  gap: 20px;
  justify-content: center;
  flex-wrap: wrap;
  padding: 40px 20px;
}

.suitable-item {
  position: relative;
  width: 300px;
  height: 200px;
  border-radius: 15px;
  background-color: white;
  border: 2px solid #ccc; /* Gray border */
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
}

.suitable-item:hover {
  transform: scale(1.05);
}

.suitable-item .content {
  color: black; /* Black text */
  padding: 0 10px; /* Prevent text from touching the edges */
}

.suitable-item h3 {
  margin: 0;
  font-size: 24px;
  font-weight: bold;
}

.suitable-item p {
  margin: 5px 0 0;
  font-size: 16px;
}

.section-title {
    margin-top: 5vh;
    margin-left: 15vw;
}

.section-title h2 {
  font-size: 32px; /* Increase font size for better visibility */
  font-weight: bold;
  color: #333; /* Darker text for better contrast */
}

.section-title p {
  font-size: 18px; /* Slightly larger font for the description */
  color: #777; /* Lighter gray for the description text */
  line-height: 1.6; /* Better line spacing for readability */
}

.job-highlight-section {
    margin-left: 10vw;
    margin-right: 10vw;
  display: flex;
  gap: 20px;
}

.carousel {
  flex: 1;
}

.carousel-item {
  position: relative;
  border: 2px solid #f0f0f0;
  border-radius: 10px;
  overflow: hidden;
  text-align: center;
}

.promo-image img {
  width: 100%;
  border-bottom: 2px solid #f0f0f0;
}

.promo-content {
  padding: 20px;
}

.promo-content h2 {
  font-size: 24px;
  color: #fff;
}

.promo-content h3 {
  font-size: 18px;
  color: #000;
}

.apply-now {
  padding: 10px 20px;
  background-color: #ff9800;
  border: none;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  margin-top: 10px;
}

.job-listings {
  display: flex;
  flex-wrap: wrap;
  gap: 20px; /* Space between cards */
  justify-content: center; /* Center align the cards */
}

.job-card {
  width: 40vh;
  border: 1px solid #f0f0f0;
  border-radius: 8px;
  padding: 15px;
  background: #fff;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Add subtle shadow */
  transition: transform 0.3s ease; /* Hover animation */
}

.job-card:hover {
  transform: scale(1.05);
}


.job-card h4 {
  font-size: 16px;
  margin-bottom: 5px;
}

.salary {
  color: green;
  font-weight: bold;
}

.match-score {
  background: #ff4d4f;
  color: #fff;
  padding: 2px 5px;
  border-radius: 3px;
  font-size: 12px;
}

.date {
  font-size: 12px;
  color: #999;
}

.job-listings {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* 2 columns */
    gap: 20px; /* Space between items */
    justify-items: center; /* Centers each item horizontally */
    align-items: center; /* Centers each item vertically */
}

.job-listings-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
}

.yeet{
  margin-top: 3vw;
}

.logo-container {
    width: 60px; /* Ukuran tetap untuk semua logo */
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f8f9fa; /* Latar belakang opsional jika logo transparan */
    border-radius: 8px; /* Opsional, jika ingin rounded */
    overflow: hidden; /* Untuk memotong bagian logo yang melebihi batas */
}

.logo-company {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain; /* Menjaga aspek rasio logo */
}

/* Container grid */
.grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 kolom */
    grid-gap: 20px; /* Jarak antar item */
    margin-top: 20px;
    padding: 20px;
}

/* Glassmorphism effect */
.glass-card {
    background: rgba(255, 255, 255, 0.2); /* Transparansi latar belakang */
    backdrop-filter: blur(10px); /* Efek blur */
    border: 1px solid rgba(255, 255, 255, 0.2); /* Border transparan */
    border-radius: 15px; /* Sudut melengkung */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan */
    padding: 20px; /* Spasi dalam */
    text-align: center; /* Rata tengah teks */
    transition: transform 0.3s, box-shadow 0.3s; /* Animasi hover */
}

/* Efek hover */
.glass-card:hover {
    transform: scale(1.05); /* Sedikit membesar saat di-hover */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Bayangan lebih besar */
}

/* Konten dalam kotak */
.glass-card .content h3 {
    font-size: 1.2rem;
    color: black; /* Teks menjadi hitam */
}

.glass-card .content p {
    font-size: 0.9rem;
    color: black; /* Teks deskripsi juga hitam */
}

/* Responsive untuk layar kecil */
@media screen and (max-width: 768px) {
    .grid-container {
        grid-template-columns: repeat(2, 1fr); /* 2 kolom untuk layar kecil */
    }
}

@media screen and (max-width: 480px) {
    .grid-container {
        grid-template-columns: 1fr; /* 1 kolom untuk layar sangat kecil */
    }
}

.section-title h2 {
    font-size: 1.5rem;
    font-weight: bold;
}

.section-title p {
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
    color: #6c757d; /* Warna teks deskripsi */
}

/* Remove spacing between columns */
.row.g-0 {
    margin: 0;
}

/* Ensure the banner image stretches fully */
.job-banner img {
    width: 100%;
    height: auto;
    display: block;
}

/* Section Title Styling */
.section-title {
    margin-left: 0; /* Remove unnecessary margin */
    margin-right: 0;
    padding-left: 0;
}

/* Fix Button Alignment */
.btn-link {
    text-decoration: none;
    font-size: 0.9rem;
}

.btn-link:hover {
    text-decoration: underline;
}

/* Card Layout */
.card {
    border-radius: 8px;
    border: none;
    transition: transform 0.2s, box-shadow 0.2s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}


/* Link Button (Lebih Banyak) */
.btn-link {
    text-decoration: none;
    font-size: 0.9rem;
}

.btn-link:hover {
    text-decoration: underline;
}

/* Job Banner */
.job-banner img {
    width: 100%;
    border-radius: 8px;
}

/* Job Cards */
.card {
    border-radius: 8px;
    border: none;
    transition: transform 0.2s, box-shadow 0.2s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.card .card-body h5 {
    font-size: 1rem;
    color: #333;
}

.card .card-body p {
    margin-bottom: 0.5rem;
    font-size: 0.85rem;
}

.card-footer {
    background-color: #fff;
    border-top: none;
}

.card-footer span {
    font-size: 0.85rem;
}

/* Badge (Bookmark Icon) */
.badge {
    border-radius: 50%;
    padding: 0.5rem;
    background: #f8f9fa;
    cursor: pointer;
}



  </style>


<div class="container yeet">

<div class="carousel">
  <div class="carousel-track">
    <div class="carousel-slide">
      <a href="/companies?selected_company=1&search=&page=">
        <img src="images/banner.jpg" alt="Slide 1">
      </a>
    </div>
  </div>
</div>


<div class="mt-5" style="background-color: #003366; color: white; padding: 20px; border-radius: 8px;">
<h2>Recommended Jobs for You</h2>
@if($recommendedJobs->isEmpty())
    <p>No job recommendations available at this time.</p>
@else
    <div class="row">
        @foreach($recommendedJobs->take(3) as $job)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body position-relative">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="logo-container">
                            <img src="{{ $job->company->CompanyImage }}" alt="Company Logo" class="logo-company">
                        </div>
                    </div>

                    <h5 class="job-title fw-bold mb-1 text-dark">{{ $job->Role }}</h5>

                    <p class="mb-1 text-primary">{{ $job->company->CompanyName ?? 'Unknown' }}</p>

                    <p class="text-muted small mb-2">
                        Industri: {{ $job->company->Industry ?? 'Tidak disebutkan' }}
                    </p>

                    <p class="text-muted small mb-2">
                        Lokasi: {{ $job->company->CompanyCity ?? 'Tidak disebutkan' }}
                    </p>

                    <p class="text-muted small mb-2">
                        Mode Kerja: {{ $job->RemoteOrOnsite ?? 'Tidak disebutkan' }}
                    </p>

                    <p class="text-muted small mb-2">
                        Level Karir: {{ $job->CareerLevel ?? 'Tidak disebutkan' }}
                    </p>

                </div>

                <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                    <small class="text-muted">Diposting: {{ date('d M Y', strtotime($job->created_at)) }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif

</div>

{{-- DISABILITIES --}}
<div class="section-title">
    <h2>Cocok untuk Disabilitas</h2>
    <p>Temukan posisi yang disesuaikan untuk berbagai jenis disabilitas.</p>
</div>

<div class="suitable-section grid-container">
    @foreach ($disabilities as $disability)
        <a href="{{ url('/jobs') }}?suitable_for={{ urlencode($disability) }}" class="suitable-item glass-card">
            <div class="content">
                <h3>{{ $disability }}</h3>
                <p>Posisi yang cocok untuk individu dengan disabilitas <strong>{{ strtolower($disability) }}</strong>.</p>
            </div>
        </a>
    @endforeach
</div>



<div class="container mt-4">
    <div class="row g-0 align-items-start">
        <!-- Banner Promotion on the Left -->
        <div class="col-md-6 d-flex align-items-center">
            <a href="{{ url('/companies?selected_company=5&search=&page=2') }}" class="w-100">
                <div class="job-banner w-100">
                    <img src="images/banner-2.jpg" alt="Banner" class="img-fluid rounded">
                </div>
            </a>
        </div>

        <!-- Job Cards and Title on the Right -->
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="section-title">
                    <h2 class="mb-0">Lowongan Kerja Pilihan</h2>
                    <p class="text-muted mb-0">Jelajahi peluang kerja yang tersedia dan temukan pekerjaan yang tepat untuk Anda.</p>
                </div>
                <a href="/jobs" class="btn btn-link text-primary fw-bold ms-auto">Lebih Banyak &gt;</a>
            </div>

            <div class="job-listings-container mt-3">
                @if ($jobs->isEmpty())
                    <div>No jobs available.</div>
                @else
                    <div class="row g-3">
                        @foreach ($jobs->take(4) as $job)
                            <div class="col-6">
                                <!-- Job card wrapped in an anchor tag for redirection -->
                                <a href="{{ url('/jobs/selected?selected_job=' . $job->JobID . '&page=1&search=&page=') }}" class="text-decoration-none">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="fw-bold">{{ $job->Role }}</h5>
                                            <p class="text-primary">
                                                <a href="/companies/{{ $job->company->CompanyID }}" class="text-primary">
                                                    {{ $job->company->CompanyName ?? 'Unknown' }}
                                                </a>
                                            </p>
                                            <p class="text-success">Gaji di atas ekspektasi</p>
                                            <p>{{ $job->Location ?? 'Lokasi tidak tersedia' }}</p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between">
                                            <span class="text-danger fw-bold">{{ $job->MatchPercentage ?? '10%' }} cocok</span>
                                            <small class="text-muted">
                                                {{ date('d M Y', strtotime($job->created_at)) }}
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>







<script>
const track = document.querySelector('.carousel-track');
const slides = Array.from(track.children);
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');

let currentIndex = 0;

function updateCarousel(index) {
  const slideWidth = slides[0].getBoundingClientRect().width;
  track.style.transform = `translateX(-${index * slideWidth}px)`;
}

prevButton.addEventListener('click', () => {
  currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides.length - 1;
  updateCarousel(currentIndex);
});

nextButton.addEventListener('click', () => {
  currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
  updateCarousel(currentIndex);
});

window.addEventListener('resize', () => updateCarousel(currentIndex));
</script>

@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head> --}}

