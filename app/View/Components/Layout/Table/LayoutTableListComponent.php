<?php
namespace App\View\Components\Layout\Table;

use Illuminate\View\Component;

class LayoutTableListComponent extends Component
{
    /**
     * Array de colunas do cabeçalho.
     *
     * @var array
     */
    public $cabecalho;

    /**
     * Array de colunas do datatable.
     *
     * @var array
     */
    public $colunaDatatables;

    /**
     * Id ta tabela.
     *
     * @var string
     */
    public $id;

    /**
     * Mostrar menu ou noap.
     *
     * @var boolean
     */
    public $menu;


    /**
     * Create a new component instance.
     *
     * @param  array    $colunas
     * @param  boolean  $menu
     * @return void
     */
    public function __construct($colunas = [], $id = 'data-table', $menu = true)
    {
        $this->cabecalho      = array_keys($colunas);
        $this->colunaDatatables = array_values($colunas);
        $this->id             = $id;
        $this->menu           = $menu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.table.list');
    }
}
