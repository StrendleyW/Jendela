<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Jendela - Cek Fakta</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/factcheck.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
    <div class="navbar">
        <div class="header">
            <div class="inner-header">
                <div class="logo"><a href="/">JENDELA</a></div>
                <div class="nav-links">
                    <a href="/">DASHBOARD</a>
                    <a href="/fact-checks">FACT CHECK</a>
                    <a class="js-scroll-to-about">ABOUT US</a>
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
                    @foreach($navCategories as $navCategories)
                        <a href="{{ route('category.show', ['category' => $navCategories->slug]) }}"
                            class="{{ isset($category) && $category->slug == $navCategories->slug ? 'active' : '' }}">
                            {{ $navCategories->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

    <div class="main-content-wrapper">
        <div class="fact-check-page-container">
            <h1 class="page-title">CEK FAKTA</h1> {{-- Mirip .category-title --}}
            <div class="fact-check-list">
                <div class="fact-check-item">
                    <div class="fc-item-image">
                        <a href="#">
                            <img src="https://asset.kompas.com/crops/3PqdlXLoJ3O5DBpK8xilK3pVJoM=/0x52:1000x719/1200x800/data/photo/2017/11/02/1091422289.jpg" alt="Gambar terkait klaim hoax">
                        </a>
                    </div>
                    <div class="fc-item-content">
                        <span class="fc-item-verdict verdict-hoax">HOAX</span>
                        <h3 class="fc-item-title"><a href="#">[SALAH] Beredar Foto Penampakan Alien di Subang Saat Gerhana</a></h3>
                        <p class="fc-item-meta">31 Mei 2025 | Tim Cek Fakta Jendela</p>
                        <p class="fc-item-excerpt">
                            Sebuah foto yang diklaim sebagai penampakan alien di Subang saat gerhana matahari total telah beredar luas. Setelah diverifikasi, foto tersebut adalah hasil manipulasi digital.
                        </p>
                    </div>
                </div>

                <div class="fact-check-item">
                    <div class="fc-item-image">
                        <a href="#">
                            <img src="https://www.um-surabaya.ac.id/uploads/home/gambar_konten/foto_konten-70-persen-air-minum-indonesia-terkontaminsi-tinja-dosen-um-surbaya-sarankan-hal-ini-admin-yiutRj.webp" alt="Gambar terkait klaim fakta">
                        </a>
                    </div>
                    <div class="fc-item-content">
                        <span class="fc-item-verdict verdict-fact">FAKTA</span>
                        <h3 class="fc-item-title"><a href="#">Manfaat Minum Air Putih 8 Gelas Sehari Terbukti Secara Ilmiah</a></h3>
                        <p class="fc-item-meta">30 Mei 2025 | Tim Cek Fakta Jendela</p>
                        <p class="fc-item-excerpt">
                            Klaim mengenai manfaat minum air putih minimal 8 gelas sehari didukung oleh berbagai penelitian ilmiah yang menunjukkan dampak positif bagi kesehatan tubuh secara keseluruhan.
                        </p>
                    </div>
                </div>

                <div class="fact-check-item">
                    <div class="fc-item-image">
                        <a href="#">
                            <img src="https://akcdn.detik.net.id/visual/2016/06/29/9ce9679f-6da6-486f-8566-8118e7c439ed_169.jpg?w=400&q=90" alt="Gambar terkait klaim misleading">
                        </a>
                    </div>
                    <div class="fc-item-content">
                        <span class="fc-item-verdict verdict-misleading">MISLEADING</span>
                        <h3 class="fc-item-title"><a href="#">Video Detik-detik Hujan Uang di Pusat Kota (Kontekstualisasi Salah)</a></h3>
                        <p class="fc-item-meta">29 Mei 2025 | Tim Cek Fakta Jendela</p>
                        <p class="fc-item-excerpt">
                            Video yang menunjukkan hujan uang memang benar terjadi, namun narasi yang menyertainya bahwa peristiwa tersebut terjadi di Indonesia adalah salah. Video aslinya berasal dari acara promosi di luar negeri.
                        </p>
                    </div>
                </div>

                <div class="fact-check-item">
                    <div class="fc-item-image">
                        <a href="#">
                            <img src="https://media.tampang.com/tm_images/article/202505/6522517e1ba5ktc17xa4gb6om0z7.jpg" alt="Gambar terkait klarifikasi">
                        </a>
                    </div>
                    <div class="fc-item-content">
                        <span class="fc-item-verdict verdict-clarification">KLARIFIKASI</span>
                        <h3 class="fc-item-title"><a href="#">Penjelasan Resmi Terkait Isu Kenaikan Biaya Admin Bank X</a></h3>
                        <p class="fc-item-meta">28 Mei 2025 | Tim Cek Fakta Jendela</p>
                        <p class="fc-item-excerpt">
                            Menanggapi keresahan publik, Bank X memberikan klarifikasi resmi mengenai isu kenaikan biaya administrasi. Berikut poin-poin penjelasannya.
                        </p>
                    </div>
                </div>
                {{-- Tambahkan lebih banyak artikel cek fakta di sini --}}
            </div>
            {{-- Mungkin ada pagination di sini jika artikel banyak --}}
        </div>
    </div>

    {{-- Footer --}}
    <footer class="site-footer" id="about-us">
        <div class="footer-container">
            <div class="footer-about">
                <h2>JENDELA</h2>
                <p>Media terpercaya untuk berita terkini, tajam, dan terpercaya dari seluruh Indonesia.</p>
            </div>
            <div class="footer-links">
                <h3>Navigasi</h3>
                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><a href="#">Top Picks</a></li>
                    <li><a href="#">Latest News</a></li>
                    <li><a href="#" class="js-scroll-to-about">Tentang Kami</a></li>
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
    {{-- Akhir dari Footer --}}
    
    <script src="{{ asset('js/script/aboutUs.js') }}" defer></script> 
    <script src="{{ asset('js/script/dateTime.js') }}" defer></script>

</body>
</html>