<?php

namespace App\Http\Livewire\Client;

use App\Models\category;
use App\Models\products;
use App\Models\slider;
use App\Models\ShoppingCart;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;

    public $sliders, $categories;
    public function render()
    {
        $this->sliders = slider::all()->where('status', 1);
        $products = products::where('status', 1)->paginate(12);
        $this->categories = category::all();
        return view('livewire.client.shop',compact('products'))
            ->layout('layouts.client');
    }



    public function addToCart($id)
    {
        if (auth()->user()) {
            // Add to cart
            $data = [
                'product_id' => $id,
                'user_id' => auth()->user()->id
            ];

            ShoppingCart::updateOrCreate($data);

//            Elequant Standart Method

//           $shopping = new shoppingCart();
//            $shopping->product_id = $id;
//            $shopping->user_id = auth()->user()->id;
//            $shopping->save();


            $this->emit('updateCartCount');

            session()->flash('success', 'Product added to the cart successfully.');
        } else {
            return $this->redirect(route('login'));
        }
    }
}
