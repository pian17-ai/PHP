<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">MyWebsite</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/PHP/Bu-Lia/index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/PHP/Bu-Lia/gabung/index_gabungan.php">Cek Nilai Siswa</a></li>
                <li class="nav-item"><a class="nav-link" href="/PHP/Bu-Lia/mapel/mapel.php">Mata Pelajaran</a></li>
                <li class="nav-item"><a class="nav-link" href="/PHP/Bu-Lia/siswa/siswa.php">Data Siswa</a></li>
                <li class="nav-item"><a class="nav-link" href="/PHP/Bu-Lia/nilai/nilai.php">Nilai Siswa</a></li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let currentLocation = window.location.pathname.split("/Bu-Lia/components/navbar.php").pop();
        let navLinks = document.querySelectorAll(".navbar-nav .nav-link");

        navLinks.forEach(link => {
            if (link.getAttribute("href") === currentLocation) {
                link.classList.add("active");
            } else {
                link.classList.remove("active");
            }
        });
    });
</script>