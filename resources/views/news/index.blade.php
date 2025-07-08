@extends('layouts.app')

@section('content')
    {{-- HERO --}}
    <div class="text-center my-5">
        @if (request()->query('category'))
            <h1 class="display-5 text-capitalize">Category Berita: {{ request()->query('category') }}</h1>
        @elseif (request()->query('search'))
            <h1 class="display-5 text-capitalize">Kata kunci pencarian: {{ request()->query('search') }}</h1>
        @else
            <h1 class="display-5">Semua Berita</h1>
        @endif
        <p class="lead text-muted">Temukan berita-berita terbaru dari kami.</p>
    </div>
    <div class="text-center container mt-5 py-2">
        <form method="GET">
            <input name="search" type="search" placeholder="Temukan berita..." class="form-control form-control-lg">
        </form>
    </div>

    @include('partials.card-lists', ['title' => 'Semua Berita', 'data' => $news, 'resourceUrl' => '/news'])
@endsection
