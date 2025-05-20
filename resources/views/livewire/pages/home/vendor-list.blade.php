 <main class="main pages mb-80">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="mr-5 fi-rs-home"></i>Home</a>
                    <span></span> Vendors List
                </div>
            </div>
        </div>
        <div class="page-content pt-50">
            <div class="container">
                <div class="text-center archive-header-2">
                    <h1 class="display-2 mb-50">Vendors List</h1>
                    <div class="row">
                        <div class="mx-auto col-lg-5">
                            <div class="sidebar-widget-2 widget_search mb-50">
                                <div class="search-form" >
                                    <form wire:submit.prevent="search" >
                                        <input type="text" wire:model="query" placeholder="Search vendors (by name or ID)..." />
                                        <button wire:click="search" type="submit"><i class="fi-rs-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-50">
                    <div class="mx-auto col-12 col-lg-8">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p>We have <strong class="text-brand">{{count($vendors)}}</strong> vendors in page</p>
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
                                            <li><a class="{{ $paginateNum == 1 ? 'active' : '' }}" href="javascript:void(0)" wire:click="updatePaginate(1)">1</a></li>
                                            <li><a class="{{ $paginateNum == 2 ? 'active' : '' }}" href="javascript:void(0)" wire:click="updatePaginate(2)">2</a></li>
                                            <li><a class="{{ $paginateNum == 5 ? 'active' : '' }}" href="javascript:void(0)" wire:click="updatePaginate(150)">5</a></li>
                                            <li><a class="{{ $paginateNum == 10 ? 'active' : '' }}" href="javascript:void(0)" wire:click="updatePaginate(200)">10</a></li>
                                            <li><a class="{{ $paginateNum == 'all' ? 'active' : '' }}" href="javascript:void(0)" wire:click="updatePaginate('all')">All</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- <div class="sort-by-cover">
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
                                            <li><a class="active" href="#">Mall</a></li>
                                            <li><a href="#">Featured</a></li>
                                            <li><a href="#">Preferred</a></li>
                                            <li><a href="#">Total items</a></li>
                                            <li><a href="#">Avg. Rating</a></li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>


                
                <div class="row vendor-grid">
                    @foreach ($vendors as $vendor)    
                    <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                        <div class="mb-40 vendor-wrap">
                            <div class="vendor-img-action-wrap">
                                <div class="vendor-img">
                                    <a href="{{route('vendor.details', ['id' => $vendor->id])}}">
                                        <img class="default-img" src="{{asset('storage/' . $vendor->photo)}}" alt="" />
                                    </a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Mall</span>
                                </div>
                            </div>
                            <div class="vendor-content-wrap">
                                <div class="d-flex justify-content-between align-items-end mb-30">
                                    <div>
                                        <div class="product-category">
                                            <span class="text-muted">Since 2012</span>
                                        </div>
                                        <h4 class="mb-5"><a href="{{route('vendor.details', ['id' => $vendor->id])}}">{{$vendor->username}}</a></h4>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="ml-5 font-small text-muted"> (4.0)</span>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <span class="font-small total-product">{{$vendor->products_count}} products</span>
                                    </div>
                                </div>
                                <div class="vendor-info mb-30">
                                    <ul class="contact-infor text-muted">
                                        <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>{{$vendor->address}}</span></li>
                                        <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call Us:</strong><span>{{$vendor->phone}}</span></li>
                                    </ul>
                                </div>
                                <a href="{{route('vendor.details', ['id' => $vendor->id])}}" class="btn btn-xs">Visit Store <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach     
                </div>
                <div class="mt-20 mb-20 pagination-area">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            {{$vendors->links('vendor.livewire.vendor-links')}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>