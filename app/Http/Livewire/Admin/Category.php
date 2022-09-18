<?php

namespace App\Http\Livewire\Admin;
use App\Models\category as categories;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Category extends Component
{
    public $category_name, $ids;
    public $deletecategoryid = '';

    protected $rules = [
        'category_name' => 'required|unique:categories'
    ];


    public function render()
    {
        $categories = categories::paginate(5);
        return view('livewire.admin.category', compact('categories'));
    }

    public function resetInputField()
    {
        $this->category_name = '';
    }

    public function addcategory()
    {
        $this->validate();

        categories::create([
            'user_id' => Auth::user()->id,
            'category_name' => $this->category_name
        ]);
        $this->resetInputField();
        $this->dispatchBrowserEvent('closeAddCategoryModel');
        session()->flash('message', 'Category Inserted Successfully.');
    }

//Update Category Code Start
    public function edit($id)
    {
        $categories =  categories::where('id', $id)->first();
        $this->ids = $categories->id;
        $this->category_name = $categories->category_name;
        $this->dispatchBrowserEvent('openEditCategoryModel');
    }

    public function update()
    {
        $this->validate([
            'category_name' => 'required'
        ]);

        if($this->ids)
        {
            $categories = categories::find($this->ids);
            $categories->update([
                'category_name' => $this->category_name
            ]);
            $this->resetInputField();
            $this->dispatchBrowserEvent('closeEditCategoryModel');
            session()->flash('message', 'Category Updated Successfully.');
        }
    }

    //  End Update Category Code


    public function deleteId($id)
    {
        $this->dispatchBrowserEvent('openDeleteCategoryModel');
        $this->deletecategoryid = $id;
    }

    public function deletecategory()
    {
        $prodcut = products::where('category_id', $this->deletecategoryid)->count();
        if($prodcut >= 1)
        {
            session()->flash('error', 'Please Remove product with relative category!');
            $this->dispatchBrowserEvent('closeDeleteCategoryModel');
        }
        else
        {

            $category = categories::find($this->deletecategoryid);
            $category->delete();
            $this->dispatchBrowserEvent('closeDeleteCategoryModel');
            session()->flash('message', 'Category Removed Successfully.');

        }

    }



    // Start open Add Category Model Button
    public function openaddcategory()
    {
        $this->dispatchBrowserEvent('openAddCategoryModel');
    }
    // End open Add Category Model Button

    // Start open Edit Category Model Button
    public function openeditcategory()
    {
        $this->dispatchBrowserEvent('openEditCategoryModel');
    }
    // End open Edit Category Model Button

    // Start open Delete Category Model Button
    public function opendeletecategory()
    {
        $this->dispatchBrowserEvent('openDeleteCategoryModel');
    }
    // End open Delete Category Model Button



}
