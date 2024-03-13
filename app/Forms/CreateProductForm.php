<?php

namespace App\Forms;

use App\Models\Category;
use App\Models\Product;
use Livewire\Form;
use Livewire\Attributes\Validate;

class CreateProductForm extends Form
{


    public $name;
    
    public $description;

    public $price;

    public $category_id;



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
