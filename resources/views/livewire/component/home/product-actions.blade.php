<div class="product-action-1">
    <a aria-label="Add To Wishlist" wire:click="wishlistSave" class="action-btn" @click.prevent ><i class="fi-rs-heart"></i></a>
    <a aria-label="Compare" wire:click="compareSave" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
    <a  aria-label="Quick view" class="action-btn" onclick="quickView({{$product->id}})"><i class="fi-rs-eye"></i></a>
</div>