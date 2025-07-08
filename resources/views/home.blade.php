@extends('layouts.app')

@section('content')
    @include('partials.slider', ['news' => $news])
    
    @include('partials.about', ['community' => $community])

    @include('partials.trending-news', ['trendingNews' => $news])
    
    @include('partials.card-lists', ['title' => 'Event Terkini', 'data' => $events, 'resourceUrl' => '/events'])
@endsection
