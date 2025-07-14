@extends('layouts.app')

@section('content')

@include('partials.about', ['community' => $community])
@include('partials.partners', ['partners' => $partners])
@include('partials.achievements')
@include('partials.community-diagram')
@include('partials.trending-news', ['trendingNews' => $trendingNews])

@endsection
