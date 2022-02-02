<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{ 
    public $name,$required,$id,$labelcol;
    public function __construct($name,$required=false,$id="",$labelcol=4)
    {
        $this->name=$name;
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
        return view('components.form.select');
    }
}
