<?php

namespace App\Livewire\Component\Home;

use App\Models\product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProductActions extends Component
{
    public $product;
    
    public function wishlistSave(){
        $product  = wishlist::with('user', 'product')->where('product_id', $this->product->id)->first();
        $sessionProduct = session()->get('guest_wishlist', []);

        if(!$product && auth()->check()){
            wishlist::Create([
                'product_id' => $this->product->id,
                'user_id' => auth()->user()->id
            ]);
            $this->dispatch('updateWishlist');
            $this->dispatch('showToast', ['type' => 'success', 'message' => 'Successfully Added To WishList']);
        }
        if (!in_array($this->product->id, $sessionProduct)) {
            $sessionProduct[] = $this->product->id;
            session()->put('guest_wishlist', $sessionProduct);
            $this->dispatch('updateWishlist');
            $this->dispatch('showToast', ['type' => 'success', 'message' => 'Successfully Added To WishList']);
        }
    }
    
    public function render()
    {
        Log::info(session()->get('guest_wishlist', []));
        return view('livewire.component.home.product-actions');
    }
}
