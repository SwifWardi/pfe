<div class="row mt-50">

                            <div class="col-lg-5">
                            <div class="p-40">
                                <h4 class="mb-10">Apply Coupon</h4>
                                <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>
                                <form action="#" wire:submit.prevent="submitCoupon">
                                    <div class="d-flex justify-content-between">
                                        <input wire:model.defer="coupon" class="font-medium mr-15 coupon" name="Coupon" placeholder="Enter Your Coupon">
                                        <button wire:click="submitCoupon" class="btn"><i class="mr-10 fi-rs-label"></i>Apply</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="col-lg-7">
                             <div class="divider-2 mb-30"></div>
                     


                            <div class="border p-md-4 cart-totals ml-30">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Subtotal</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">{{$this->subtotal ?? $subtotal}} MAD</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        @if($isExist)
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Coupon : {{$isExist->coupon_name}}</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">{{$isExist->coupon_discount}}%</h4>
                                        </td>
                                        @else 
                                        <td scope="col" colspan="2">
                                            <div class="mt-10 mb-10 divider-2"></div>
                                        </td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Shipping</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h5 class="text-heading text-end">Free</h4</td> </tr> <tr>
                                        
                                        
                                            <div class="mt-10 mb-10 divider-2"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">{{$isExist ? $subtotal * (1 - $isExist->coupon_discount / 100) : $subtotal}} MAD</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                                </div>
                                <a href="/checkout" class="mb-20 btn w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                            </div>
                        </div>


                    
                    </div>