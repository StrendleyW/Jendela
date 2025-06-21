<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Jendela - Indeks</title> {{-- Judul dinamis --}}
    <link rel="stylesheet" href="{{ asset('css/pages/indeks.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
    <div class="content">
        <div class="navbar">
            <div class="header">
                <div class="inner-header">
                    <div class="logo"><a href="{{ url('/') }}">JENDELA</a></div>
                    <div class="nav-links">
                        <a href="{{ url('/') }}">DASHBOARD</a>
                        <a href="/fact-checks">FACT CHECK</a>
                        <a href="#">ABOUT US</a>
                    </div>
                    <div class="search-container">
                        <form action="{{ route('news.search') }}" method="GET" class="search-form">
                            <input type="text" name="keyword" placeholder="Search news..." class="search-input">
                            {{-- Ganti emoji dengan ikon dari Font Awesome --}}
                            <button type="submit" class="search-button">
                                <i class="fas fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

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
            <div class="politic-category-container">
                <h1 class="category-title">Indeks</h1>
                <div class="article-list">
                    <div class="filter-container">
                        <form action="{{ route('news.index') }}" method="GET" id="filter-form">
                            <div class="filter-group">
                                <select name="category" onchange="this.form.submit()">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($allCategories as $category)
                                        <option value="{{ $category->slug }}" {{ $selectedCategorySlug == $category->slug ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter-group">
                                <input type="date" name="date" value="{{ $selectedDate ?? '' }}"
                                    onchange="this.form.submit()">
                            </div>

                            <a href="{{ route('news.index') }}" class="clear-filter-btn">Hapus Filter</a>
                        </form>
                    </div>

                    {{-- Loop untuk menampilkan berita --}}
                    @forelse ($newsList as $news)
                        <div class="article-item">
                            <div class="article-image">
                                <a href="{{ url('news/' . $news->slug) }}">
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
                                </a>
                            </div>
                            <div class="article-text-content">
                                {{-- Tambahkan blok untuk menampilkan tag kategori --}}
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
                                    <span class="article-date">{{ $news->published_at->format('d M Y') }}</span> |
                                    <span class="article-source">Oleh: {{ $news->writer }}</span>
                                </p>
                            </div>
                        </div>
                    @empty
                        <p>Belum ada berita dalam kategori ini.</p> {{-- Pesan jika tidak ada berita --}}
                    @endforelse
                    <div class="pagination-links">
                        {{ $newsList->links() }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer (Sama seperti dashboard) --}}
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
    </div>
    <script src="{{ asset('js/script/dateTime.js') }}"></script> {{-- Pastikan path JS benar --}}
</body>

</html>