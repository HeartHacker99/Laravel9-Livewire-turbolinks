<?php

namespace App\Http\Livewire\Admin;
use App\Models\category;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Addcategory extends Component
{



    public function render()
    {
        return view('livewire.admin.addcategory');
    }

}
