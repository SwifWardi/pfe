<?php

namespace App\Livewire\Pages\Home;

use App\Models\Category;
use App\Models\product;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class VendorDetails extends Component
{
     use WithPagination;
    
    public $id;
    public $selectedColors = [];
    public $minPrice = 0;
    public $maxPrice = 1000;
    public $sortBy = 'featured';
    public $perPage = 50;
    public $condition = [];
    
    public function mount($id)
    {
        $this->id = $id;
    }
    
    public function filter()
    {
        $this->resetPage();
    }
    
    public function updatingSelectedColors()
    {
        $this->resetPage();
    }
    
    public function updatingMinPrice()
    {
        $this->resetPage();
    }
    
    public function updatingMaxPrice()
    {
        $this->resetPage();
    }
    
    public function updatingSortBy()
    {
        $this->resetPage();
    }
    
    public function updatingPerPage()
    {
        $this->resetPage();
    }
    
    public function updatingCondition()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $query = Product::where('vendor_id', $this->id);
        
        // Apply color filter
        if (!empty($this->selectedColors)) {
            $query->whereIn('color', $this->selectedColors);
        }
        
        // Apply price filter
        if ($this->minPrice > 0 || $this->maxPrice < 1000) {
            $query->where(function($q) {
                $q->where(function($subq) {
                    $subq->whereNotNull('discount_price')
                         ->where('discount_price', '>=', $this->minPrice)
                         ->where('discount_price', '<=', $this->maxPrice);
                })->orWhere(function($subq) {
                    $subq->whereNull('discount_price')
                         ->where('selling_price', '>=', $this->minPrice)
                         ->where('selling_price', '<=', $this->maxPrice);
                });
            });
        }
        
        // Apply condition filter
        if (!empty($this->condition)) {
            $query->whereIn('condition', $this->condition);
        }
        
        // Apply sorting
        switch ($this->sortBy) {
            case 'price_low_to_high':
                $query->orderByRaw('COALESCE(discount_price, selling_price) ASC');
                break;
            case 'price_high_to_low':
                $query->orderByRaw('COALESCE(discount_price, selling_price) DESC');
                break;
            case 'release_date':
                $query->orderBy('created_at', 'DESC');
                break;
            case 'avg_rating':
                $query->orderBy('rating', 'DESC');
                break;
            default:
                $query->orderBy('created_at', 'DESC'); // Default to newest
                break;
        }
        
        $products = $query->paginate($this->perPage);
        $vendor = User::find($this->id);
        $categories = Category::withCount(['product' => function($query) {
            $query->where('vendor_id', $this->id);
        }])->get();
        
        return view('livewire.vendor-products-component', [
            'products' => $products,
            'user' => $vendor,
            'categories' => $categories,
        ]);
    }
}