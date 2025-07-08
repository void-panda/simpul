@props([
    'trendingNews' => \App\Models\News::latest('published_at')->skip(3)->take(3)->get(),
    'asideNews' => \App\Models\News::latest('published_at')->skip(6)->take(5)->get(),
])
<section id="culture-category" class="culture-category section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <div class="section-title-container d-flex align-items-center justify-content-between">
            <h2>Berita Tranding</h2>
            <p><a href="categories.html">Lihat Semua</a></p>
        </div>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
            <div class="col-md-9">

                <div class="d-lg-flex post-entry">
                    <a href="{{ route('news.show', $trendingNews[0]->slug) }}" style="aspect-ratio: 7/4;"
                        class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block bg-primary">
                        {{-- <img src="{{ Str::startsWith($trendingNews[0]->cover_image, 'https://') ? $trendingNews[0]->cover_image : asset('assets/img/'.$trendingNews[0]->cover_image) }}" alt="{{ $trendingNews[0]->title }}" class="img-fluid"> --}}
                        <img style="width: 100%; height: 100%; object-fit: cover;"
                            src="{{ Str::startsWith($trendingNews[0]->cover_image, 'http') ? $trendingNews[0]->cover_image : Storage::url($trendingNews[0]->cover_image) }}"
                            alt="{{ $trendingNews[0]->title }}" class="img-fluid">
                    </a>
                    <div>
                        <div class="post-meta">
                             <a href="{{ route('news.index', ['category' => $trendingNews[0]->category]) }}" class="date">
                                {{ $trendingNews[0]->category }}
                            </a> <span class="mx-1">•</span>
                            <span>{{ \Carbon\Carbon::parse($trendingNews[0]->published_at)->format('d F Y') }}</span>
                        </div>
                        <h3>
                            <a href="{{ route('news.show', $trendingNews[0]->slug) }}">
                                {{ $trendingNews[0]->title }}
                            </a>
                        </h3>
                        <p>
                            {{ $trendingNews[0]->excerpt }}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="post-list border-bottom">
                            <a href="{{ route('news.show', $trendingNews[1]->slug) }}"><img src="{{ asset('assets/img/1.jpg') }}" alt=""
                                    class="img-fluid"></a>
                            <div class="post-meta">
                                <a href="{{ route('news.index', ['category' => $trendingNews[1]->category]) }}" class="date">
                                    {{ $trendingNews[1]->category }}
                                </a> <span class="mx-1">•</span>
                                <span>{{ \Carbon\Carbon::parse($trendingNews[1]->published_at)->format('d F Y') }}</span>
                            </div>
                            <h2 class="mb-2">
                                <a href="{{ route('news.show', $trendingNews[1]->slug) }}">
                                {{ $trendingNews[1]->title }}
                                </a>
                            </h2>
                            <p class="mb-4 d-block">
                                {{ $trendingNews[1]->excerpt }}
                            </p>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="post-list border-bottom">
                            <a href="{{ route('news.show', $trendingNews[2]->slug) }}"><img src="{{ asset('assets/img/2.jpg') }}" alt=""
                                    class="img-fluid"></a>
                            <div class="post-meta">
                                <a href="{{ route('news.index', ['category' => $trendingNews[2]->category]) }}" class="date">
                                    {{ $trendingNews[2]->category }}
                                </a> <span class="mx-1">•</span>
                                <span>{{ \Carbon\Carbon::parse($trendingNews[2]->published_at)->format('d F Y') }}</span>
                            </div>
                            <h2 class="mb-2">
                                <a href="{{ route('news.show', $trendingNews[2]->slug) }}">
                                {{ $trendingNews[2]->title }}
                                </a>
                            </h2>
                            <p class="mb-4 d-block">
                                {{ $trendingNews[2]->excerpt }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- news aside --}}
            <div class="col-md-3">
                @forelse ($asideNews as $a)
                    <div class="post-list border-bottom">
                        <div class="post-meta">
                            <a href="{{ route('news.index', ['category' => $a->category]) }}" class="date">
                                {{ $a->category }}
                            </a> <span class="mx-1">•</span>
                            <span>{{ \Carbon\Carbon::parse($a->published_at)->format('d F Y') }}</span>
                        </div>
                        <h2 class="mb-2">
                            <a href="{{ route('news.show', $a->slug) }}">
                                {{ $a->title }}
                            </a>
                        </h2>
                        <p class="mb-4 d-block">
                            {!! mb_substr($a->excerpt, 0, 50) . '...' !!}
                        </p>
                    </div>
                @empty
                    <p class="text-center">No News available</p>
                @endforelse
            </div>
            {{-- end news aside --}}
        </div>

    </div>

</section>
