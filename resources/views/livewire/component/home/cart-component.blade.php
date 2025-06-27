<div class="header-action-icon-2">
                <a class="mini-cart-icon" href="{{route('cart.page')}}">
                    <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                    <span class="pro-count blue">{{count($carts)}}</span>
                </a>
                <a href="{{route('cart.page')}}"><span class="lable">Cart</span></a>
                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                                            <ul>
                                                                @foreach ( $carts as $cart )    
                                                                <li wire:key="{{ $cart['product_id'] }}">
                                                                    <div class="shopping-cart-img">
                                                                        <a href="#"><img alt="Nest" src="{{ asset('storage/' . $cart['photo']) }}" /></a>
                                                                    </div>
                                                                    <div class="shopping-cart-title">
                                                                        <h4><a href="#">{{$cart['name']}}</a></h4>
                                                                        <h4><span>{{$cart['qty']}} × </span>${{$cart['price']}}</h4>
                                                                    </div>
                                                                    <div wire:click="remove({{$cart['product_id']}})" class="shopping-cart-delete">
                                                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                                
                                                            </ul>
                                                        <div class="shopping-cart-footer">
                                                            <div class="shopping-cart-total">
                                                                <h4>Total <span>${{$total}}</span></h4>
                                                            </div>
                                                            <div class="shopping-cart-button">
                                                                <a href="{{route('cart.page')}}" class="outline">View cart</a>
                                                                <a href="shop-checkout.html">Checkout</a>
                                                            </div>
                                                        </div>
                </div>
</div>