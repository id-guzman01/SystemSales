<?php

namespace App\View\Components\modals;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class product_stock extends Component
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
        return view('components.modals.product_stock');
    }
}
