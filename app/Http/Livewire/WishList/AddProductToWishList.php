<?php

namespace App\Http\Livewire\WishList;

use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;

class AddProductToWishList extends Component
{

    public $count_product_in_wishlist;
    public $product;
    public $user_id;
    public $product_id;

    public function mounted($product_id, $user_id)
    {
        # code...
        $count_product_in_wishlist = $product_id;
        $this->user_id = $user_id;
        $this->product_id =  $this->product->id ;
    }

    public function render()
    {
        return view('livewire.wish-list.add-product-to-wish-list',);
    }

    public function AddWishList(Product $product_id)
    {

      if( \Auth::guest() )
      {
        return Redirect()->route('login');
      }

        $t = DB::table('wishlists')->insert([
            "user_id" => $this->user_id,
            "product_id" => $this->product_id
        ]);

        $this->emit('AddWishList', $product_id);

    }
}