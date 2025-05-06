<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Jendela</title>
    <link rel="stylesheet" href="{{ asset('css/pages/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="navbar">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="inner-top-bar">
                <span id="date-time"></span>
                <div>
                    Website Info : Maintenance Completed, thanks for the patience
                </div>
                <div>
                    <a href="#">login</a> to access more features!
                </div>
            </div>
        </div>

        <!-- Header -->
        <div class="header">
            <div class="inner-header">
                <div class="logo">JENDELA</div>
                <div class="nav-links">
                    <a href="#">DASHBOARD</a>
                    <a href="#">FACT CHECK</a>
                    <a href="#">ABOUT US</a>
                </div>
                <div class="search-container">
                    <input type="text" placeholder="Search news...">
                    <button>&#128269;</button>
                </div>
            </div>
        </div>

        <!-- Category Menu -->
        <div class="category-menu">
            <div class="inner">
                <a href="#">Politic</a>
                <a href="#">Food</a>
                <a href="#">Entertainment</a>
                <a href="#">Fashion</a>
                <a href="#">Sport</a>
                <a href="#">Ekonomi</a>
                <a href="#">Technology</a>
            </div>
        </div>


        <!-- Top Picks -->
        <div class="top-picks">
            <div class="inner">
                <h2>TOP PICKS TODAY</h2>
                <div class="top-picks-links">
                    <a href="#">BBM</a>
                    <span>|</span>
                    <a href="#">Harga Minyak Hari Ini</a>
                    <span>|</span>
                    <a href="#">Banjir Jakarta</a>
                    <span>|</span>
                    <a href="#">Lebaran 2025</a>
                    <span>|</span>
                    <a href="#">Dedy Corbuzer</a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="inner">
                <div class="news-container">
                    <!-- Berita Utama -->
                    <div class="news-main">
                        <img src="{{ asset('images/bbm.png') }}" alt="Berita Utama">
                        <div class="caption">
                            Harga BBM Naik, <br> Ini Kata Wali Kota Jakarta Untuk Mengatasi Hal Ini
                        </div>
                    </div>

                    <!-- Berita Samping -->
                    <div class="news-side">
                        <div class="item">
                            <img src="{{ asset('images/perampokan.png') }}" alt="Perampokan">
                            <div class="caption">Pelaku Perampokan Bank Telah Diamankan</div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/kurma.png') }}" alt="Kurma">
                            <div class="caption">Buah Bagus Untuk Berbuka</div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/cuaca.png') }}" alt="Hujan">
                            <div class="caption">Hujan Surabaya Mendekati Tingkat Bahaya</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script/dateTime.js"></script>
</body>

</html>