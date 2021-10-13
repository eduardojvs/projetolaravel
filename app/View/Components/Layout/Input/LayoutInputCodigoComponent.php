<?php
namespace App\View\Components\Layout\Input;

use Illuminate\View\Component;

class LayoutInputCodigoComponent extends Component
{
    /**
     * Tipo do Input.
     *
     * @var string
     */
    public $type;

    /**
     * Classe do Input.
     *
     * @var string
     */
    public $class;

    /**
     * Id do Input.
     *
     * @var string
     */
    public $id;

    /**
     * Name do Input.
     *
     * @var string
     */
    public $name;

    /**
     * Placeholder do Input.
     *
     * @var string
     */
    public $placeholder;

    /**
     * Value do Input.
     *
     * @var string
     */
    public $value;

    /**
     * Disabled do Input.
     *
     * @var boolean
     */
    public $disabled;


    /**
     * Create a new component instance.
     *
     * @param  string  type
     * @param  string  $class
     * @param  string  $id
     * @param  string  $name
     * @param  string  $placeholder
     * @param  string  $value
     * @param  boolean  $disabled
     *
     * @return void
     */
    public function __construct(
        $type        = 'text',
        $class       = 'form-control',
        $id          = 'id',
        $name        = 'id',
        $placeholder = 'Código',
        $value       = '',
        $disabled    = true
    )
    {
        $this->type         = $type;
        $this->class        = $class;
        $this->id           = $id;
        $this->name         = $name;
        $this->placeholder  = $placeholder;
        $this->value        = $value;
        $this->disabled     = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.input.codigo');
    }
}
