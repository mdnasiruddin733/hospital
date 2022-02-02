<?php

namespace App\View\Components;

use App\Models\Product as ModelsProduct;
use Illuminate\View\Component;

class product extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $product;
    public function __construct($id=null)
    {
        $this->product=ModelsProduct::find($id);
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product');
    }
}
