<?php

namespace App\Livewire\Component\Home;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistHeader extends Component
{

    protected $listeners = ['updateWishlist'];

    public $countWishlist;

    public function mount(){
        // if(auth()->check()){
        //     $wishlist = Wishlist::where('user_id', auth()->id())->get();
        // }else {
        //     $wishlist = session()->get('guest_wishlist', []);
        // }
        // $this->countWishlist = count($wishlist);

        $this->updateWishlist();
    }

    public function updateWishlist(){
        if(auth()->check()){
            $wishlist = Wishlist::where('user_id', auth()->id())->get();
        }else {
            $wishlist = session()->get('guest_wishlist', []);
        }
        $this->countWishlist = count($wishlist);
    }


    public function render()
    {
        return view('livewire.component.home.wishlist-header');
    }
}
