<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputNumber extends Component
{
    public $name,$value,$placeholder,$required,$autocomplete,$autofocus,$id,$labelcol,$min,$max;
    public function __construct($name,$value="",$placeholder="",$required=false,$autocomplete=false,$autofocus=false,$id="",$labelcol=4,$min=null,$max=null)
    {
        $this->name=$name;
        $this->value=$value;
        $this->placeholder=$placeholder;
        $this->required=$required;
        $this->autocomplete=$autocomplete;
        $this->autofocus=$autofocus;
        $this->id=$id;
        $this->labelcol=$labelcol;
        $this->min=$min;
        $this->max=$max;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-number');
    }
}
