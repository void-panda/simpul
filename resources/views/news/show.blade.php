@extends('layouts.app')

@section('content')
    <section id="blog-details" class="blog-details section">
        <div class="container">

            <article class="article">

                <div class="post-img" style="aspect-ratio: 15/5; overflow: hidden;">
                    {{-- <img style="width: 100%; height: 100%; object-fit: cover;" src="{{ Str::startsWith($news->cover_image, 'https://') ? $news->cover_image : asset('assets/img/'.$news->cover_image) }}" alt="{{ $news->title }}" class="img-fluid"> --}}
                    <img style="width: 100%; height: 100%; object-fit: cover;"
                        src="{{ Str::startsWith($news->cover_image, 'http') ? $news->cover_image : Storage::url($news->cover_image) }}"
                        alt="{{ $news->title }}" class="img-fluid">

                </div>

                <h1 class="title">{{ $news->title }}</h1>

                <div class="meta-top">
                    <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                            <span>{{ \Carbon\Carbon::parse($news->published_at)->format('d F Y') }}</span>
                        </li>
                        <li class="d-flex align-items-center"><i class="bi bi-tag"></i>
                            <a href="{{ route('news.index', ['category' => $news->category]) }}">
                                {{ $news->category }}
                            </a>
                        </li>
                    </ul>
                </div><!-- End meta top -->

                <div class="content">
                    {!! $news->content !!}
                </div><!-- End post content -->

                <div class="meta-bottom">
                    <i class="bi bi-folder"></i>
                    <ul class="cats">
                        <li><a href="#">Business</a></li>
                    </ul>

                    <i class="bi bi-tags"></i>
                    <ul class="tags">
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">Tips</a></li>
                        <li><a href="#">Marketing</a></li>
                    </ul>
                </div><!-- End meta bottom -->

            </article>

        </div>
    </section>
@endsection
