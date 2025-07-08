@extends('layouts.app')

@section('content')

@include('partials.about', ['community' => $community])
@include('partials.trending-news', ['trendingNews' => $trendingNews])

@endsection
