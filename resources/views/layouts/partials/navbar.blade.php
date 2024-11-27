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

    /* Default text color */
    #navbar .nav-link {
        color: white; /* Text color when navbar is transparent */
        font-size: 0.875rem; /* Smaller text size for the menu items */
        transition: color 0.3s ease-in-out;
    }

    /* Text color when navbar is scrolled (white background) */
    #navbar.scrolled .nav-link {
        color: blue; /* Text color changes to blue when scrolled */
    }

    /* Optional: Text color for the brand */
    #navbar .navbar-brand {
        color: white; /* Brand color when navbar is transparent */
        font-size: 1.25rem; /* Adjust brand font size */
    }

    #navbar.scrolled .navbar-brand {
        color: blue; /* Brand color changes to blue when scrolled */
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navbar = document.getElementById("navbar");

        function handleScroll() {
            const scrollThreshold = window.innerHeight * 0.1; // 10% of viewport height
            if (window.scrollY >= scrollThreshold) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        }

        // Add event listener for scroll
        window.addEventListener("scroll", handleScroll);
    });
</script>
