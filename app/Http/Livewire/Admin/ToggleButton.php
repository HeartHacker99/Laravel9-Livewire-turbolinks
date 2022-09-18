<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component
{
    public Model $model;
    public string $field;
    public bool $active;

    public function mount()
    {
        $this->active = (bool) $this->model->getAttribute($this->field);
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
        $this->emit('statusUpdated');
    }
    // ----------------- End Update Slider --------------------------

    public function render()
    {
        return view('livewire.admin.toggle-button');
    }
}
