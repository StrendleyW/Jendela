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
        <h1 class="page-title">CEK FAKTA</h1>
        <div class="fact-check-list">
            @if(isset($factCheckArticles) && $factCheckArticles->count() > 0)
                @foreach ($factCheckArticles as $article)
                <div class="fact-check-item">
                    <div class="fc-item-image">
                        {{-- Jika ada halaman detail, arahkan ke sana --}}
                        {{-- <a href="{{ route('factcheck.show', $article->slug) }}"> --}}
                        <a href="#"> {{-- Untuk sementara link ke # --}}
                            <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://via.placeholder.com/300x200/CCCCCC/000000?text=No+Image' }}" alt="{{ $article->title }}">
                        </a>
                    </div>
                    <div class="fc-item-content">
                        <span class="fc-item-verdict verdict-{{ strtolower($article->verdict) }}">{{ strtoupper($article->verdict) }}</span>
                        <h3 class="fc-item-title">
                            {{-- <a href="{{ route('factcheck.show', $article->slug) }}"> --}}
                            <a href="#"> {{-- Untuk sementara link ke # --}}
                                {{ $article->title }}
                            </a>
                        </h3>
                        <p class="fc-item-meta">
                            {{ $article->published_at ? $article->published_at->format('d M Y, H:i') : 'Tanggal tidak tersedia' }} WIB
                            @if($article->source_name) | Sumber: {{ $article->source_name }} @endif
                        </p>
                        <p class="fc-item-excerpt">
                            {{ Str::limit($article->claim_excerpt, 200) }} {{-- Menggunakan Str::limit untuk excerpt --}}
                        </p>
                    </div>
                </div>
                @endforeach
            @else
                <p>Belum ada berita cek fakta yang tersedia.</p>
            @endif
        </div>

        {{-- Tampilkan link pagination --}}
        @if(isset($factCheckArticles) && $factCheckArticles->count() > 0)
        <div class="pagination-links" style="margin-top: 30px; text-align: center;">
            {{ $factCheckArticles->links() }}
        </div>
        @endif
    </div>
    </div>

    {{-- Fer --}}
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