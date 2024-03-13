<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class EditProduct extends Component
{
    public Product $product;

    #[Validate('required')]
    public $category_id;

    #[Validate('required|min:5|max:20')]
    public $name;

    #[Validate('required|min:5|max:255')]
    public $description;

    #[Validate('required|numeric')]
    public $price;


    public $category = [];

    public function mount()
    {
        $this->fill($this->product->only(['name', 'description', 'price', 'category_id']));
        $this->category = Category::where('id', $this->product->category_id)->get();
    }

    public function updateProduct()
    {
        $this->validate();
        $this->product->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
        ]);

        return $this->redirect('/', navigate: true);
    }



    public function updatedClassId($value)
    {
        $this->form->setCategories($value);
    }
    public function render()
    {
        return view('livewire.edit-product', [
            'categories' => Category::all()
        ]);
    }
}
