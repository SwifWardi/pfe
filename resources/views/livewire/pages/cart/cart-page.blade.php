<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="mr-5 fi-rs-home"></i>Home</a>
                    <span></span> Shop
                    <span></span> Cart
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="mb-40 col-lg-8">
                    <h1 class="mb-10 heading-2">Your Cart</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span class="text-brand">{{count($cartItems)}}</span> products in your cart</h6>
                        <h6 class="text-body"><a href="#" class="text-muted"><i class="mr-5 fi-rs-trash"></i>Clear Cart</a></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">
                                    <th class="custome-checkbox start pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                        <label class="form-check-label" for="exampleCheckbox11"></label>
                                    </th>
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col" class="end">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                @php
                                if(!Auth::check()){
                                    $item = $item->product;
                                }
                                
                                @endphp
                                <tr class="pt-30">
                                    <td class="custome-checkbox pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                        <label class="form-check-label" for="exampleCheckbox1"></label>
                                    </td>
                                    <td class="pt-40 image product-thumbnail"><img src="{{asset('storage/' . $item->photo)}}" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h6 class="mb-5"><a class="mb-10 product-name text-heading" href="shop-product-right.html">{{$item->name}}</a></h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <span class="ml-5 font-small text-muted"> (4.0)</span>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-body">${{$item->price}} </h4>
                                    </td>
                                    <td class="text-center detail-info" data-title="Stock">
                                        <h4> {{$item->qty}} </h4>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-brand">${{$item->qty * $item->price}} </h4>
                                    </td>
                                    <td class="text-center action" data-title="Remove"><a href="#" wire:click="removeItem({{$item->id}})" class="text-body"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                   

                    @livewire('component.coupon-component', ['subtotal' => $this->subtotal])
                </div>
                 
            </div>
        </div>
    </main>