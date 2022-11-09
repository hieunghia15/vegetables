<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Auth;

class FarmProductSearching extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $product;
    public function render()
    {
        $role = Auth::user()->getRoleNames()->first();
        if ($role == 'admin') {
            $this->product = Product::join('farm_product_types', 'farm_product_types.id', '=', 'products.farm_product_type_id')
                ->where('products.name', 'LIKE', '%' . ($this->search) . '%')
                ->orWhere('farm_product_types.name', 'LIKE', '%' . ($this->search) . '%')
                ->select(['products.*'])
                ->paginate(10);
        } elseif ($role == 'farmer') {
            $farmer_id = Auth::user()->farmer->id;
            $this->product = Product::join('farm_product_types', 'farm_product_types.id', '=', 'products.farm_product_type_id')
                ->where('products.farmer_id', $farmer_id)
                ->where(function ($query) {
                    $query->Where('products.name', 'LIKE', '%' . ($this->search) . '%')
                        ->orWhere('farm_product_types.name', 'LIKE', '%' . ($this->search) . '%');
                })
                ->select(['products.*'])
                ->paginate(10);
        }
        $links = $this->product;
        $this->product = collect($this->product->items());
        return view('livewire.farm-product-searching', [
            'product' => compact($this->product),
            'links' => $links
        ]);
    }
}