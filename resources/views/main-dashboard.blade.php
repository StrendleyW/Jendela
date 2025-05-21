<!DOCTYPE html>
<html lang="id">


<head>
    <meta charset="UTF-8">
    <title>Jendela</title>
    <link rel="stylesheet" href="{{ asset('css/pages/dashboard.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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
                <div class="logo"><a href="home">JENDELA</a></div>
                <div class="nav-links">
                    <a href="home">DASHBOARD</a>
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
            <div class="inner-category">
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
                        <a href="#">
                            <img src="{{ asset('images/bbm.png') }}" alt="Berita Utama">
                            <div class="caption">
                                Harga BBM Naik, Ini Kata Wali K ota Jakarta Untuk Mengatasi Hal Ini
                            </div>
                        </a>
                    </div>
                    <!-- Berita Samping -->
                    <div class="news-side">
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/perampokan.png') }}" alt="Perampokan">
                                <div class="caption">Pelaku Perampokan Bank Telah Diamankan</div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/kurma.png') }}" alt="Kurma">
                                <div class="caption">Buah Bagus Untuk Berbuka</div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/cuaca.png') }}" alt="Hujan">
                                <div class="caption">Hujan Surabaya Mendekati Tingkat Bahaya</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest News -->
        <div class="latest-news">
            <div class="inner">
                <h2>LATEST NEWS</h2>
            </div>
        </div>

        <div class="latest-news-content">
            <div class="inner-latest-news">
                @foreach ($latestNews as $news)
                    <div class="latest-news-container">
                        <div class="latest-news-main">
                            <a href="news/{{$news->slug}}">
                                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
                            </a>
                        </div>
                        <div class="latest-news-text">
                            <a href="news/{{$news->slug}}">
                                <div class="latest-news-caption">
                                    {{ Str::limit($news->title, 100) }}
                                </div>
                            </a>
                            <div class="latest-news-time">
                                {{ $news->created_at->format('d M Y - H:i') }} WIB
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    </div>
    <script src="js/script/dateTime.js"></script>
</body>
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-about">
            <h2>JENDELA</h2>
            <p>Media terpercaya untuk berita terkini, tajam, dan terpercaya dari seluruh Indonesia.</p>
        </div>

        <div class="footer-links">
            <h3>Navigasi</h3>
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Top Picks</a></li>
                <li><a href="#">Latest News</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </div>

        <div class="footer-contact">
            <h3>Kontak Kami</h3>
            <p>Email: tesjendela@coba.com</p>
            <p>Telp: +62 123 4567 8910</p>
            <p>Jl. Merdeka No.123, Jakarta</p>
        </div>

        <div class="footer-social">
            <h3>Ikuti Kami</h3>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 JENDELA. All rights reserved.</p>
    </div>
</footer>

</html>