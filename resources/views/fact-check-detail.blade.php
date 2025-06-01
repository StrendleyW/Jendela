<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->title ?? 'Detail Cek Fakta' }} - Jendela</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/factcheckdetail.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>

    {{-- NAVBAR (HEADER + CATEGORY MENU) --}}
    <div class="navbar">
        <div class="header">
            <div class="inner-header">
                <div class="logo"><a href="/">JENDELA</a></div>
                <div class="nav-links">
                    <a href="/">DASHBOARD</a>
                    <a href="/fact-checks" class="{{ Str::contains(Route::currentRouteName(), 'fact-checks') ? 'active' : '' }}">FACT CHECK</a>
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
    {{-- AKHIR NAVBAR --}}

    {{-- KONTEN UTAMA HALAMAN --}}
    <div class="main-content-wrapper"> 
        <article class="fact-check-article-container"> 
            @if(isset($article))
                <div class="fc-article-header">
                    <span class="fc-article-verdict verdict-{{ strtolower($article->verdict ?? 'unknown') }}">
                        {{ strtoupper($article->verdict ?? 'N/A') }}
                    </span>
                    <h1 class="fc-article-title">{{ $article->title }}</h1>
                    <p class="fc-article-meta">
                        Dipublikasikan: {{ $article->published_at ? $article->published_at->format('d M Y, H:i') : 'N/A' }} WIB
                        @if($article->source_name)
                            | Sumber Klaim: 
                            @if($article->source_link)
                                <a href="{{ $article->source_link }}" target="_blank" rel="noopener noreferrer">{{ $article->source_name }}</a>
                            @else
                                {{ $article->source_name }}
                            @endif
                        @else
                            | Tim Cek Fakta Jendela
                        @endif
                    </p>
                </div>

                @if($article->image)
                    <div class="fc-article-image-wrapper">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar terkait: {{ $article->title }}" class="fc-article-image">
                    </div>
                @endif

                @if($article->claim_excerpt)
                    <div class="fc-article-claim-excerpt">
                        <strong>Ringkasan Klaim:</strong>
                        <div>
                            {{ Str::limit(strip_tags($article->claim_excerpt ?? ''), 200) }}
                        </div> 
                    </div>
                @endif

                <div class="fc-article-content">
                    {!! $article->full_content !!}
                </div>
            @else
                <p style="text-align:center; padding: 30px;">Artikel tidak ditemukan.</p>
            @endif
        </article>
    </div>
    {{-- AKHIR KONTEN UTAMA HALAMAN --}}

    {{-- FOOTER --}}
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
    {{-- AKHIR FOOTER --}}
    
    <script src="{{ asset('js/script/aboutUs.js') }}" defer></script> 
</body>
</html>