@extends('layouts.app')

@section('content')
   <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="mr-5 fi-rs-home"></i>Home</a>
                    <span></span> Pages <span></span> About us
                </div>
            </div>
        </div>
        <div class="page-content pt-50">
            <div class="container">
                <div class="row">
                    <div class="m-auto col-xl-10 col-lg-12">
                        
                        <section class="text-center mb-50">
                            <h2 class="mb-40 title style-3">What We Provide?</h2>
                            <div class="row">
                                <div class="mb-24 col-lg-4 col-md-6">
                                    <div class="featured-card">
                                        <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-1.svg') }}" alt="">
                                        <h4>Best Prices &amp; Offers</h4>
                                        <p>Enjoy unbeatable prices and exciting offers every day, making your shopping experience budget-friendly and rewarding.</p>
                                        <a href="#">Read more</a>
                                    </div>
                                </div>
                                <div class="mb-24 col-lg-4 col-md-6">
                                    <div class="featured-card">
                                        <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-2.svg') }}" alt="">
                                        <h4>Wide Assortment</h4>
                                        <p>Choose from a vast selection of products across categories to find exactly what you're looking for — all in one place.</p>
                                        <a href="#">Read more</a>
                                    </div>
                                </div>
                                <div class="mb-24 col-lg-4 col-md-6">
                                    <div class="featured-card">
                                        <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-3.svg') }}" alt="">
                                        <h4>Free Delivery</h4>
                                        <p>Get your orders delivered to your doorstep at no extra cost. Fast, reliable, and hassle-free delivery guaranteed.</p>
                                        <a href="#">Read more</a>
                                    </div>
                                </div>
                                <div class="mb-24 col-lg-4 col-md-6">
                                    <div class="featured-card">
                                        <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-4.svg') }}" alt="">
                                        <h4>Easy Returns</h4>
                                        <p>Not satisfied with your purchase? No worries — enjoy a smooth and easy return process with no hidden conditions.</p>
                                        <a href="#">Read more</a>
                                    </div>
                                </div>
                                <div class="mb-24 col-lg-4 col-md-6">
                                    <div class="featured-card">
                                        <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-5.svg') }}" alt="">
                                        <h4>100% Satisfaction</h4>
                                        <p>We are committed to ensuring your complete satisfaction with every order. Shop with confidence, every time.</p>
                                        <a href="#">Read more</a>
                                    </div>
                                </div>
                                <div class="mb-24 col-lg-4 col-md-6">
                                    <div class="featured-card">
                                        <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-6.svg') }}" alt="">
                                        <h4>Great Daily Deal</h4>
                                        <p>Discover new deals every day and save big on top products — limited-time offers you won’t want to miss.</p>
                                        <a href="#">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="row align-items-center mb-50">
                            <div class="row mb-50 align-items-center">
                                <div class="col-lg-7 pr-30">
                                    <img src="{{ asset('frontend/assets/imgs/page/about-5.png') }}" alt="" class="mb-md-3 mb-lg-0 mb-sm-4">
                                </div>
                                <div class="col-lg-5">
                                    <h4 class="mb-20 text-muted">Our performance</h4>
                                    <h1 class="mb-40 heading-1">Your Partner for e-commerce grocery solution</h1>
                                    <p class="mb-30">We deliver cutting-edge solutions that empower grocery businesses to thrive in the digital space. From optimized shopping experiences to seamless logistics, our performance is measured by your success.</p>
                                    <p>We specialize in providing end-to-end e-commerce platforms tailored for grocery businesses — combining technology, strategy, and support to help you grow faster and serve better.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                    <h3 class="mb-30">Who we are</h3>
                                    <p></p>We are a passionate team of innovators, designers, and strategists committed to transforming the grocery retail experience through digital excellence and customer-centric solutions.
                                </div>
                                <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                    <h3 class="mb-30">Our history</h3>
                                    <p>From humble beginnings to trusted industry leaders, our journey has been defined by innovation, integrity, and a relentless drive to support grocery businesses in adapting to the digital age.</p>
                                </div>
                                <div class="col-lg-4">
                                    <h3 class="mb-30">Our mission</h3>
                                    <p>Our mission is to revolutionize online grocery shopping by offering reliable, user-friendly, and scalable e-commerce platforms that meet the evolving needs of both businesses and customers.</p>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            
            
        </div>
    </main>
@endsection