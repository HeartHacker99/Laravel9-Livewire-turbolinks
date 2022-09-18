<?php

namespace App\Http\Livewire\Client;
use App\Models\ShoppingCart;
use Livewire\Component;

class CartCounter extends Component
{
    public $this = 0;

    protected $listeners = ['updateCartCount' => 'getCartItemsCount'];

    public function render()
    {
        $this->getCartItemsCount();
        return view('livewire.client.cart-counter')
            ->layout('layouts.client');
    }

    public function getCartItemsCount()
    {
        if(auth()->user())
        {
            $this->total = shoppingCart::whereUserId(auth()->user()->id)
                ->where('status', '!=', shoppingCart::STATUS['success'])
                ->count();
        }
        else{
            $this->total = 0;
        }
    }
}
