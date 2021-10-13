<?php
namespace App\View\Components\Layout\Input;

use Illuminate\View\Component;

class LayoutInputFormComponent extends Component
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
     * Disableddo Input.
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
     * @param  string  $rota
     * @param  boolean  $disabled
     *
     * @return void
     */
    public function __construct(
        $type        = '',
        $class       = 'form-control was-validated',
        $id          = '',
        $name        = '',
        $placeholder = '',
        $value       = '',
        $disabled    = false,
        $rota        = null
    )
    {
        $this->type         = $type;
        $this->class        = $class;
        $this->id           = $id;
        $this->name         = $name;
        $this->placeholder  = $placeholder;

        /**
         * Caso a rota seja informada, o componente definirá se o valor informado deve aparecer ou não.
         * O componente também informará se o campo é Disabled ou não.
         *
         * Caso a rota não seja informada, será atribuído os valores informados no componente.
         */
        if (isset($rota)) {
            if ($rota !== 'create') {
                $this->value = $value;
            } else {
                $this->value = '';
            }

            if ($rota === 'show') {
                $this->disabled = true;
            } else {
                $this->disabled = false;
            }
        } else {
            $this->value        = $value;
            $this->disabled     = $disabled;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.input.form');
    }
}
