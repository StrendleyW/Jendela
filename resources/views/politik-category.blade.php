<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Jendela</title>
    <link rel="stylesheet" href="{{ asset('css/pages/kategori.css') }}">
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
                <div class="logo"><a href="/home">JENDELA</a></div>
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
            <div class="inner-category">
                {{-- Link Kategori yang Diperbarui --}}
                <a href="{{ route('category.show', ['category' => 'politik']) }}">Politic</a>
                <a href="{{ route('category.show', ['category' => 'food']) }}">Food</a>
                <a href="{{ route('category.show', ['category' => 'entertainment']) }}">Entertainment</a>
                <a href="{{ route('category.show', ['category' => 'fashion']) }}">Fashion</a>
                <a href="{{ route('category.show', ['category' => 'sport']) }}">Sport</a>
                <a href="{{ route('category.show', ['category' => 'ekonomi']) }}">Ekonomi</a>
                <a href="{{ route('category.show', ['category' => 'technology']) }}">Technology</a>
            </div>
        </div>

    <div class="main-content-wrapper">
        <div class="politik-category-container">
            <h1 class="category-title">POLITIK</h1>
            <div class="article-list">
                <div class="article-item">
                    <div class="article-image">
                        <a href="#">
                            <img src="https://asset.kompas.com/crops/9NcftrJBWsv2V4wMZKF86B-8FVg=/0x0:0x0/740x492/data/todaysphoto/2018/foto/73f614858444241bddf143/p_1747312068557-pm-australia.jpg" alt="Judul Berita Politik Satu">
                        </a>
                    </div>
                    <div class="article-text-content">
                        <h2 class="article-title"><a href="#">Kunjungan Perdana Menteri Australia Anthony Albanese</a></h2>
                        <p class="article-meta">
                            <span class="article-date">25 Mei 2025</span> |
                            <span class="article-source">Sumber: Jendela Politik</span>
                        </p>
                        <p class="article-excerpt">
                            Kunjungan dari perdana menteri Australia.
                        </p>
                    </div>
                </div>

                <div class="article-item">
                    <div class="article-image">
                        <a href="#">
                            <img src="https://asset.kompas.com/crops/1JZqAyWk2mIe5EzRxoX8YjTo8H0=/0x0:0x0/235x132/data/photo/2025/05/26/68348a8d130ca.jpg" alt="Judul Berita Politik Dua">
                        </a>
                    </div>
                    <div class="article-text-content">
                        <h2 class="article-title"><a href="#">Prabowo Hadiri Sesi Retreat KTT ke-46 ASEAN, Bahas Myanmar dan Stabilitas Kawasan</a></h2>
                        <p class="article-meta">
                            <span class="article-date">24 Mei 2025</span> |
                            <span class="article-source">Sumber: Observasi Parlemen</span>
                        </p>
                        <p class="article-excerpt">
                            Prabowo Hadiri Sesi Retreat KTT ke-46 ASEAN, Bahas Myanmar dan Stabilitas Kawasan.
                    </div>
                </div>

                <div class="article-item">
                    <div class="article-image">
                        <a href="#">
                            <img src="https://asset.kompas.com/crops/2q4It1DDgVz9bobtsysrCDdD8RM=/0x0:0x0/235x132/data/photo/2025/05/26/68346683eea96.jpg" alt="Judul Berita Politik Tiga">
                        </a>
                    </div>
                    <div class="article-text-content">
                        <h2 class="article-title"><a href="#">Diperiksa Kasus Ijazah Jokowi, Rismon Sianipar Ditanya soal Diskusi dengan Roy Suryo</a></h2>
                        <p class="article-meta">
                            <span class="article-date">23 Mei 2025</span> |
                            <span class="article-source">Sumber: Diplomasi News</span>
                        </p>
                        <p class="article-excerpt">
                            Diperiksa Kasus Ijazah Jokowi, Rismon Sianipar Ditanya soal Diskusi dengan Roy Suryo.
                        </p>
                    </div>
                </div>

                <div class="article-item">
                    <div class="article-image">
                        <a href="#">
                            <img src="https://asset.kompas.com/crops/pYGD6hofEoRfyfzvoYatEn887Uw=/0x0:0x0/235x132/data/photo/2025/05/26/68343d461d33d.jpg" alt="Judul Berita Politik Empat">
                        </a>
                    </div>
                    <div class="article-text-content">
                        <h2 class="article-title"><a href="#">Cak Imin: Gizi Saya Pas-pasan Bisa Jadi Menteri</a></h2>
                        <p class="article-meta">
                            <span class="article-date">22 Mei 2025</span> |
                            <span class="article-source">Sumber: Suara Partai</span>
                        </p>
                        <p class="article-excerpt">
                            Cak Imin kurang gizi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
            <p>© 2025 JENDELA. All rights reserved.</p>
        </div>
    </footer>
    <script>
        // Simple script to display date and time, if you want to reuse it
        function updateDateTime() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
            document.getElementById('date-time').textContent = now.toLocaleDateString('id-ID', options) + ' WIB';
        }
        if (document.getElementById('date-time')) { // Check if element exists
            setInterval(updateDateTime, 1000);
            updateDateTime();
        }
    </script>
</body>
</html>