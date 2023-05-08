<?php

namespace App\View\Components\modals;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class products_salidas extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.products_salidas');
    }
}
