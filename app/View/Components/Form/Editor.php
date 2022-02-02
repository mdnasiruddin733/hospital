<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Editor extends Component
{
    public $name,$value,$placeholder,$required,$autocomplete,$autofocus,$id,$labelcol;
    public function __construct($name,$value="",$placeholder="",$required=false,$autocomplete=false,$autofocus=false,$id="",$labelcol=12)
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

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.editor');
    }
}
