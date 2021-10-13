<?php
namespace App\View\Components\Modals;

use Illuminate\View\Component;

class ModalDeleteComponent extends Component
{
    /**
     * Element which is being deleted.
     *
     * @var string
     */
    public $element;

    /**
     * Article to refer to the element.
     *
     * @var string
     */
    public $article;


    /**
     * Create a new component instance.
     *
     * @param  string  $element
     * @param  string  $article
     * @return void
     */
    public function __construct($element, $article)
    {
        $this->element = $element;
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.delete');
    }
}
