<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputEmail extends Component
{


    public $name,$value,$placeholder,$required,$autocomplete,$autofocus,$id,$labelcol;
    public function __construct($name,$value="",$placeholder="",$required=false,$autocomplete=false,$autofocus=false,$id="",$labelcol=4)
    {
        $this->name=$name;
        $this->value=$value;
        $this->placeholder=$placeholder;
        $this->required=$required;
        $this->autocomplete=$autocomplete;
        $this->autofocus=$autofocus;
        $this->id=$id;
        $this->labelcol=$labelcol;

    }
    public function render()
    {
        return view('components.form.input-email');
    }
}
