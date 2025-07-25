<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    public $name, $description, $price, $productId; // public properties for input fields

    protected $rules = [
        'name' => 'required',
        'description' => 'nullable',
        'price' => 'required|numeric',
    ]; // validation rules (error-handling)
    protected $queryString = ['page'];

    use WithPagination;
    public $page = 1; // <--- important!

    public function updating($name)
    {
        if ($name !== 'page') {
            $this->resetPage();
        }
    }
    public function render()
    {
        // $data['products'] = Product::get(); // get all products
        $data['products'] = Product::paginate(10); // get all products with pagination
        return view('livewire.product-index', $data);
        // return view('livewire.product-index');
    }

    public function save(){
        $this->validate(); // validate input
        $input['name'] = $this->name;
        $input['description'] = $this->description;
        $input['price'] = $this->price;
        if($this->productId){
            $product = Product::find($this->productId);
            $product->update($input);
            // session()->flash('message', 'Product Updated Successfully.');
            // $this->dispatch('productSaved'); // dispatch event to notify parent component
            $this->dispatch('productSaved', message:'Product Updated Successfully.');
            }else{
                Product::create($input);
                // session()->flash('message', 'Product Created Successfully.');
                $this->dispatch('productSaved', message:'Product created successfully.');
        }
        $this->reset();
        $this->dispatch('refreshProducts');
        // return redirect(request()->header('Referer'));
        // $this->dispatchBrowserEvent('scroll-to-product', ['id' => $this->productId]);
        $this->dispatch('scroll-to-product', id: $this->productId);

    }

    public function edit($id){
        $product = Product::find($id);
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;       

        // $productId = $product->id; // get product id
        $this->productId = $product->id; // set product id to public property
    }

    // public function deleteConfirm($id){
    //     $this->dispatch('confirmDelete', id:$id, message:'Are you sure you want to delete this product?');
    // }

    #[On('delete')]
    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', 'Product Deleted Successfully.');
        $this->dispatch('productSaved', message:'Product Deleted Successfully.');
    }
}
