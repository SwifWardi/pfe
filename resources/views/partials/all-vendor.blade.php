
<div class="container">

      <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                    <h3 class="">All Our Vendor List </h3>
                    <a class="show-all" href="{{route('vendor.list')}}">
                        All Vendors
                        <i class="fi-rs-angle-right"></i>
                    </a>
                </div>


 <div class="row vendor-grid">
        @foreach ($vendors as $vendor )    
        <div class="col-lg-3 col-md-6 col-12 col-sm-6 justify-content-center">
            <div class="mb-40 vendor-wrap">
                <div class="vendor-img-action-wrap">
                    <div class="vendor-img">
                        <a href="{{route('vendor.details', ['id' => $vendor->id])}}">
                            <img class="default-img" src="{{ asset('storage/' . $vendor->photo) }}" alt="" />
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
                            <h4 class="mb-5"><a href="{{route('vendor.details', ['id' => $vendor->id])}}">{{$vendor->username ?? 'hello'}}</a></h4>
                            <div class="product-rate-cover">
                               
                               <span class="font-small total-product">{{$vendor->products_count}} products</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="vendor-info mb-30">
                        <ul class="contact-infor text-muted">
                            
                            <li><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-contact.svg') }}" alt="" /><strong>Call Us:</strong><span> {{$vendor->phone}} </span></li>
                        </ul>
                    </div>
                    <a href="{{route('vendor.details', ['id' => $vendor->id])}}" class="btn btn-xs">Visit Store <i class="fi-rs-arrow-small-right"></i></a>
                </div>
            </div>
        </div>
        <!--end vendor card-->
        @endforeach
                
                </div> 
            </div>