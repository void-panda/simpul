@extends('layouts.app')

@section('content')
    <section id="blog-details" class="blog-details section">
        <div class="container">

            <article class="article">

                <div class="post-img" style="aspect-ratio: 15/5; overflow: hidden;">
                    {{-- <img style="width: 100%; height: 100%; object-fit: cover;" src="{{ Str::startsWith($event->cover_image, 'https://') ? $event->cover_image : asset('assets/img/'.$event->cover_image) }}" alt="{{ $event->title }}" class="img-fluid"> --}}
                    <img style="width: 100%; height: 100%; object-fit: cover;"
                        src="{{ Str::startsWith($event->cover_image, 'http') ? $event->cover_image : Storage::url($event->cover_image) }}"
                        alt="{{ $event->title }}" class="img-fluid">

                </div>

                <h1 class="title">{{ $event->title }}</h1>

                <div class="meta-top">
                    <ul>
                        <li class="d-flex align-items-center">
                            <span class="bg-dark px-2 text-sm rounded text-white">{{ $event->status }}</span>
                        </li>
                        <li class="d-flex align-items-center"><i class="bi bi-calendar"></i>
                            <span>{{ \Carbon\Carbon::parse($event->start_date)->format('d F Y') }} -
                                {{ \Carbon\Carbon::parse($event->end_date)->format('d F Y') }}</span>
                        </li>
                        <li class="d-flex align-items-center"><i class="bi bi-geo"></i>
                            <span href="{{ route('news.index', ['category' => $event->category]) }}">
                                {{ $event->location }}
                            </span>
                        </li>
                    </ul>
                </div><!-- End meta top -->

                <div class="content">
                    {!! $event->description !!}
                </div><!-- End post content -->

                @if ($event->status == 'upcoming')
                    <div class="mt-5">
                        <a href="{{ route('donation.index') }}" class="btn btn-primary">Meriahkan Kegiatan</a>
                    </div>
                @endif

            </article>

        </div>
    </section>
@endsection
