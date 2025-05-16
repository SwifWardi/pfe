@extends("layouts.app")

@section("content")
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="mr-5 fi-rs-home"></i>Home</a>
                    <span></span> Shop <span></span> Fillter
                </div>
            </div>
        </div>
        <div class="container mb-30 mt-50">
        <livewire:frontend.wishlist-row />
        </div>
</main>
@endsection