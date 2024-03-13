<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ListProducts extends Component
{
    use WithPagination;

    public function deleteproduct($id)
    {
        Product::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.list-products', [
            'products' => Product::paginate(),
        ]);
       
    }
}
