<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Jendela - {{ $news->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/pages/berita.css') }}">
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
                <div class="logo"><a href="../home">JENDELA</a></div>
                <div class="nav-links">
                    <a href="../home">DASHBOARD</a>
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
                @foreach($navCategories as $navCategories)
                    <a href="{{ route('category.show', ['category' => $navCategories->slug]) }}"
                        class="{{ isset($category) && $category->slug == $navCategories->slug ? 'active' : '' }}">
                        {{ $navCategories->name }}
                    </a>
                @endforeach
            </div>
        </div>


        <!-- Detail Berita -->
        <div class="main-content">
            <div class="detail-news">
                <div class="breadcrumb">TOP PICKS &nbsp; > &nbsp; BBM NAIK</div>

                <h1 class="title-news">
                    {{ $news->title }}
                </h1>

                <div class="writer-info">
                    <span class="writer">{{ $news->writer}}</span>
                    <span class="span"> | </span>
                    <span class="rubic">Jendela Crew</span>
                </div>

                <div class="date">
                    {{ $news->published_at->format('d M Y, H:i') }} WIB
                </div>

                <div class="image-news">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
                </div>

                <div class="content-news">
                    {{-- <p>{{ $berita->isi }} </p> --}}
                    <p>{!! nl2br(e((string) $news->content_news)) !!}
                    </p>
                </div>
            </div>
            <aside class="sidebar">
                <!-- Kolom Berita Terpopuler -->
                <div class="top-picks">
                    <h3>Top Picks</h3>
                    <ol>
                        @foreach ($topPicks as $news)
                            <li>
                                <span class="nomor">#{{$loop->iteration}}</span>
                                <span class="judul">
                                    <a href="/news/{{$news->slug}}">
                                        {{ $news->title }}
                                    </a>
                                </span>
                            </li>
                        @endforeach
                    </ol>
                    <button class="btn-selengkapnya"><a href="#">Lihat Selengkapnya →</a></button>
                </div>
                {{-- quick nav side --}}
                <div class="new-news">
                    <h3>Berita Terbaru</h3>
                    <ol>
                        @foreach ($latestNews as $news)
                            <li>
                                <span class="nomor">#{{$loop->iteration}}</span>
                                <span class="judul">
                                    <a href="/news/{{$news->slug}}">
                                        {{ $news->title }}
                                    </a>
                                </span>
                            </li>
                        @endforeach
                    </ol>
                    <button class="btn-selengkapnya"><a href="#">Lihat Selengkapnya →</a></button>
                </div>
            </aside>
        </div>
    </div>
    <script src="{{ asset('js/script/dateTime.js') }}"></script>
</body>
{{-- footer --}}
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