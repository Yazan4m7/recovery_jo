<?php

namespace App\Forms;

use App\Models\Category;
use App\Models\Product;
use Livewire\Form;
use Livewire\Attributes\Validate;

class CreateProductForm extends Form
{

    #[Validate('required', 'string', 'max:20')]
    public $name;
    #[Validate('required', 'string', 'max:255')]
    public $description;
    #[Validate('required', 'numeric', 'min:1')]
    public $price;
    #[Validate('required', 'numeric', 'min:1')]
    public $category_id;
    #[Validate('required', 'image_url', 'max:1024')]


    public $categories = [];


   
    public function storeProduct($category_id)
    {
        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $category_id,
        
        ]);
    }


    public function setCategories($category_id)
    {
        $this->categories = Category::where('category_id', $category_id)->get();
    }
}
