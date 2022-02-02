<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputCheckbox extends Component
{
    public $name,$value,$required,$checked,$id,$labelcol;
    public function __construct($name,$value=0,$required=false,$checked=false,$id="",$labelcol=4)
    {
        $this->name=$name;
        $this->value=$value;
        $this->checked=$checked;
        $this->required=$required;
        $this->id=$id;
        $this->labelcol=$labelcol;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-checkbox');
    }
}
