<?php
namespace App\View\Components\Layout\Button;

use Illuminate\View\Component;

class LayoutButtonVoltarComponent extends Component
{
    /**
     * Classe do botão.
     *
     * @var string
     */
    public $classe;

    /**
     * Texto do botão.
     *
     * @var string
     */
    public $texto;


    /**
     * Create a new component instance.
     *
     * @param  string  $classe
     * @param  string  $texto
     * @return void
     */
    public function __construct($classe = '', $texto = 'Voltar')
    {
        $this->classe = $classe;
        $this->texto = $texto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.button.voltar');
    }
}
