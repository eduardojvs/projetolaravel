<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Grid extends Component
{
    /**
     * Id
     *
     * @var string
     */
    public $id;

    /**
     * Título
     *
     * @var string
     */
    public $titulo;

    /**
     * Visualização
     *
     * @var boolean
     */
    public $visualizacao;

    /**
     * Variável do loop
     *
     * @var array
     */
    public $varLoop;

    /**
     * Nome da variável de iteração
     *
     * @var string
     */
    public $varIteracao;

    /**
     * Quantidade de linhas iniciais no grid
     *
     * @var int
     */
    public $linhasIniciais;

    /**
     * Tradução de propriedades do objeto do loop em relação aos campos do grid
     *
     * @var array
     */
    public $campos;

    /**
     * Títulos das propriedades do objeto que serão listadas no cabeçalho do Grid
     *
     * @var array
     */
    public $cabecalho;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = '', $titulo= '', $visualizacao = false, $varLoop = array(), $varIteracao = 'i', $linhasIniciais = '5', $campos = array(), $cabecalho = array())
    {
        $id = ($id) ? $id : uniqid('grid_');
        $this->id             = $id;
        $this->titulo         = $titulo;
        $this->visualizacao   = $visualizacao;
        $this->varLoop        = $varLoop;
        $this->varIteracao    = $varIteracao;
        $this->linhasIniciais = $linhasIniciais;
        $this->campos         = $campos;
        $this->cabecalho      = $cabecalho;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.grid');
    }
}
