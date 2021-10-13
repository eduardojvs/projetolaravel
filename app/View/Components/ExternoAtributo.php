<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ExternoAtributo extends Component
{


    public $nomecomplete;

    /**
     * Rotina
     *
     * @var string
     */
    public $rotina;

    /**
     * Nome
     *
     * @var string
     */
    public $nome;

    /**
     * Descrição
     *
     * @var string
     */
    public $desc;

    /**
     * Valor
     *
     * @var string
     */
    public $valor;

    /**
     * Visualização
     *
     * @var boolean
     */
    public $visualizacao;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rotina= '', $nome= '', $desc = '', $valor = '', $visualizacao = false,$nomecomplete='')
    {
        $this->rotina = $rotina;
        $this->nome = $nome;
        $this->desc = $desc;
        $this->valor = $valor;
        $this->visualizacao = $visualizacao;
        $this->nomecomplete = $nomecomplete;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.externo-atributo');
    }
}
