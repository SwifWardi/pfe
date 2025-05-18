<?php

namespace App\Livewire\Pages\Home;

use App\Models\User;
use Livewire\Component;
use Livewire\WithoutUrlPagination as LivewireWithoutUrlPagination;
use Livewire\WithPagination;

class VendorList extends Component
{
    use WithPagination, LivewireWithoutUrlPagination;
    public $paginateNum = 1;
    public $query = '';
 
    public function search()
    {
        $this->resetPage();
    }

    public function updatePaginate($num){
        if ($num === 'all') {
        $this->paginateNum = User::count(); // or some very big number to show all
    } else {
        $this->paginateNum = (int)$num;
    }
    $this->resetPage();
    }

    public function render()
    {
        $vendors = User::with('products')
            ->whereHas('roles', fn ($q) => $q->where('name', 'vendor'))
            ->where(function($q) {
            $q->where('name', 'like', '%' . $this->query . '%')
            ->orWhere('email', 'like', '%' . $this->query . '%');
            })
            ->withCount('products')
            ->orderBy('products_count', 'desc')
            ->paginate($this->paginateNum);
        return view('livewire.pages.home.vendor-list', compact('vendors'));
    }
}
