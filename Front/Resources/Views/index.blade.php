@extends('Front::layout.master')
@section('content')
    <main id="index">
    <article class="container article">

        @include('Front::layout.header-ads')

        @include('Front::layout.top-info')
        @include('Front::layout.latestProducts')
        @include('Front::layout.popularProducts')
        @include('Front::layout.popularArticles')
    </article>
    <main id="single">
@endsection
