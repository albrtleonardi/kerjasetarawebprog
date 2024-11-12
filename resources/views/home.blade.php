@extends('layouts.without_sidebar')

@section('content')
<header id="jobs" class="banner text-center d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <h1 class="display-4 font-weight-bold">Selamat Datang di KerjaSetara</h1>
    <p class="lead">Temukan pekerjaan impian Anda dan dapatkan inspirasi karir di satu platform.</p>
    <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-3">Get Started</a>
</header>

<section id="why-join" class="container my-5 text-center">
    <h2 class="font-weight-bold mb-4">Kenapa Harus Memilih KerjaSetara?</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="reason-card p-3">
                <h5>Alasan 1</h5>
                <p>Deskripsi singkat alasan 1.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="reason-card p-3">
                <h5>Alasan 2</h5>
                <p>Deskripsi singkat alasan 2.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="reason-card p-3">
                <h5>Alasan 3</h5>
                <p>Deskripsi singkat alasan 3.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="reason-card p-3">
                <h5>Alasan 4</h5>
                <p>Deskripsi singkat alasan 4.</p>
            </div>
        </div>
    </div>
</section>

<section id="companies" class="container my-5">
    <h2 class="text-center font-weight-bold mb-4">Perusahaan Terbaik</h2>
    <div class="row justify-content-center">
        @foreach ($companies->take(10) as $index => $company)
            <div class="{{ $index < 6 ? 'col-md-2' : 'col-md-3' }} mb-4 text-center">
                <div class="company-card p-3">
                    @if ($company->CompanyImage)
                        <img src="{{ asset($company->CompanyImage) }}" alt="{{ $company->CompanyName }} Logo" class="company-image mb-2">
                    @else
                        <p>No Image Available</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>

<style>
    .company-card {
        border: none; 
    }

    .company-image {
        width: 100%; 
        height: auto; 
        max-height: 120px; 
        object-fit: contain; 
    }
</style>

<section id="how-to-use" class="container my-5 text-center">
    <h2 class="font-weight-bold mb-4">Cara Menggunakan KerjaSetara</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="step-card p-3">
                <h5>Step 1</h5>
                <p>Deskripsi singkat untuk langkah 1.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="step-card p-3">
                <h5>Step 2</h5>
                <p>Deskripsi singkat untuk langkah 2.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="step-card p-3">
                <h5>Step 3</h5>
                <p>Deskripsi singkat untuk langkah 3.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="step-card p-3">
                <h5>Step 4</h5>
                <p>Deskripsi singkat untuk langkah 4.</p>
            </div>
        </div>
    </div>
</section>

<section id="cta" class="text-center my-5">
    <h2 class="font-weight-bold">Bergabunglah dengan Kami!</h2>
    <p>Jangan lewatkan kesempatan untuk menemukan karir terbaik Anda.</p>
    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg mr-2">Login</a>
    <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Register</a>
</section>
@endsection
