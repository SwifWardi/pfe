<?php

namespace App\Livewire\Pages\Home;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class VendorDetails extends Component
{
    use WithPagination;

    public $id;
    public $user;
    public $sortBy = 'featured';
    public $perPage = 2;
    public $selectedColors = [];
    public $selectedConditions = [];
    public $minPrice = 0;
    public $maxPrice = 1000;
    public $selectedCategory = null;

    public function mount($id)
    {
        $this->id = $id;
        $this->user = User::findOrFail($id);
    }

    public function filter(){
         $this->resetPage();
    }

    public function getProductsColorsProperty()
{
    return Product::where('vendor_id', $this->id)
        ->whereNotNull('color')
        ->pluck('color') // Get all color strings like 'red,blue'
        ->flatMap(function ($item) {
            return explode(',', $item); // Split by comma
        })
        ->map(fn($color) => trim(strtolower($color))) // Clean up
        ->filter()
        ->unique()
        ->values(); // Reset keys
}

    public function getProductsProperty()
    {
        $query = Product::where('vendor_id', $this->id)
            ->where('status', 1)
            ->with(['category', 'vendor']);

        // Apply category filter
        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        // Apply color filter (assuming you have a colors column or relationship)
        if (!empty($this->selectedColors)) {
            $query->where(function ($q) {
                foreach ($this->selectedColors as $color) {
                    $q->orWhere('color', 'LIKE', '%' . $color . '%');
                }
});

        }

        // Apply price filter
        $query->where(function($q) {
            $q->whereBetween('selling_price', [$this->minPrice, $this->maxPrice])
              ->orWhereBetween('discount_price', [$this->minPrice, $this->maxPrice]);
        });

        // Apply sorting
        switch ($this->sortBy) {
            case 'price_low_high':
                $query->orderByRaw('COALESCE(discount_price, selling_price) ASC');
                break;
            case 'price_high_low':
                $query->orderByRaw('COALESCE(discount_price, selling_price) DESC');
                break;
            case 'release_date':
                $query->orderBy('created_at', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'featured':
            default:
                $query->orderBy('featured', 'desc')->orderBy('created_at', 'desc');
                break;
        }

        if ($this->perPage === 'all') {
            return $query->get();
        }

        return $query->paginate($this->perPage);
    }

    public function getCategoriesProperty()
    {
        return Category::whereHas('product', function ($query) {
            $query->where('vendor_id', $this->id)->where('status', 1);
        })
        ->withCount(['product as products_count' => function ($query) {
            $query->where('vendor_id', $this->id)->where('status', 1);
        }])
        ->get();
    }

    public function render()
    {
        return view('livewire.pages.home.vendor-details', [
            'products' => $this->products,
            'categories' => $this->categories,
            'user' => $this->user
        ]);
    }
}