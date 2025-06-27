<div class="search-style-2 position-relative">
                            <form wire:ignore wire:submit.prevent="submitForm">
                                <select wire:model="selectedCategory" class="select-active">
                                    <option value="all">All Categories</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" wire:key="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" placeholder="Search for items..." 
                                wire:model.debounce.300ms="searchQuery" 
                                wire:keydown="submitForm" 
                                autocomplete="off" />
                            </form>
                            @if($showResults && count($searchedProducts) > 0)
                            <div id="searchResults" class="position-absolute w-100 bg-white border rounded shadow-lg mt-1" style="z-index: 1050; max-width:700px; top: 100%; max-height: 400px; overflow-y: auto;" wire:click.away="hideResults">
                                <div class="list-group list-group-flush">
                                    @foreach ($searchedProducts as $product)    
                                        <a href="{{ route('product.page', ['id' => $product->id]) }}" 
                                        class="list-group-item list-group-item-action d-flex align-items-center">
                                            <img width="52px" src="{{ asset('storage/' . $product->thambnail) }}" class="rounded me-3" alt="Product">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">{{ $product->name }}</h6>
                                                <small class="text-muted">{{ $product->category->name }}</small>
                                            </div>
                                            <span class="badge bg-primary rounded-pill">${{ $product->discount_price ?? $product->selling_price }}</span>
                                        </a>
                                    @endforeach

                                    
                                </div>
                                
                                
                            </div>
                            @endif
                        </div>

                        <script>
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.querySelector('select[wire\\:ignore][wire\\:model]');
        if (select) {
            select.addEventListener('change', function () {
                Livewire.dispatch('updateCategory', { id: select.value });
            });
        }
    });
</script>