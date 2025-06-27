@php 
$categories = App\Models\Category::with(['product', 'subcategories'])->get();
@endphp
<header class="header-area header-style-1 header-height-2">
        <div class="mobile-promotion">
            <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
        </div>
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                
                                <li>
                                    <a href="{{ auth()->check() ? route('show.profile', ['id' => auth()->user()->id]) : route('login') }}">
                                        My Cart
                                    </a>
                                </li>
                                <li><a href={{route('wishlist.page')}}>Checkout</a></li>
                                <li>
                                    <a href="{{ auth()->check() ? route('show.profile', ['id' => auth()->user()->id]) : route('login') }}">Order Tracking</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>100% Secure delivery without contacting the courier</li>
                                    <li>Supper Value Deals - Save more with coupons</li>
                                    <li>Trendy 25silver jewelry, save up 35% off today</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                               
                                <li>
                                    <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-fr.png') }}" alt="" />Français</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-dt.png') }}" alt="" />Deutsch</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-ru.png') }}" alt="" />Pусский</a>
                                        </li>
                                    </ul>
                                </li>

                                 <li>Need help? Call Us: <strong class="text-brand"> 0614598883</strong></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href={{route('home')}}><img src="{{ asset('frontend/assets/imgs/theme/log.png') }}" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        @livewire('component.search.search-section', ['categories' => $categories])
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="search-location">
                                    <form action="#">
                                        <select class="select-active">
                                            <option>Your Location</option>
                                            <option>Alabama</option>
                                            <option>Alaska</option>
                                            <option>Arizona</option>
                                            <option>Delaware</option>
                                            <option>Florida</option>
                                            <option>Georgia</option>
                                            <option>Hawaii</option>
                                            <option>Indiana</option>
                                            <option>Maryland</option>
                                            <option>Nevada</option>
                                            <option>New Jersey</option>
                                            <option>New Mexico</option>
                                            <option>New York</option>
                                        </select>
                                    </form>
                                </div>
                               
                                <livewire:component.home.wishlist-header />
                                <livewire:component.home.cart-component/>
                                <div class="header-action-icon-2">
                                    @if(auth()->check())
                                    <a href="{{route('show.profile', ['id' => auth()->user()->id])}}">
                                        <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                    </a>
                                    <a href="{{route('show.profile', ['id' => auth()->user()->id])}}"><span class="ml-0 lable">Account</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="{{route('show.profile', ['id' => auth()->user()->id])}}"><i class="mr-10 fi fi-rs-user"></i>My Account</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i class="mr-10 fi fi-rs-location-alt"></i>Order Tracking</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i class="mr-10 fi fi-rs-label"></i>My Voucher</a>
                                            </li>
                                            <li>
                                                <a href={{route('wishlist.page')}}><i class="mr-10 fi fi-rs-heart"></i>My Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i class="mr-10 fi fi-rs-settings-sliders"></i>Setting</a>
                                            </li>
                                            <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>

                                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="mr-10 fi fi-rs-sign-out"></i>Sign out
                                            </a>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    @else
                                    <a href="{{route('login')}}">
                                        <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                    </a>
                                    <a href="{{route('login')}}"><span class="ml-0 lable">Login</span></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>








        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href={{route('home')}}><img src="{{ asset('frontend/assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categories-button-active" href="#">
                                <span class="fi-rs-apps"></span>   All Categories
                                <i class="fi-rs-angle-down"></i>
                            </a>
                            <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                                        
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        @for($i = 0; $i < 10; $i+= 2)
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="{{ asset('storage/' . $categories[$i]->image) }}" alt="" />{{$categories[$i]->name}}</a>
                                        </li>
                                        @endfor
                                    </ul>
                                    <ul class="end">
                                        @for($i = 1; $i < 10; $i+= 2)
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="{{ asset('storage/' . $categories[$i]->image) }}" alt="" />{{$categories[$i]->name}}</a>
                                        </li>
                                        @endfor
                                    </ul>
                                </div>
                                @if(count($categories) > 10)
                                <div class="more_slide_open" style="display: none">
                                    <div class="d-flex categori-dropdown-inner">
                                        <ul>
                                        @for($i = 11; $i < count($categories); $i+= 2)
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="{{ asset('storage/' . $categories[$i]->image) }}" alt="" />{{$categories[$i]->name}}</a>
                                        </li>
                                        @endfor
                                            
                                        </ul>
                                        <ul class="end">
                                        @for($i = 12; $i < count($categories); $i+= 2)
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="{{ asset('storage/' . $categories[$i]->image) }}" alt="" />{{$categories[$i]->name}}</a>
                                        </li>
                                        @endfor
                                            
                                        </ul>
                                    </div>
                                </div>
                                @endif
                                <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                    
                                    <li>
                                        <a class="active" href={{route('home')}}>Home  </a>
                                        
                                    </li>
                                    <li>
                                        <a href="{{route('about.page')}}">About</a>
                                    </li>
                                    <li>
                                        <a href="{{route('shop.page')}}">Shop</a>
                                    </li>
                                    <li>
                                        <a href="{{route('vendor.list')}}">Vendors</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{route('contact.page')}}">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>


                    <div class="hotline d-none d-lg-flex">
                        <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                        <p>0614598883<span>24/7 Support Center</span></p>
                    </div>
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href={{route('wishlist.page')}}>
                                    <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                    <span class="pro-count white">4</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="#">
                                    <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count white">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('frontend/assets/imgs/shop/thumbnail-3.jpg') }}" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                                <h3><span>1 × </span>$800.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('frontend/assets/imgs/shop/thumbnail-4.jpg') }}" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                                <h3><span>1 × </span>$3500.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$383.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="shop-cart.html">View cart</a>
                                            <a href="shop-checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>