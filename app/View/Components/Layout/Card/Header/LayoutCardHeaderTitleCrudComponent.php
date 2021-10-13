<?php
namespace App\View\Components\Layout\Card\Header;

use Illuminate\View\Component;

class LayoutCardHeaderTitleCrudComponent extends Component
{
    /**
     * Titulo do Header do Card.
     *
     * @var string
     */
    public $titulo;

    /**
     * Codigo do registro.
     *
     * @var string
     */
    public $codigo;

    /**
     * Nome da Rota [create/edit/show].
     *
     * @var string
     */
    public $rota;


    /**
     * Create a new component instance.
     *
     * @param  string  $element
     * @param  string  $article
     * @param  string  $rota
     * @return void
     */
    public function __construct($titulo, $codigo, $rota)
    {
        $this->titulo = $titulo;
        $this->codigo = $codigo;
        $this->rota   = $rota;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.card.header.title-crud');
    }
}
