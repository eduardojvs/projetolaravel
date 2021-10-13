<?php
namespace App\View\Components\Hints\Feedback;

use Illuminate\View\Component;

class HintFeedbackHelperComponent extends Component
{
    /**
     * Título do Hint.
     *
     * @var string
     */
    public $titulo;

    /**
     * Explicação do Hint.
     *
     * @var string
     */
    public $explicacao;


    /**
     * Create a new component instance.
     *
     * @param  string  $titulo
     * @param  string  $explicacao
     * @return void
     */
    public function __construct($titulo = '', $explicacao = '')
    {
        $this->titulo     = $titulo;
        $this->explicacao = $explicacao;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.hints.feedback.helper');
    }
}
