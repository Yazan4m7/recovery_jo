<?php

namespace App\Livewire;

use App\Forms\CreateProductForm;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateProduct extends Component
{

    public CreateProductForm $form;

    #[Validate('required')]
    public $category_id;

    #[Validate('required|min:5|max:20')]
    public $name;

    #[Validate('required|min:5|max:255')]
    public $description;

    #[Validate('required|numeric')]
    public $price;

    public function addProduct()
    {   
        
        $this->validate();
        
       
        $this->form->storeProduct($this->category_id);

        return $this->redirect('/', navigate: true);
    }
 

    public function render()
    {
        return view('livewire.create-product', [
            'categories' => Category::all()
        ]);
    }
}
