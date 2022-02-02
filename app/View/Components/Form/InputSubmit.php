<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputSubmit extends Component
{
    public $value,$col,$id,$class,$offset;
    public function __construct($value="Submit",$col="12",$id="",$class="btn btn-success",$offset="4")
    {
        $this->value=$value;
        $this->col=$col;
        $this->id=$id;
        $this->class=$class;
        $this->offset=$offset;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-submit');
    }
}
