<?php
namespace App\View\Components\Layout\Label;

use Illuminate\View\Component;

class LayoutLabelFormComponent extends Component
{
    /**
     * For do Label.
     *
     * @var string
     */
    public $for;

    /**
     * Classe do Label.
     *
     * @var string
     */
    public $class;

    /**
     * Título do Label.
     *
     * @var string
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @param  string  $classe
     * @param  string  $for
     * @param  string  $title
     * @return void
     */
    public function __construct($for = '', $class = 'col-sm-2 col-form-label text-right input-form-padding-right', $title = '')
    {
        $this->for   = $for;
        $this->class = $class;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.label.label-form');
    }
}
