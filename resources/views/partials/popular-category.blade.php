<section class="popular-categories section-padding">
            <div class="container wow animate__animated animate__fadeIn">
                <div class="section-title">
                    <div class="title">
                        <h3>Featured Categories</h3>
                       
                    </div>
                    <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
                </div>
                <div class="carausel-10-columns-cover position-relative">
                    <div class="carausel-10-columns" id="carausel-10-columns">
                        @foreach($categories as $key => $category)
                        <div class="card-2 bg-{{$key}} wow animate__animated animate__fadeInUp" data-wow-delay=".{{$key}}s">
                            <figure class="overflow-hidden img-hover-scale">
                                <a href="shop-grid-right.html"><img src="{{ asset('storage/'. $category->image) }}" alt="" /></a>
                            </figure>
                            <h6><a href="shop-grid-right.html">{{$category->name}}</a></h6>
                            <span>0 items</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>