<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use DB;
class Products extends Component
{
    use WithPagination, WithFileUploads;
    
    

    public $filter_category = null;
    public $filter_orderBy = 'desc';
    public $sku,$image, $name, $description,$product_category_id;
    protected $listeners = [
        'deleteData'
    ];

    public function render()
    {
        $products = Product::when($this->filter_category,function($query){
                                $query->where('product_category_id',$this->filter_category);
                            })->orderBy('name',$this->filter_orderBy)
                            ->paginate(10);

        $categories = Category::all();
    
        return view('livewire.products.index',['products' => $products, 'categories' =>  $categories]);
    }

    public function viewDetails($id){
        $this->resetInputFields();
        
        $productDetails = Product::findOrFail($id);

        $this->sku = $productDetails->sku;
        $this->image = $productDetails->image;
        $this->name = $productDetails->name;
        $this->product_category_id = $productDetails->product_category_id;
        $this->description = $productDetails->description;
        
        $this->emit('viewDetails');
    }

    public function mount()
    {
        $this->fill([
            'image' => $this->image,
            'name' => $this->name,
            'product_category_id' => $this->product_category_id,
            'description' => $this->description,
            
        ]);
    }


    public function store(){
        DB::beginTransaction();
       
        $validated = $this->validate([
            'image' => 'nullable',//'image|max:1024', 
            'name' => 'required|unique:products',
            'product_category_id' => 'required',
            'description' => 'required',
        ],
        [
            'image.required' => 'The product image field is required.',

            'name.required' => 'The product name field is required.',
            'name.unique' => 'The product name must be unique.',

            'product_category_id.required' => 'The category field is required.',
            'description.required' => 'The product description field is required.',
            
        ]);

        $path = '';
        if($validated['image']){
            $path = $validated['image']->store('img', 'public');
        }

        try{
          
            $category = new Product;

            $category->image = str_replace('img/','',$path);
            $category->name =  $validated['name'];
            $category->product_category_id =  $validated['product_category_id'];
            $category->description =  $validated['description'];
            $category->save();

        


            $this->resetInputFields();
            flashMessage('Category created successfully.');

        DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
            flashMessage($e->getMessage(),false);
        }
        
    }


    public function resetInputFields(){
        $this->image = '';
        $this->name = '';
        $this->product_category_id = '';
        $this->description = '';
    }

    public function deleteData($id){
        $data = Product::find($id);
        if($data){
            $data->delete();
        }
        flashMessage('Product deleted successfully.');
        $this->resetInputFields();
    }
}
