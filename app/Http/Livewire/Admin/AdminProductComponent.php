<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class AdminProductComponent extends Component
{
    public $product_id;
    public function deleteProduct(){
        $product = Product::find($this->$product_id);
        unlink('assets/products/'.$product->image);
        $product->delete();
        session()->flash('message','Product has been deleted');
    }
    use WithPagination;
    public function render()
    {
        $products = Product::orderBy('created_at','DESC')->paginate(10);
        return view('livewire.admin.admin-product-component',['products'=>$products]);
    }
}
