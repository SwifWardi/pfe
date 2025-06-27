<?php

namespace App\Livewire\Component;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutComponent extends Component
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
        info($this->cartItems);
    }


    

    public function getSubtotalProperty()
    {
        return $this->cartItems->sum(function ($item) {
            return auth()->check() ? $item->price * $item->qty : $item->product->price * $item->quantity;
        });
    }

    public function render()
    {
        return view('livewire.component.checkout-component');
    }
}
