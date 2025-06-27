@foreach ($showedCategories as $category)
<section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>{{$category->name}} Category </h3>
                   
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">


@php
    $products = App\Models\product::with(['photos', 'category', 'vendor'])->where('category_id', $category->id)->inRandomOrder()->take(6)->get();
@endphp
                            @foreach($products as $index => $product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".{{$index+1}}s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.page', ['id' => $product->id])}}">
                                                <img class="default-img" src="{{ asset('storage/' . $product->thambnail) }}" alt="" />
                                                <img class="hover-img" src="{{ asset('storage/' . $product->photos?->first()?->src ) }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" href={{route('wishlist.page')}}><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            <a aria-label="Quick view" class="action-btn" onclick="quickView({{$product->id}})"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{$product->category->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.page', ['id' => $product->id])}}">{{$product->name}} </a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="ml-5 font-small text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">{{$product->vendor ? $product->vendor->name : 'Admin'}}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            @if ($product->discount_price)                                        
                                            <div class="product-price">
                                                <span>{{$product->discount_price}} MAD</span>
                                                <span class="old-price">{{$product->selling_price}} MAD</span>
                                            </div>
                                            @else
                                            <div class="product-price">
                                                <span>{{$product->selling_price}} MAD</span>
                                            </div>
                                            @endif
                                            <div class="add-cart">
                                                <a class="add" href="{{route('cart.page')}}"><i class="mr-5 fi-rs-shopping-cart"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!--end product card-->
                           
                        </div>
                        <!--End product-grid-4-->
                    </div>
                   
                   
                </div>
                <!--End tab-content-->
            </div>


</section>
@endforeach