<?php

namespace App\Livewire\Component\Home;

use App\Models\Cart;
use App\Models\product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CartComponent extends Component
{
    protected $listeners = ["updateCart"];
    public $carts, $total,$wishlist;

    public function mount()
    {
        if( auth()->check()){
            $this->carts = auth()->user()->carts;
            $this->total = $this->carts->sum(function($cart){
                return $cart->price * $cart->qty;
            });
        }else {
            $this->carts = session()->get('guest_cart', []);
            $this->total = collect($this->carts)->sum(function ($cart) {
                return $cart['price'] * $cart['qty'];
            });
            Log::info($this->total);
        }
    }

    // FUNCTION TO UPDATE THE CART AFTER SOMETHING IS ADDED
    public function updateCart()
    {
        if( auth()->check()){
            $this->carts = auth()->user()->carts;
            $this->total = $this->carts->sum(function($cart){
                return $cart->price * $cart->qty;
            });
        }else {
            $this->carts = session()->get('guest_cart', []);
            $this->total = collect($this->carts)->sum(function ($cart) {
                return $cart['price'] * $cart['qty'];
            });
        }
    }

    // FUNCTION TO REMOVE THE PRODUCT FROM CART
    public function remove($productId){
        if(auth()->check()){
            $thisorderproduct = Cart::where('user_id', auth()->id())->where('product_id', $productId)->delete();
            $this->total = $this->carts->sum(function($cart){
                return $cart->price * $cart->qty;
            });
            $this->updateCart();
            $this->dispatch('showToast', ['type' => 'success', 'message' => 'You Removed The Product']);
        }else {
            unset($this->carts[$productId]);
            session()->put('guest_cart', $this->carts);
            $this->total = collect($this->carts)->sum(function ($cart) {
                return $cart['price'] * $cart['qty'];
            });
            $this->updateCart();
            $this->dispatch('showToast', ['type' => 'success', 'message' => 'You Removed The Product']);
        }
    }


    public function render()
    {
        return view('livewire.component.home.cart-component');
    }
}
