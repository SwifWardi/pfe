<div class="row">
                <div class="m-auto col-xl-10 col-lg-12">
                    <div class="mb-50">
                        <h1 class="mb-10 heading-2">Your Wishlist</h1>
                        <h6 class="text-body">There are <span class="text-brand">{{count($wishlist)}}</span> products in this list</h6>
                    </div>
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">
                                    <th class="custome-checkbox start pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                        <label class="form-check-label" for="exampleCheckbox11"></label>
                                    </th>
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock Status</th>
                                    <th scope="col">Action</th>
                                    <th scope="col" class="end">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wishlist as $wishproduct )
                                <tr wire:key="wishlist-{{ $wishproduct->product_id ?? $wishproduct->id }}" class="pt-30">
                                    <td class="custome-checkbox pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                        <label class="form-check-label" for="exampleCheckbox1"></label>
                                    </td>
                                    <td class="pt-40 image product-thumbnail"><img src="{{asset('storage/'. ($wishproduct->product->thambnail ?? $wishproduct->thambnail) )}}" alt="#" /></td>
                                    <td class="product-des product-name">
                                        <h6><a class="mb-10 product-name" href="shop-product-right.html">{{$wishproduct->product->name ?? $wishproduct->name}}</a></h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="ml-5 font-small text-muted"> (4.0)</span>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h3 class="text-brand">${{auth()->check() ? $wishproduct->product->discount_price ?? $wishproduct->product->selling_price : $wishproduct->discount_price ?? $wishproduct->selling_price}}</h3>
                                    </td>
                                    <td class="text-center detail-info" data-title="Stock">
                                    {!! ($wishproduct->product->qty ?? $wishproduct->qty ) > 0 
                                        ? '<span class="mb-0 stock-status in-stock">In Stock</span>' 
                                        : '<span class="mb-0 stock-status out-stock">Out Of Stock</span>' 
                                    !!}
                                    </td>
                                    {!! ($wishproduct->product->qty ?? $wishproduct->qty ) > 0 
                                    ? '<td wire:click="save({{ $wishproduct->product_id ?? $wishproduct->id }})" class="text-right" data-title="Cart">
                                        <button class="btn btn-sm">Add to cart</button>
                                    </td>'
                                    : '<td class="text-right" data-title="Cart">
                                        <button class="btn btn-sm" style="background-color: orange;">Contact Us</button>
                                    </td>'
                                    !!}
                                    <td class="text-center action" data-title="Remove">
                                    <a @click.prevent wire:click="remove({{$wishproduct->product_id ?? $wishproduct->id}})" href="#" class="text-body"><i class="fi-rs-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
