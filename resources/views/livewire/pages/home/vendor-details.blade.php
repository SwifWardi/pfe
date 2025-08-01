    <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow"><i class="mr-5 fi-rs-home"></i>Home</a>
                        <span></span> Store <span></span> SoButik Food
                    </div>
                </div>
            </div>
            <div class="container mb-30">
                <div class="text-center archive-header-2 pt-80 pb-50">
                    <h1 class="display-2 mb-50">SoButik Food Store</h1>
                    
                </div>
                <div class="flex-row-reverse row">
                    <div class="col-lg-4-5">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p>We found <strong class="text-brand">29</strong> items for you!</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="mr-10 sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" wire:click.prevent="$set('perPage', 50)">50</a></li>
                                            <li><a wire:click.prevent="$set('perPage', 100)">100</a></li>
                                            <li><a wire:click.prevent="$set('perPage', 150)">150</a></li>
                                            <li><a wire:click.prevent="$set('perPage', 200)">200</a></li>
                                            <li><a wire:click.prevent="$set('perPage', 'all')">All</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                           <li><a wire:click.prevent="$set('sortBy', 'featured')">Featured</a></li>
                                            <li><a wire:click.prevent="$set('sortBy', 'price_low_high')">Price: Low to High</a></li>
                                            <li><a wire:click.prevent="$set('sortBy', 'price_high_low')">Price: High to Low</a></li>
                                            <li><a wire:click.prevent="$set('sortBy', 'newest')">Newest</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid">
                            @foreach ($products as $product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6" wire:key="product-{{ $product->id }}">
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.page', ['id' => $product->id])}}">
                                                <img class="default-img" src="{{asset('storage/' . $product->thambnail)}}" alt="" />
                                            </a>
                                        </div>
                                        
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{$product->category->name}}</a>
                                        </div>
                                        <h2><a class="truncate-2-lines" href="{{route('product.page', ['id' => $product->id])}}">{{$product->name}}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 50%"></div>
                                            </div>
                                            <span class="ml-5 font-small text-muted"> (2.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="{{route('vendor.details', ['id' => $product->vendor_id])}}">{{$product->vendor->name}}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            @if ($product->discount_price)     
                                            <div class="product-price">
                                                <span>${{$product->discount_price}}</span>
                                                <span class="old-price">${{$product->selling_price}}</span>
                                            </div>
                                            @else
                                            <div class="product-price">
                                                <span>${{$product->selling_price}}</span>
                                            </div>
                                            @endif
                                            <div class="add-cart">
                                                <a class="add" href="{{route('cart.page')}}"><i class="mr-5 fi-rs-shopping-cart"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end product card-->
                            @endforeach

                        </div>
                        <!--product grid-->
                        @if(method_exists($products, 'links'))    
                        <div class="mt-20 mb-20 pagination-area">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                {{$products->links('vendor.livewire.vendor-links')}}
                                </ul>
                            </nav>
                        </div>
                        @endif
                    
                        <!--End Deals-->
                    </div>
                    <div wire:ignore class="col-lg-1-5 primary-sidebar sticky-sidebar">
                        <div class="border-0 sidebar-widget widget-store-info mb-30 bg-3">
                            <div class="vendor-logo mb-30">
                                <img src="assets/imgs/vendor/vendor-16.png" alt="" />
                            </div>
                            <div class="vendor-info">
                                <div class="product-category">
                                    <span class="text-muted">Since 2012</span>
                                </div>
                                <h4 class="mb-5"><a href="vendor-details-1.html" class="text-heading">{{$user->username}}</a></h4>
                                <div class="product-rate-cover mb-15">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="ml-5 font-small text-muted"> (4.0)</span>
                                </div>
                                <div class="vendor-des mb-30">
                                    <p class="font-sm text-heading">Got a smooth, buttery spread in your fridge? Chances are good that it's Good Chef. This brand made Lionto's list of the most popular grocery brands across the country.</p>
                                </div>
                                <div class="mb-20 follow-social">
                                    <h6 class="mb-15">Follow Us</h6>
                                    <ul class="social-network">
                                        <li class="hover-up">
                                            <a href="#">
                                                <img src="assets/imgs/theme/icons/social-tw.svg" alt="" />
                                            </a>
                                        </li>
                                        <li class="hover-up">
                                            <a href="#">
                                                <img src="assets/imgs/theme/icons/social-fb.svg" alt="" />
                                            </a>
                                        </li>
                                        <li class="hover-up">
                                            <a href="#">
                                                <img src="assets/imgs/theme/icons/social-insta.svg" alt="" />
                                            </a>
                                        </li>
                                        <li class="hover-up">
                                            <a href="#">
                                                <img src="assets/imgs/theme/icons/social-pin.svg" alt="" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="vendor-info">
                                    <ul class="mb-20 font-sm">
                                        <li><img class="mr-5" src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>{{$user->address}}</span></li>
                                        <li><img class="mr-5" src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call Us:</strong><span>{{$user->phone}}</span></li>
                                    </ul>
                                    <a href="vendor-details-1.html" class="btn btn-xs">Contact Seller <i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div wire:ignore class="sidebar-widget widget-category-2 mb-30">
                            <h5 class="section-title style-1 mb-30">Category</h5>
                            <ul>
                                @foreach ($categories as $category)    
                                <li>
                                    <a wire:click.prevent="$set('selectedCategory', {{$category->id}})" > <img src="{{asset('storage/' . $category->image)}}" alt="" />{{$category->name}}</a><span class="count-cat" >{{$category->products_count}}</span>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- Fillter By Price -->
                        <div class="sidebar-widget price_range range mb-30">
                            <h5 class="section-title style-1 mb-30">Fill by price</h5>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range" class="mb-20"></div>
                                    <div class="d-flex justify-content-between">
                                        <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong></div>
                                        <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong></div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group">
                                <div class="mt-10 mb-10 list-group-item">
                                    <label class="fw-900">Color</label>
                        <div class="custome-checkbox">
                              @foreach ($this->productsColors as $color)    
                            <input class="form-check-input" type="checkbox" wire:model="selectedColors" value="{{$color}}" id="color{{$color}}" />
                            <label class="form-check-label" for="color{{$color}}"><span>{{$color}}</span></label>
                            <br />
                            @endforeach
                            <!-- <input class="form-check-input" type="checkbox" wire:model="selectedColors" value="Red" id="colorRed" />
                            <label class="form-check-label" for="colorRed"><span>Red (56)</span></label>
                            <br />

                            <input class="form-check-input" type="checkbox" wire:model="selectedColors" value="Green" id="colorGreen" />
                            <label class="form-check-label" for="colorGreen"><span>Green (78)</span></label>
                            <br />

                            <input class="form-check-input" type="checkbox" wire:model="selectedColors" value="Blue" id="colorBlue" />
                            <label class="form-check-label" for="colorBlue"><span>Blue (54)</span></label> -->
                        </div>
                                    
                        
                                </div>
                            </div>
                            <a href="javascript:void(0)" wire:click="filter" class="btn btn-sm btn-default"><i class="mr-5 fi-rs-filter"></i> Fillter</a>
                        </div>
                        <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                            <img src="assets/imgs/banner/banner-11.png" alt="" />
                            <div class="banner-text">
                                <span>Oganic</span>
                                <h4>
                                    Save 17% <br />
                                    on <span class="text-brand">Oganic</span><br />
                                    Juice
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>