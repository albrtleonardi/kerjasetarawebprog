@extends('layouts.without_sidebar')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .aboutcontent{
            border: solid rgb(0, 0, 0,0.2) 1px;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 10px;
        }
        h4{
            color: rgb(69, 181, 230);
        }
    </style>
</head>
<body>
    <div id="carouselExample" class="carousel slide"  >
        <div class="carousel-inner" style="height: 300px; width: 70%; margin: auto;">
          <div class="carousel-item active" >
            <img src="{{ asset('images/carousel.jpg')}}" class="d-block w-100 h-100" style="max-height:300px;  object-fit: cover; object-position: center 80%;">
          </div>
        </div>
      </div>
      <div class="card mb-3" style="width:70%; margin: auto;">
        <div class="row g-0">
          <div class="col-md-4" style="width: 10%">
            <img src="{{ asset('images/building.png')}}" class="img-fluid rounded-start"  >
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Kerja Setara</h5>
              <p class="card-text">Jl. Mawar Indah No. 23, Kelurahan Cipta Karya, Kecamatan Harmoni,
                Jakarta Pusat, DKI Jakarta, 10110.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="width: 70%; margin:auto;">
        <div class="col-4" >
          <div id="list-example" class="list-group" style="position: sticky; top: 60px;">
            <a class="list-group-item list-group-item-action" href="#list-item-1">Information</a>
            <a class="list-group-item list-group-item-action" href="#list-item-2">About Us</a>
            <a class="list-group-item list-group-item-action" href="#list-item-2">Photos</a>
          </div>
        </div>
        <div class="col-8">
          <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
            <div class="aboutcontent" style="max-height: 170px;">
                <h4 id="list-item-1">Information</h4>
                <div style="display: flex; flex-wrap: wrap; gap:30%;">
                    <div>
                        <h6>Industri</h6>
                        <h7>Servis</h7>
                    </div>
                    <div>
                        <h6>Hari Kerja</h6>
                        <h7>Senin - Jumat</h7>
                    </div>
                    <div>
                        <h6>Jam Kerja</h6>
                        <h7>08:00 - 17:00</h7>
                    </div>
                    <div>
                        <h6>Dress Code</h6>
                        <h7>Uniform & Casual</h7>
                    </div>
                    <div>
                        <h6>Fasilitas Perusahaan</h6>
                        <h7>Parkir, area rekreasi</h7>
                    </div>
                </div>
            </div>
            <div class="aboutcontent">
                <h4 id="list-item-2">About Us</h4>
                <p>In today's increasingly inclusive global era, equal access to employment opportunities has become a cornerstone of sustainable development. This aligns with one of the United Nations' Sustainable Development Goals: reducing inequalities. Unfortunately, discrimination against individuals with disabilities remains a critical global issue, particularly in terms of access to decent and suitable employment.

                    Our platform is designed to address this challenge by bridging the gap between job seekers with disabilities and organizations committed to inclusivity. We aim to create an accessible, user-friendly platform that empowers individuals with disabilities to find job opportunities that match their skills while enabling companies to discover talented individuals from this community. By fostering these connections, we strive to contribute to a more inclusive workforce and promote equality.</p>
            </div>
            <div class="aboutcontent">
                <h4 id="list-item-3">Photos</h4>
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ asset('images/office1.jpg')}}" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('images/office2.jpg')}}" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('images/office3.jpg')}}" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
          </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
@endsection