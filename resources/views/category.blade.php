<h2>Berita dalam Kategori: {{ $category->name }}</h2>

@foreach($newsList as $news)
    <div class="news-item">
        <h3>{{ $news->title }}</h3>
        <p>{{ Str::limit($news->content_news, 100) }}</p>
        <a href="{{ route('news.show', $news->slug) }}">Baca Selengkapnya</a>
    </div>
@endforeach

{{ $newsList->links() }} {{-- pagination --}}
