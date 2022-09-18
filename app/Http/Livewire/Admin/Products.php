<?php

namespace App\Http\Livewire\Admin;
use App\Models\products as adminProducts;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $product_name, $product_price, $productImage, $product_category_id, $ids;
    public $statusId, $value;

    protected $rules = [
        'product_name' => 'required|max:255',
        'product_price' => 'required|numeric',
        'product_category_id' => 'required',
        'productImage'  => 'required|image|max:2048'
    ];

    public function render()
    {

        $products = adminProducts::paginate(5);
        $categories = category::all();
        return view('livewire.admin.products', compact('products', 'categories'));
    }


    public function resetInputField()
    {
        $this->product_name = '';
        $this->product_price = '';
        $this->productImage = '';
        $this->product_category_id = '';
    }

    public function addproduct()
    {
        $this->validate();

        if($this->productImage != '')
        {
            // 1: Get filename with extension
            $fileNameWithExt = $this->productImage->getClientOriginalName();
            // 2: get Just Filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // 3: get Just file extension
            $extension = $this->productImage->getClientOriginalExtension();
            // 4: File Name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //upload Image
            $path = $this->productImage->storeAs('public/product_images', $fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

//        Fetch Multiple ( 2 ) values form one Dropdown menue Using string manuplation
//        $result = explode('|', $this->product_category);// Value 1

        adminProducts::create([
            'user_id' => Auth::user()->id,
            'category_id' => $this->product_category_id,
            'product_name' => $this->product_name,
            'product_price' => $this->product_price,
            'product_image' => $fileNameToStore
        ]);
        $this->resetInputField();
        $this->dispatchBrowserEvent('closeProductModel');
        session()->flash('message', 'Product Inserted Successfully.');
    }

    // Start Select products Button
    public function openProductModel()
    {
        $this->dispatchBrowserEvent('openProductModel');
    }
    // End Select products Button


    public function edit($id)
    {
        $product =  adminProducts::where('id', $id)->first();
        $this->ids = $product->id;
        $this->product_name = $product->product_name;
        $this->product_price = $product->product_price;
        $this->product_category_id = $product->category_id;
        $this->productImage = $product->product_image;
        $this->dispatchBrowserEvent('openEditCategoryModel');
    }

    public function update()
    {
        $this->validate([
            'product_name' => 'required|max:255',
            'product_price' => 'required|numeric',
            'product_category_id' => 'required',
            'productImage' => 'required',
        ]);
        if($this->ids)
        {
            $product = adminProducts::find($this->ids);
            if($this->productImage != '' && is_string($this->productImage) == 0)
            {

                // 1: Get filename with extension
                $fileNameWithExt = $this->productImage->getClientOriginalName();
                // 2: get Just Filename
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // 3: get Just file extension
                $extension = $this->productImage->getClientOriginalExtension();
                // 4: File Name to store
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;

                //upload Image
                $path = $this->productImage->storeAs('public/product_images', $fileNameToStore);

                if($this->productImage != 'noimage')
                {
                    Storage::delete('public/slider_images/'.$this->productImage);
                }
                $this->productImage = $fileNameToStore;

            }
            $product->update([
                'category_id' => $this->product_category_id ,
                'product_name' => $this->product_name,
                'product_price' => $this->product_price,
                'product_image' => $this->productImage,
            ]);
            $this->resetInputField();
            $this->dispatchBrowserEvent('closeEditCategoryModel');
            session()->flash('message', 'Product Updated Successfully.');
        }
    }

    //  End Update Category Code

    //  Start Delete Category Code
    public function deleteId($id)
    {
        $this->dispatchBrowserEvent('openDeleteProductModel');
        $this->deleteproductid = $id;
    }

    public function deleteproduct()
    {
        $product = adminProducts::find($this->deleteproductid);
        $product->delete();
        $this->dispatchBrowserEvent('closeDeleteProductModel');
        session()->flash('message', 'Product Removed Successfully.');

    }
    //  End Delete Category Code


    public function status($statusId, $value)
    {
        $product = adminProducts::find($statusId);
        $product->status = $value;
        $product->update();
        session()->flash('message', 'Status Changed Sussessfully.');
    }



}
