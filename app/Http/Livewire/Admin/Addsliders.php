<?php

namespace App\Http\Livewire\Admin;

use App\Models\slider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Addsliders extends Component
{
    use WithFileUploads;

    public $description1, $description2, $sliderImage;

    public function render()
    {
        return view('livewire.admin.addsliders');
    }
    // ----------------- Start Add Slider --------------------------
    protected $rules = [
        'description1' => 'required|max:255',
        'description2' => 'required|max:255',
        'sliderImage'  => 'required|image|max:2048'
    ];

    public function resetInputField()
    {
        $this->description1 = '';
        $this->description2 = '';
        $this->sliderImage = '';
    }

    public function addslider()
    {
        $this->validate();
        if($this->sliderImage != '')
        {
            // 1: Get filename with extension
            $fileNameWithExt = $this->sliderImage->getClientOriginalName();
            // 2: get Just Filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // 3: get Just file extension
            $extension = $this->sliderImage->getClientOriginalExtension();
            // 4: File Name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //upload Image
            $path = $this->sliderImage->storeAs('public/slider_images', $fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }
        slider::create([
            'user_id' => Auth::user()->id,
            'description1' => $this->description1,
            'description2' => $this->description2,
            'slider_image' => $fileNameToStore
        ]);
        $this->resetInputField();
//        $this->dispatchBrowserEvent('closeSliderModel');


        session()->flash('message', 'Slider Inserted Successfully.');
    }

    // Start Select slider Button
    public function selectmodel()
    {
        $this->dispatchBrowserEvent('openSliderModel');
    }
    // End Select slider Button

    // ----------------- End Add Slider --------------------------


}
