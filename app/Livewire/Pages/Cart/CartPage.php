<?php

namespace App\Livewire\Pages\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CartPage extends Component
{
    public $cartItems;

    public function mount()
    {
        $this->loadCartItems();
    }

    public function getCartItemsProperty()
    {
        return $this->cartItems;
    }

    public function loadCartItems()
    {
        if (Auth::check()) {
            $this->cartItems = Cart::with('product')
                ->where('user_id', Auth::id())
                ->get();
        } else {
            $sessionCart = session()->get('guest_cart', []);

            $this->cartItems = collect($sessionCart)->map(function ($item) {
                return (object)[
                    'product' => (object)[
                        'name' => $item['name'],
                        'id' => $item['product_id'],
                        'price' => $item['price'],
                        'photo' => $item['photo'],
                        'qty' => $item['qty'],
                    ]
                ];
            });
        }
        Log::info($this->cartItems);
    }


    

    public function getSubtotalProperty()
    {
        return $this->cartItems->sum(function ($item) {
            return auth()->check() ? $item->price * $item->qty : $item->product->price * $item->product->qty;
        });
    }

    public function removeItem($productId)
    {
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->delete();
        } else {
            $cart = session()->get('guest_cart', []);
            unset($cart[$productId]);
            session()->put('guest_cart', $cart);
        }
        $this->loadCartItems();
    }

    public function clearCart()
    {
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())->delete();
        } else {
            session()->forget('guest_cart');
        }
        $this->loadCartItems();
    }


    public function render()
    {
        return view('livewire.pages.cart.cart-page');
    }
}
