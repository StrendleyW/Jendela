<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian untuk "{{ $keyword }}" - Jendela</title>
    <link rel="stylesheet" href="{{ asset('css/pages/search.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
    <div class="content">
        {{-- Navbar Anda (Header + Category Menu) --}}
        <div class="navbar">
            <div class="header">
                <div class="inner-header">
                    <div class="logo"><a href="{{ url('/') }}">JENDELA</a></div>
                    <div class="nav-links">
                        <a href="{{ url('/') }}">DASHBOARD</a>
                        <a href="/fact-checks">FACT CHECK</a>
                        <a href="#">ABOUT US</a> {{-- Sesuaikan href jika perlu --}}
                    </div>
                    <div class="search-container">
                        <form action="{{ route('news.search') }}" method="GET" class="search-form">
                            <input type="text" name="keyword" placeholder="Search news..." value="{{ $keyword ?? '' }}"
                                class="search-input">
                            <button type="submit" class="search-button">&#128269;</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="category-menu">
                <div class="inner-category">
                    @if(isset($navCategories))
                        @foreach($navCategories as $navCategoryItem)
                            <a href="{{ route('category.show', ['category' => $navCategoryItem->slug]) }}"
                                class="{{ (isset($category) && $category->slug == $navCategoryItem->slug) ? 'active' : '' }}">
                                {{ $navCategoryItem->name }}
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="main-content-wrapper">
            <div class="search-results-container">
                <h1 class="search-results-title">Hasil Pencarian untuk: "{{ $keyword }}"</h1>

                @if ($newsList->count() > 0)
                    <div class="article-list">
                        @foreach ($newsList as $news)
                            <div class="article-item">
                                <div class="article-image">
                                    <a href="{{ url('news/' . $news->slug) }}">
                                        <img src="{{ $news->image ? asset('storage/' . $news->image) : asset('images/placeholder.png') }}"
                                            alt="{{ $news->title }}">
                                    </a>
                                </div>
                                <div class="article-text-content">
                                    @if ($news->category)
                                        <a href="{{ route('category.show', ['category' => $news->category->slug]) }}"
                                            class="news-item-category-tag category-tag-{{ $news->category->slug }}">
                                            {{ $news->category->name }}
                                        </a>
                                    @endif
                                    <h2 class="article-title">
                                        <a href="{{ url('news/' . $news->slug) }}">{{ $news->title }}</a>
                                    </h2>
                                    <p class="article-meta">
                                        <span
                                            class="article-date">{{ $news->published_at ? $news->published_at->format('d M Y - H:i') : $news->created_at->format('d M Y - H:i') }}
                                            WIB</span>
                                        @if($news->writer) | <span class="article-source">Oleh: {{ $news->writer }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Tampilkan Link Paginasi --}}
                    <div class="pagination-links">
                        {{ $newsList->links() }}
                    </div>

                @else
                    <p class="no-results">Tidak ditemukan berita yang cocok dengan kata kunci "{{ $keyword }}".</p>
                @endif
            </div>
        </div>

        {{-- Footer Anda --}}
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
    </div>
    <script src="{{ asset('js/script/dateTime.js') }}"></script>
</body>

</html>