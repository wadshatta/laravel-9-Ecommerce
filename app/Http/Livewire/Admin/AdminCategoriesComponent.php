<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use livewire\WithPagination;
use \App\Models\Category;

class AdminCategoriesComponent extends Component
{
    public $category_id;
    public function deleteCategory(){
        $category = Category::find($this->category_id);
        unlink('assets/imgs/categories/'.$category->newimage);
        $category->delete();
        session()->flash('message','Category has been deleted successfully.');
    }
    public function render()
    {
        $categories = Category::orderBy('name','ASC')->paginate(5);
        return view('livewire.admin.admin-categories-component',['categories'=> $categories]);
    }
}
