<nav id="navbar" class="navbar navbar-expand-lg fixed-top">
    <div class="container d-flex justify-content-around align-items-center">
        <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">KerjaSetara</a>
        
        <ul class="navbar-nav d-flex flex-row justify-content-around w-50">
            <li class="nav-item">
                <a class="nav-link" href="#jobs">Cari Pekerjaan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#why-join">Kenapa Bergabung</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#get-job">Dapatkan Pekerjaan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#career-inspiration">Inspirasi Karir</a>
            </li>
        </ul>

        <div class="d-flex">
            <a href="{{ route('login') }}" class="btn btn-outline-primary mr-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        </div>
    </div>
</nav>

<!-- Navbar Style and Scroll Script -->
<style>
    #navbar {
        background-color: transparent;
        transition: background-color 0.3s ease-in-out;
    }
    #navbar.scrolled {
        background-color: white;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navbar = document.getElementById("navbar");

        function handleScroll() {
            const scrollThreshold = window.innerHeight * 0.1; // 10% dari tinggi viewport
            if (window.scrollY >= scrollThreshold) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        }

        // Tambahkan event listener untuk scroll
        window.addEventListener("scroll", handleScroll);
    });
</script>
