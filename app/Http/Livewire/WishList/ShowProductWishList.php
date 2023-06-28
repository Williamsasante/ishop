<?php

namespace App\Http\Livewire\WishList;

use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;

class ShowProductWishList extends Component
{
    public $count_product_in_wishlist = 0;
    public $user_id;
    public $product_id;
    public $product;

    protected $listeners = [
        'AddWishList' => '$refresh',
    ];

    public function mounted($product)
    {

    }

    public function render()
    {
        return view('livewire.wish-list.show-product-wish-list');
    }
}