<div x-data class="detail-extralink mb-50">
    <div class="border detail-qty radius">
        <a x-on:click="$wire.qty--" href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
        <input wire:model="qty" type="text" name="quantity" class="qty-val" min="1">
        <a x-on:click="$wire.qty++" href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
    </div>
    <div class="product-extra-link2">
        <button wire:click="save" type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
        <a aria-label="Add To Wishlist" class="action-btn hover-up" href={{route('wishlist.page')}}><i class="fi-rs-heart"></i></a>
        <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
    </div>
</div>