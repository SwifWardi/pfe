<div class="p-40 border cart-totals ml-30 mb-50">
    <div class="d-flex align-items-end justify-content-between mb-30">
        <h4>Your Order</h4>
        <h6 class="text-muted">Subtotal</h6>
    </div>
    <div class="divider-2 mb-30"></div>
    <div class="table-responsive order_table checkout">
        <table class="table no-border">
            <tbody>
                
                @foreach ($cartItems as $cart)  
                @php
                    if(!Auth::check()){
                        $cart = $cart->product;
                    }
                @endphp  
                <tr>
                    <td class="image product-thumbnail"><img src="{{asset('storage/'. $cart->photo)}}" alt="#"></td>
                    <td>
                        <h6 class="mb-5 w-160"><a href="shop-product-full.html" class="text-heading">{{$cart->name}}</a></h6></span>
                        <div class="product-rate-cover">

                         <strong>Color : </strong>
                         <strong>Size : </strong>
                             
                        </div>
                    </td>
                    <td>
                        <h6 class="pl-20 pr-20 text-muted">x {{$cart->qty}}</h6>
                    </td>
                    <td>
                        <h4 class="text-brand">${{$cart->price}}</h4>
                    </td>
                </tr>
                @endforeach
                
                
            </tbody>
        </table>




 <table class="table no-border">
        <tbody>
            <tr>
                <td class="cart_total_label">
                    <h6 class="text-muted">Subtotal</h6>
                </td>
                <td class="cart_total_amount">
                    <h4 class="text-brand text-end">${{$this->subtotal}}</h4>
                </td>
            </tr>
            
            <tr>
                <td class="cart_total_label">
                    <h6 class="text-muted">Coupn Name</h6>
                </td>
                <td class="cart_total_amount">
                    <h6 class="text-brand text-end">TAKHFIDAT AID</h6>
                </td>
            </tr>

              <tr>
                <td class="cart_total_label">
                    <h6 class="text-muted">Coupon Discount</h6>
                </td>
                <td class="cart_total_amount">
                    <h4 class="text-brand text-end">$12.31</h4>
                </td>
            </tr>

              <tr>
                <td class="cart_total_label">
                    <h6 class="text-muted">Grand Total</h6>
                </td>
                <td class="cart_total_amount">
                    <h4 class="text-brand text-end">$12.31</h4>
                </td>
            </tr>
        </tbody>
    </table>





    </div>
</div>