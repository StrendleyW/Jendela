<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Jendela - {{ $news->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/pages/berita.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
    <div class="content">
        <div class="navbar">
            <div class="header">
                <div class="inner-header">
                    <div class="logo"><a href="/">JENDELA</a></div>
                    <div class="nav-links">
                        <a href="/">DASHBOARD</a>
                        <a href="/fact-checks">FACT CHECK</a>
                        <a href="#">ABOUT US</a>
                    </div>
                    <div class="search-container">
                        <form action="{{ route('news.search') }}" method="GET" class="search-form">
                            <input type="text" name="keyword" placeholder="Search news..."
                                value="{{ request('keyword') ?? '' }}" class="search-input">
                            <button type="submit" class="search-button">&#128269;</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="category-menu">
                <div class="inner-category">
                    @foreach($navCategories as $navCategory)
                        <a href="{{ route('category.show', ['category' => $navCategory->slug]) }}"
                            class="{{ isset($category) && $category->slug == $navCategory->slug ? 'active' : '' }}">
                            {{ $navCategory->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>


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
                    <p>{!! nl2br(e((string) $news->content_news)) !!}</p>
                </div>

                {{-- AWAL BAGIAN KOMENTAR DISQUS --}}
                <div class="comments-section" style="margin-top: 40px;">
                    <hr>
                    <h2 style="margin-top: 20px; margin-bottom: 20px; font-size: 1.5em;">Komentar</h2>
                    <div id="disqus_thread"></div>
                    <script>
                        /**
                        * RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                        * LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                        
                        var disqus_config = function () {
                            this.page.url = '{{ url()->current() }}';  // Menggunakan URL kanonikal halaman saat ini
                            this.page.identifier = '{{ $news->id }}'; // Menggunakan ID unik dari berita
                        };
                        
                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://jendelaberita.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
                {{-- AKHIR BAGIAN KOMENTAR DISQUS --}}

            </div>
            <aside class="sidebar">
                <div class="top-picks">
                    <h3>Top Picks</h3>
                    <ol>
                        @foreach ($topPicks as $topNews)
                            <li>
                                <span class="nomor">#{{$loop->iteration}}</span>
                                <span class="judul">
                                    <a href="/news/{{$topNews->slug}}">
                                        {{ $topNews->title }}
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
                        @foreach ($latestNews as $latest)
                            <li>
                                <span class="nomor">#{{$loop->iteration}}</span>
                                <span class="judul">
                                    <a href="/news/{{$latest->slug}}">
                                        {{ $latest->title }}
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