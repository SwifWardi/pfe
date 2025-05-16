<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QuickPreview extends Component
{
    
    protected $listeners = ['quickViewClicked'];

    protected $rules = [
        'qty' => 'required|integer|min:1',
    ];

    public $qty, $product;

    public function quickViewClicked($id){
        $this->product = product::with('photos', 'vendor')->select('id', 'name', 'selling_price', 'discount_price','thambnail' , 'created_at')->where('id', $id)->first();
        $this->dispatch('sendquickview', $this->product);
    }

    public function submit(){
        $this->product = cache()->remember('product_' . $this->product->id, 60, function () {
            return product::select('id', 'name', 'thambnail', DB::raw('IF(discount_price IS NOT NULL, discount_price, selling_price) AS selling_price'))
                ->where('id', $this->product->id)
                ->first();
        });
            $this->validate();
            if(auth()->user()){
                $cart = Cart::where('product_id', $this->product->id)
                ->where('user_id', auth()->user()->id)
                ->first();
                if($cart){
                    $cart->increment('qty', $this->qty);
                    $this->dispatch('showToast', ['type' => 'success', 'message' => 'Ur Product Is Added To Cart']);
                }else{
                    Cart::create([
                        'name' => $this->product->name,
                        'user_id' => auth()->user()->id,
                        'product_id' => $this->product->id,
                        'price' => $this->product->selling_price,
                        'qty' => $this->qty,
                        'photo' => $this->product->thambnail,
                    ]);
                    $this->dispatch('showToast', ['type' => 'success', 'message' => 'Ur Product Is Added To Cart']);
                }
            }else {
                $cart = session()->get('guest_cart', []);
                isset($cart[$this->product->id]) 
                ? $cart[$this->product->id]['qty'] += $this->qty 
                : $cart[$this->product->id] = ["name" => $this->product->name, "product_id" => $this->product->id, "price" => $this->product->selling_price  ,"qty" => $this->qty, 'photo' => $this->product->thambnail];
                session()->put('guest_cart', $cart);
                $this->dispatch('showToast', ['type' => 'success', 'message' => 'Ur Product Is Added To Cart']);
            }
            $this->dispatch('updateCart');
    }

    public function render()
    {
        return view('livewire.quick-preview');
    }
}
