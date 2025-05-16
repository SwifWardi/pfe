
<section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn" wire:ignore> 
                    <h3> New Products </h3>
                    <ul class="nav nav-tabs links" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button  wire:click="setCategory('all')" class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                        </li>

                        @for($i=0; $i <= 6 ;$i++)
                        <li class="nav-item" role="presentation">
                        <button wire:click="setCategory({{$categories[$i]->id}})" class="nav-link" id="nav-tab-{{$i}}" data-bs-toggle="tab" data-bs-target="#tab-{{$i}}" type="button" role="tab" aria-controls="tab-{{$i}}" aria-selected="false">{{$categories[$i]->name}}</button>
                        </li>
                        @endfor
                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">    
                    <div class="row product-grid-4">
                            @foreach ($products->take(10) as $index => $product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                @php
                                if($index == 5)
                                $index = 0
                                @endphp
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".{{$index+1}}s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.page', ['id' => $product->id])}}">
                                                <img class="default-img" src="{{ asset('storage/' . $product->thambnail) }}" alt="" />
                                                @if ($product->photos)
                                                <img class="hover-img" src="{{ asset('storage/' . $product->photos?->first()?->src) }}" alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <livewire:component.home.product-actions :product="$product" />
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{ $product->category?->name}}</a>
                                        </div>
                                        <h2><a class="truncate-2-lines" href="{{route('product.page', ['id' => $product->id])}}">{{$product->name}}</a></h2>
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
                                                <a class="add" href="shop-cart.html"><i class="mr-5 fi-rs-shopping-cart"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end product card-->
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>

                    @for($i=0; $i <= 6; $i++)
                    <div class="tab-pane fade" id="tab-{{$i}}" role="tabpanel" aria-labelledby="tab-{{$i}}">
                        <div class="row product-grid-4">
                        @foreach ($products->take(10) as $product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.page', ['id' => $product->id])}}">
                                                <img class="default-img" src="{{ asset('storage/' . $product->thambnail) }}" alt="" />
                                                @if ($product->photos)
                                                <img class="hover-img" src="{{ asset('storage/' . $product->photos?->first()?->src) }}" alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <livewire:component.home.product-actions :product="$product" />
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{ $product->category?->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.page', ['id' => $product->id])}}">{{$product->name}}</a></h2>
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
                                                <a class="add" href="shop-cart.html"><i class="mr-5 fi-rs-shopping-cart"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end product card-->
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    @endfor
                </div>
                <!--End tab-content-->
            </div>
        </section>