<?php

namespace App\Http\Livewire\Admin;

use App\Models\slider;
use Livewire\Component;


class Sliders extends Component
{
    public $deleteSliderId;

    public function render()
    {
        $sliders = slider::paginate(5);
        return view('livewire.admin.sliders', compact('sliders'));
    }

    public function deleteId($deleteSliderId)
    {
        $this->deleteSliderId = $deleteSliderId;
        $category = slider::find($this->deleteSliderId);
        $category->delete();
        session()->flash('message', 'Category Removed Successfully.');
    }


}
