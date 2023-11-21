<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class DashboardSearchProduct extends Component
{

    public $name = '';
    public function render()
    {
        $data = collect(Product::where('name','LIKE',"%$this->name%")->get())->take(3);
        return view('livewire.dashboard-search-product',compact('data'));
    }
}
