<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Orders as adminOrder;
use Illuminate\Support\Facades\App;

class Orders extends Component
{
    public function render()
    {
        $this->orders = adminOrder::all();
        return view('livewire.admin.orders');
    }
}
