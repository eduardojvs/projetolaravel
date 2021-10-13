<?php
namespace App\View\Components\Validation\Feedback;

use Illuminate\View\Component;

class ValidationFeedbackSmallComponent extends Component
{
    /**
     * Name of the small input feedback.
     *
     * @var string
     */
    public $name;


    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.validation.feedback.small');
    }
}
