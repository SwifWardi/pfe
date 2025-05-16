<?php

namespace App\Livewire\Frontend;

use App\Livewire\Component\Home\CartBtn;
use App\Models\Cart;
use App\Models\product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class WishlistRow extends Component
{
    public $wishlist, $wishlistIds;
    public function mount(){
        $this->wishlistIds = session()->get('guest_wishlist', []);
        Log::info('wishlist data ' . json_encode($this->wishlistIds));
        auth()->check() 
        ? ($this->wishlist = Wishlist::with('product')->where('user_id', auth()->id())->get())
        : ($this->wishlist = product::select('id','name', 'thambnail', 'selling_price', 'discount_price', 'qty')->whereIn('id',$this->wishlistIds)->get());
    }

    public function remove($productId){
        if(auth()->check()){
            $thiswishproduct = Wishlist::where('product_id', $productId)->where('user_id', auth()->id())->first();
            if($thiswishproduct){
                $thiswishproduct->delete();
                $this->wishlist = Wishlist::with('product')->where('user_id', auth()->id())->get();
                $this->dispatch('updateWishlist');
                $this->dispatch('showToast', ['type' => 'success', 'message' => 'Product Remove Process Done']);
            }
        }else {
            log:info($productId);
            $key = array_search($productId, $this->wishlistIds);
            if ($key !== false) {
                unset($this->wishlistIds[$key]);
                session()->put('guest_wishlist', array_values($this->wishlistIds));
                $this->wishlist = product::select('id','name', 'thambnail', 'selling_price', 'discount_price', 'qty')->whereIn('id',$this->wishlistIds)->get();
                $this->dispatch('updateWishlist');
                $this->dispatch('showToast', ['type' => 'success', 'message' => 'Product Remove Process Done']);
            }
        }
    }

    public function save($id){
        $product = product::select('id', 'name', 'thambnail', DB::raw('IF(discount_price IS NOT NULL, discount_price, selling_price) AS selling_price'))
            ->where('id', $id)
            ->first();
        if(auth()->check()){
            $cart = Cart::where('product_id', $product->id)
            ->where('user_id', auth()->user()->id)
            ->first();
            if($cart){
                Cart::create([
                    'name' => $product->name,
                    'user_id' => auth()->user()->id,
                    'product_id' => $product->id,
                    'price' => $product->selling_price,
                    'qty' => 1,
                    'photo' => $product->thambnail,
                ]);
                $this->dispatch('showToast', ['type' => 'success', 'message' => 'Ur Product Is Added To Cart']);
            }
        }else {
            $cart = session()->get('guest_cart', []);
            isset($cart[$product->id]) 
            ? $cart[$product->id]['qty'] += 1 
            : $cart[$product->id] = ["name" => $product->name, "product_id" => $product->id, "price" => $product->selling_price  ,"qty" => 1, 'photo' => $product->thambnail];
            session()->put('guest_cart', $cart);
            $this->dispatch('showToast', ['type' => 'success', 'message' => 'Ur Product Is Added To Cart']);
        }
        $this->dispatch('updateCart');
    }

    public function render()
    {
        return view('livewire.frontend.wishlist-row');
    }
}
