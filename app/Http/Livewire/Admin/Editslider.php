<?php

namespace App\Http\Livewire\Admin;

use App\Models\slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Editslider extends Component
{
    use WithFileUploads;

    public $sliderId, $description1, $description2, $sliderImage;
    protected $rules = [
        'description1' => 'required|max:255',
        'description2' => 'required|max:255',
//        'sliderImage' => 'required',
    ];

    public function mount($sliderId)
    {
        $this->sliderId = $sliderId;
        $sliders = slider::find($this->sliderId);
        $this->description1 = $sliders->description1;
        $this->description2 = $sliders->description2;
        $this->sliderImage = $sliders->slider_image;
    }

    public function render()
    {
        $sliders = slider::find($this->sliderId);
        return view('livewire.admin.editslider', compact('sliders'));
    }
    public function resetInputField()
    {
        $this->description1 = '';
        $this->description2 = '';
        $this->sliderImage = '';
    }


    public function updateSlider()
    {
        $sliders = slider::find($this->sliderId);
        $this->validate();
        if($this->sliderImage != '' && is_string($this->sliderImage) == 0)
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

            if($this->sliderImage != 'noimage')
            {
                Storage::delete('public/slider_images/'.$this->sliderImage);
            }
            $this->sliderImage = $fileNameToStore;

        }
        $sliders->update([
            'user_id' => Auth::user()->id,
            'description1' => $this->description1,
            'description2' => $this->description2,
            'slider_image' => $this->sliderImage
        ]);
        session()->flash('message', 'Slider Updated Successfully.');
//        return $this->redirect('sliders');
    }


}
