@extends('layouts.without_sidebar')

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

  </style>


<div class="container mt-5">
<h1>Welcome, {{ $user->UserName }}</h1>

<h2>Recommended Jobs for You</h2>
@if($recommendedJobs->isEmpty())
    <p>No job recommendations available at this time.</p>
@else
    <div class="row">
        @foreach($recommendedJobs->take(3) as $job)
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

<div class="carousel">
<div class="carousel-track">
  <div class="carousel-slide">
    <img src="https://via.placeholder.com/600x300?text=Slide+1" alt="Slide 1">
  </div>
  <div class="carousel-slide">
    <img src="https://via.placeholder.com/600x300?text=Slide+2" alt="Slide 2">
  </div>
  <div class="carousel-slide">
    <img src="https://via.placeholder.com/600x300?text=Slide+3" alt="Slide 3">
  </div>
</div>
<div class="carousel-controls">
  <button class="carousel-button" id="prev">❮</button>
  <button class="carousel-button" id="next">❯</button>
</div>
</div>


{{-- DISABILITIES --}}
<div class="section-title">
    <h2>Cocok untuk Disabilitas</h2>
    <p>Temukan posisi yang disesuaikan untuk berbagai jenis disabilitas.</p>
</div>


<div class="suitable-section">
@foreach ($disabilities as $disability)
    <div class="suitable-item">
    <div class="content">
        <h3>{{ $disability }}</h3>
        <p>Posisi yang cocok untuk individu dengan disabilitas <strong>{{ strtolower($disability) }}</strong>.</p>
    </div>
    </div>
@endforeach
</div>




{{-- <div class="suitable-section">
<div class="suitable-item">
  <div class="content">
    <h3>Vision Impairment</h3>
    <p>Roles suitable for individuals with vision impairments.</p>
  </div>
</div>
<div class="suitable-item">
  <div class="content">
    <h3>Hearing Impairment</h3>
    <p>Roles suitable for individuals with hearing impairments.</p>
  </div>
</div>
<div class="suitable-item">
  <div class="content">
    <h3>Mobility Impairment</h3>
    <p>Roles suitable for individuals with mobility impairments.</p>
  </div>
</div>
</div> --}}


<div class="section-title">
<h2>Lowongan Kerja Pilihan</h2>
<p>Jelajahi peluang kerja yang tersedia dan temukan pekerjaan yang tepat untuk Anda.</p>
</div>

@if ($jobs->isEmpty())
  <div>no job</div>
  <div class="job-highlight-section">
    <div class="job-listings">
      <div class="job-card">
        <h4>Trainer Smartfren SEJ</h4>
        <p>PT Smart Telecom</p>
        <p class="salary">Gaji di atas ekspektasi</p>
        <p class="location">Malang</p>
        <span class="match-score">10% cocok</span>
        <p class="date">1 Des 2024</p>
      </div>
      <div class="job-card">
        <h4>Area Sales Coordinator</h4>
        <p>PT Smart Telecom</p>
        <p class="salary">Gaji di atas ekspektasi</p>
        <p class="location">Prov. Jawa Tengah</p>
        <span class="match-score">10% cocok</span>
        <p class="date">14 Okt 2024</p>
      </div>
      <div class="job-card">
        <h4>Area Sales Coordinator</h4>
        <p>PT Smart Telecom</p>
        <p class="salary">Gaji di atas ekspektasi</p>
        <p class="location">Prov. Jawa Tengah</p>
        <span class="match-score">10% cocok</span>
        <p class="date">14 Okt 2024</p>
      </div>
      <div class="job-card">
        <h4>Area Sales Coordinator</h4>
        <p>PT Smart Telecom</p>
        <p class="salary">Gaji di atas ekspektasi</p>
        <p class="location">Prov. Jawa Tengah</p>
        <span class="match-score">10% cocok</span>
        <p class="date">14 Okt 2024</p>
      </div>
      <div class="job-card">
        <h4>Area Sales Coordinator</h4>
        <p>PT Smart Telecom</p>
        <p class="salary">Gaji di atas ekspektasi</p>
        <p class="location">Prov. Jawa Tengah</p>
        <span class="match-score">10% cocok</span>
        <p class="date">14 Okt 2024</p>
      </div>
      <div class="job-card">
        <h4>Area Sales Coordinator</h4>
        <p>PT Smart Telecom</p>
        <p class="salary">Gaji di atas ekspektasi</p>
        <p class="location">Prov. Jawa Tengah</p>
        <span class="match-score">10% cocok</span>
        <p class="date">14 Okt 2024</p>
      </div>
    </div>
  </div>
@else
    @foreach ($jobs->take(4) as $job)
    <a href="/jobs/{{ $job->JobID }}" class="job-highlight-section">
    <div class="job-listings">
        <div class="job-card">
        <h4>{{ $job->Role }}</h4>
        <p> <a href="/companies/{{ $job->company->CompanyID }}" class="company-link">
            {{ $job->company->CompanyName ?? 'Unknown' }}
        </a></p>
        <p class="salary">{{ $job->SalaryMin }}</p>
        {{-- <p class="location">Malang</p> --}}
        {{-- <span class="match-score">10% cocok</span> --}}
        <p class="date">{{ $job->company->CompanyName ?? 'Unknown' }}</p>
        </div>
    </div>
    </a>
    @endforeach
@endif

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
