<?php

namespace App\Livewire\Component\Search;

use App\Models\product;
use Livewire\Component;

class SearchSection extends Component
{
    public $categories = [];
    public $selectedCategory;
    public $searchQuery = "";
    public $searchedProducts = [];
    public $showResults = false;

    public function mount($categories)
    {
        $this->categories = $categories;
    }

    public function submitForm(){
    info('Selected category:', [$this->selectedCategory]);
    info('Search query:', [$this->searchQuery]);

    $query = Product::query();

    if ($this->selectedCategory) {
        $query->where('category_id', $this->selectedCategory);
    }

    if ($this->searchQuery) {
        $query->where('name', 'like', '%' . $this->searchQuery . '%');
    }

    $this->searchedProducts = $query->take(4)->get();

    $this->showResults = true;
    }

    public function updateCategory($id)
    {
        $this->selectedCategory = $id;
        $this->submitForm();
    }

    public function hideResults(){
        $this->searchQuery = "";
        $this->showResults = false;
    }

    public function render()
    {
        return view('livewire.component.search.search-section');
    }
}
