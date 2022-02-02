<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputFile extends Component
{ 
    public $name,$placeholder,$required,$id,$labelcol,$accept,$multiple;
    public function __construct($name,$placeholder="",$required=false,$accept="",$id="",$labelcol=4,$multiple=false)
    {
        $this->name=$name;
        $this->placeholder=$placeholder;
        $this->required=$required;
        $this->accept=$accept;
        $this->id=$id;
        $this->labelcol=$labelcol;
        $this->multiple=$multiple;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-file');
    }
}
