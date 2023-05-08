<?php

namespace App\View\Components\alert;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class alert_x extends Component{

    public $alerta;

    /**
     * Create a new component instance.
     */
    public function __construct($alerta)
    {
        $this->alerta = $alerta;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert.alert_x');
    }
}
