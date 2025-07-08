@props([
    'data' => range(1, 3),
    'title' => 'Lists of card title',
    'resourceUrl' => '/',
    'isSection' => false,
])

<section id="culture-category" class="culture-category section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <div class="section-title-container d-flex align-items-center justify-content-between">
            @if (request()->query('category'))
                <h3 class="text-capitalize">Category Berita: {{ request()->query('category') }}</h3>
            @else
                <h3>{{ $title }}</h3>
            @endif
            @if ($isSection == true)
                <p><a href="{{ $resourceUrl }}">Lihat Semua</a></p>
            @endif
        </div>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
            @forelse ($data as $d)
                <div class="col-lg-4">
                    <div class="post-list border-bottom">
                        <a href="{{ $resourceUrl . '/' . $d->slug }}">
                            {{-- <img src="{{ Str::startsWith($d->cover_image, 'https://') ? $d->cover_image : asset('assets/img/'.$d->cover_image) }}" alt="{{ $d->title }}" class="img-fluid"> --}}
                            <img src="{{ Str::startsWith($d->cover_image, 'https://') ? $d->cover_image : Storage::url($d->cover_image) }}"
                                alt="{{ $d->title }}" class="img-fluid">

                        </a>
                        <div class="post-meta">
                            <a href="{{ $resourceUrl . '?category=' . ($d->category ?? $d->status) }}" class="date">
                                @isset($d->status)
                                    <span class="bg-dark text-white rounded text-xs px-1">{{ $d->status }}</span>
                                @else
                                    <span>{{ $d->category }}</span>
                                @endisset
                            </a> <span class="mx-1">•</span>
                            <i class="bi bi-clock"></i>
                            @isset($d->published_at)
                                <span>{{ \Carbon\Carbon::parse($d->published_at)->format('d F Y') }}</span>
                            @else
                                <span>{{ \Carbon\Carbon::parse($d->start_date)->format('d F Y') }} -
                                    {{ \Carbon\Carbon::parse($d->end_date)->format('d F Y') }}</span>
                            @endisset
                        </div>
                        <h2 class="mb-2">
                            <a href="{{ $resourceUrl . '/' . $d->slug }}">
                                {{ $d->title }}
                            </a>
                        </h2>
                        @isset($d->location)
                            <span class="author mb-3 d-block">
                                <i class="bi bi-geo"></i>
                                {{ $d->location }}
                            </span>
                        @endisset
                        <p class="mb-4 d-block">
                            {{ $d->excerpt }}
                        </p>
                    </div>

                </div>
            @empty
                <p class="text-center">No recent events available.</p>
            @endforelse
        </div>
        {{ $data instanceof \Illuminate\Pagination\LengthAwarePaginator ? $data->links('vendor.pagination.bootstrap-5') : '' }}

    </div>

</section>
