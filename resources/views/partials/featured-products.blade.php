<section class="pb-5 section-padding">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn">
                    <h3 class=""> Featured Products </h3>
                     
                </div>
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                        <div class="banner-img style-2">
                            <div class="banner-text">
                                <h2 class="mb-100">Bring nature into your home</h2>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                        @foreach($fproduct as $product)
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{route('product.page', ['id' => $product->id])}}">
                                                        <img class="default-img" src="{{ asset('storage/' . $product->thambnail) }}" alt="{{$product->name}}" />
                                                        <img class="hover-img" src="{{ asset('storage/' . $product->photos?->first()?->src) }}" alt="{{$product->name}}" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" onclick="quickView({{$product->id}})"> <i class="fi-rs-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Save {{Round(($product->discount_price * 100) / $product->selling_price)}}%</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">{{$product->vendor ? $product->vendor->name : 'Admin'}}</a>
                                                </div>
                                                <h2><a class="truncate-2-lines" href="{{route('product.page', ['id' => $product->id])}}">{{$product->name}}</a></h2>
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>
                                                <div class="mt-10 product-price">
                                                @if ($product->discount_price)    
                                                <span>{{$product->discount_price}} MAD</span>
                                                <span class="old-price">{{$product->selling_price}} MAD</span>
                                                @else
                                                <span>{{$product->selling_price}} MAD</span>
                                                @endif
                                                </div>
                                                <div class="sold mt-15 mb-15">
                                                    <div class="mb-5 progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span class="font-xs text-heading"> Sold: 90/120</span>
                                                </div>
                                                <a href="shop-cart.html" class="btn w-100 hover-up"><i class="mr-5 fi-rs-shopping-cart"></i>Add To Cart</a>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!--End product Wrap-->                                
                                    </div>
                                </div>
                            </div>
                            <!--End tab-pane-->

                           
                        </div>
                        <!--End tab-content-->
                    </div>
                    <!--End Col-lg-9-->
                </div>
            </div>
        </section>