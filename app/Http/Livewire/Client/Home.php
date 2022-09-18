<?php

namespace App\Http\Livewire\Client;

use App\Models\ShoppingCart;
use App\Models\slider;
use App\Models\products;
use Livewire\Component;
use Livewire\WithPagination;


class Home extends Component
{
    use WithPagination;

    public function render()
    {
        $sliders = slider::all()->where('status', 1);
        $products = products::all()->where('status', 1);
        return view('livewire.client.home', compact('sliders', 'products'))
            ->layout('layouts.client');
    }
    public function addToCart($id)
    {
        if (auth()->user()) {
            // Add to cart
//            $data = [
//                'product_id' => $id,
//                'user_id' => auth()->user()->id
//            ];d

//            ShoppingCart::updateOrCreate($data);
            $products_exist = ShoppingCart::where('product_id', $id)->where('status', '==' ,0)->where('user_id', auth()->user()->id)->first();

            if($products_exist )
            {
                $quantity = $products_exist->quantity;
                $quantity_old = $quantity;
                if($quantity >= 1)
                    {
                        $quantity++;
                        ShoppingCart::where('id', $products_exist->id)->update([
                            'quantity' => $quantity
                        ]);
                        session()->flash('message', 'Product quantity Updated from '.$quantity_old. ' to '.$quantity);

                    }

            }
            else
            {
    //            Elequant Standart Method

                $cart = new ShoppingCart();
                $cart->quantity = '1';
                $cart->product_id = $id;
                $cart->user_id = auth()->user()->id;
                $cart->save();

                session()->flash('message', 'Product added to the cart successfully.');
            }


            $this->emit('updateCartCount');


        } else {
            return $this->redirect(route('login'));
        }
    }
}
