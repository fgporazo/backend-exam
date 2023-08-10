<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;


class Dashboard extends Component
{
    use WithPagination;
    public $filter_category = null;
    public $filter_orderBy = 'asc';
    public $image, $name, $description;

    public function render()
    {
        $products = Product::when($this->filter_category,function($query){
                                $query->where('product_category_id',$this->filter_category);
                            })->orderBy('name',$this->filter_orderBy)
                            ->paginate(10);

        $categories = Category::all();
    
        return view('livewire.dashboard.index',['products' => $products, 'categories' =>  $categories]);
    }

    public function viewDetails($id){
        $productDetails = Product::findOrFail($id);

        $this->image = $productDetails->image;
        $this->name = $productDetails->name;
        $this->description = $productDetails->description;

        $this->emit('viewDetails');
    }

    public function mount()
    {
        $this->fill([
            'image' => $this->image,
            'name' => $this->name,
            'description' => $this->description,
            
        ]);
    }

    public function resetInputFields(){
        $this->image = '';
        $this->name = '';
        $this->description = '';
    }
}
