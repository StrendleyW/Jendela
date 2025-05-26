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
                {{-- Link Kategori yang Diperbarui --}}
                <a href="{{ route('category.show', ['category' => 'politik']) }}">Politic</a>
                <a href="{{ route('category.show', ['category' => 'food']) }}">Food</a>
                <a href="{{ route('category.show', ['category' => 'entertainment']) }}">Entertainment</a>
                <a href="{{ route('category.show', ['category' => 'fashion']) }}">Fashion</a>
                <a href="{{ route('category.show', ['category' => 'sport']) }}">Sport</a>
                <a href="{{ route('category.show', ['category' => 'ekonomi']) }}">Ekonomi</a>
                <a href="{{ route('category.show', ['category' => 'technology']) }}">Technology</a>

                {{-- Jika ingin mengambil kategori secara dinamis dari database di masa mendatang --}}
                {{-- Perlu mengirimkan variabel $navCategories dari controller ke view ini --}}
                {{-- Contoh: --}}
                {{-- @isset($navCategories) --}}
                {{--     @foreach($navCategories as $navCategory) --}}
                {{--         <a href="{{ route('category.show', ['category' => $navCategory->slug]) }}"> --}}
                {{--             {{ $navCategory->name }} --}}
                {{--         </a> --}}
                {{--     @endforeach --}}
                {{-- @endisset --}}
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