<button
wire:click='AddWishList({{ $product, $user_id }})'
class="add-to-wishlist"
    title="Wishlist">
    <i class="fa fa-heart-o"></i>
    <span class="tooltipp">
        add to wishlist</span>
</button>