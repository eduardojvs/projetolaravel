<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Externo extends Component
{

    /**
     * Classe
     *
     * @var string
     */
    public $class;

    /**
     * Rotina
     *
     * @var string
     */
    public $rotina;

    /**
     * Título
     *
     * @var string
     */
    public $titulo;

    /**
     * Nome da chave
     *
     * @var string
     */
    public $chave;

    /**
     * Valor da chave
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
    public function __construct($class = '', $rotina= '', $titulo = 'Selecionar', $chave= '', $valor = '', $visualizacao = false)
    {
        $this->class = $class;
        $this->rotina = $rotina;
        $this->titulo = $titulo;
        $this->chave = $chave;
        $this->valor = $valor;
        $this->visualizacao = $visualizacao;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.externo');
    }
}
