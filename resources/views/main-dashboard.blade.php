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
    <div class="content">
        <div class="navbar">
            <!-- Header -->
            <div class="header">
                <div class="inner-header">
                    <div class="logo"><a href="/">JENDELA</a></div>
                    <div class="nav-links">
                        <a href="/">DASHBOARD</a>
                        <a href="#">FACT CHECK</a>
                        <a href="#" class="js-scroll-to-about">ABOUT US</a>
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

        <!-- Top Picks -->
        <div class="top-picks">
            <div class="inner">
                <h2>TOP PICKS TODAY</h2>
                <a href="/top-picks" class="view-all-link">
                    View All <span class="separator">|</span> &rarr;
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="inner">
                <div class="news-container">
                    <!-- Berita Utama -->
                    @if ($topPicks->isNotEmpty())
                        @php
                            $mainNews = $topPicks->first();
                            $sideNews = $topPicks->skip(1);
                        @endphp

                        <div class="news-main">
                            <a href="news/{{$mainNews->slug}}">
                                <img src="{{ asset('storage/' . $mainNews->image) }}" alt="{{ $mainNews->title }}">
                                <div class="caption">{{ $mainNews->title }}</div>
                            </a>
                        </div>

                        <!-- Berita Samping -->
                        <div class="news-side">
                            @foreach ($sideNews as $news)
                                <div class="item">
                                    <a href="news/{{$news->slug}}">
                                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
                                        <div class="caption">{{ $news->title }}</div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Latest News -->
        <div class="latest-news">
            <div class="inner">
                <h2>LATEST NEWS</h2>
                <a href="/indeks" class="view-all-link">
                    View All <span class="separator">|</span> &rarr;
                </a>
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
    <script src="{{ asset('js/script/aboutUs.js') }}" defer></script>
</body>
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-about" id="about-us">
            <h2>JENDELA</h2>
            <p>Media terpercaya untuk berita terkini, tajam, dan terpercaya dari seluruh Indonesia.</p>
        </div>

        <div class="footer-links">
            <h3>Navigasi</h3>
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Top Picks</a></li>
                <li><a href="#">Latest News</a></li>
                <li><a href="#" class=".js-scroll-to-about">Tentang Kami</a></li>
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