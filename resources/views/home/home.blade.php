@extends('layouts.app')

@section('content')
    <main class="main">
        @include('partials.home-slider')
        @include('partials.popular-category')
        @include('partials.banners')
        <livewire:frontend.new-products :categories="$categories" />
        @include('partials.featured-products', ['fproduct' => $fproduct])
        @include('partials.showed-categories', ['showedCategories' => $showedCategories])
        @include('partials.all-vendor')
    </main>
@endsection


