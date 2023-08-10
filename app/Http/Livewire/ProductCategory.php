<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use DB;

class ProductCategory extends Component
{

    public $name,$description,$category_id;
    protected $listeners = [
        'deleteData'
    ];

    public function render()
    {
        $category = Category::orderBy('name','asc')
                            ->paginate(10);

        return view('livewire.category.index',['category' => $category]);
    }

    public function updateDetails($id){
        $categoryDetails = Category::findOrFail($id);

        $this->name = $categoryDetails->name;
        $this->description = $categoryDetails->description;
        $this->category_id = $categoryDetails->id;

        $this->emit('updateDetails');
    }

    public function mount()
    {
        $this->fill([
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->id
            
        ]);
    }

    public function resetInputFields(){
        $category = Category::orderBy('name','asc')
                        ->paginate(10);
    }

    public function store(){
        DB::beginTransaction();
       
        $validated = $this->validate([
            'name' => 'required|unique:categories',
            'description' => 'required',
        ],
        [
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name must be unique.',
            'description.unique' => 'The description field is required.',
        ]);
       
        try{
          
            $categorys = Category::create([
                'name' =>  $validated['name'],
                'description' =>  $validated['description']

            ]);

            $this->resetInputFields();
            flashMessage('Category created successfully.');

        DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
            flashMessage($e->getMessage(),false);
        }
        
    }

    public function update(){
        DB::beginTransaction();
       
        $validated = $this->validate([
            'name' => 'required|unique:categories,name,'.$this->category_id,
            'description' => 'required',
        ],
        [
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name must be unique.',
            'description.unique' => 'The description field is required.',
        ]);
       
        try{
          
            $categorys = Category::find($this->category_id)->update([
                'name' =>  $validated['name'],
                'description' =>  $validated['description']

            ]);

            $this->resetInputFields();
            flashMessage('Category created successfully.');

        DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
            flashMessage($e->getMessage(),false);
        }
        
    }

    public function deleteData($id){
        $dataCategory = Category::find($id);
        $dataProduct = Product::where('product_category_id',$id); //delete atatched products
        if($dataCategory){
            $dataCategory->delete();
        }
        if($dataProduct){
            $dataProduct->delete();
        }
        flashMessage('Category deleted successfully.');
        $this->resetInputFields();
    }
}