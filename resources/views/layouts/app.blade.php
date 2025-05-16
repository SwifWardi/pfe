<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg') }}" />
        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />    
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <livewire:quick-preview/>
        @include('main-parts.header')
        @include('main-parts.mobile-header')
        @yield('content')
        @include('main-parts.footer')
        <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{asset('frontend/assets/imgs/theme/loading.gif')}}" alt="" />
                </div>
            </div>
        </div>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>

        <script>
            const Toast = Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 3000, timerProgressBar: true, didOpen: (toast) => { toast.addEventListener('mouseenter', Swal.stopTimer); toast.addEventListener('mouseleave', Swal.resumeTimer) } });
            Livewire.on('showToast', ([{type, message}]) => {
                console.log(type);
            Toast.fire({
                icon: type,  // success or error
                title: type.charAt(0).toUpperCase() + type.slice(1),
                html: message
            });
            });
         </script>   
            @if (session('success'))
        <script>
            Toast.fire({
                icon: 'success',
                title: 'Success',
                html: '{{ session("success") }}'
            });
            </script>
        @endif

        @if (session('error'))
        <script>
            Toast.fire({
                icon: 'error',
                title: 'Error',
                html: '{{ session("error") }}'
            });
        </script>
        @endif
        </script>

        
        <script>
           function quickView(id){
            Livewire.dispatch('quickViewClicked', {id: id});
           }

           Livewire.on('sendquickview', ([product]) => {
            const photos = [product.thambnail];
            if (product.photos && Array.isArray(product.photos)) {
            product.photos.forEach(item => photos.push(item.src));
            }   
            console.log(photos);
            const date = new Date(product.created_at);
            const formattedDate = date.toLocaleDateString('en-GB');
            $('#date').text(formattedDate);
            $('#vendor').text(product.vendor || 'Admin');
            $('#thambnail').src = 'storage/' + product.thambnail;
            $('#name').text(product.name);
            $('#pricing').html('');
            $('#pricing').append(
                product.discount_price != null ? 
                    `<span class="current-price text-brand">$${product.discount_price}</span>
                    <span>
                        <span class="save-price font-md color3 ml-15">${Math.floor(((product.selling_price - product.discount_price) * 100) / product.selling_price)}% Off</span>
                        <span class="old-price font-md ml-15">$${product.selling_price}</span>
                    </span>` :
                    `<span class="current-price text-brand">$${product.selling_price}</span>`
            );

            $('.product-image-slider, .slider-nav-thumbnails').slick('unslick'); // destroy if exists
            $('.product-image-slider').empty();
            $('.slider-nav-thumbnails').empty();

            photos.forEach(src => {
                $('.product-image-slider').append(`<div><img src="storage/${src}" /></div>`);
                $('.slider-nav-thumbnails').append(`<div><img src="storage/${src}" /></div>`);
            });

            // Re-initialize
            productDetails(); 
            $('#quickViewModal').modal('show');
            }
           )
        </script>
        
    </body>
</html>
