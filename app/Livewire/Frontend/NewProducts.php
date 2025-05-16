<?php

namespace App\Livewire\Frontend;

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use App\Models\product;
use Livewire\Component;

class NewProducts extends Component
{
    public $categories, $products ,$ctgName, $loading;
    public function mount($categories){
        $this->categories = $categories;
        $this->products = product::with(['photos', 'category', 'vendor'])->inRandomOrder()->get();
    }

    public function setCategory($name){
        log::info('run : ' . $name);
        if($name === 'all') return $this->products = product::with(['photos', 'category', 'vendor'])->inRandomOrder()->get();;
        $this->products = product::with(['photos', 'category', 'vendor'])->where('category_id', $name)->get();
        $this->dispatch('loading', false);
    }

    public function render()
    {
        return view('livewire.frontend.new-products');
    }
}
