<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DateInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $class,
        public $id,
        public $label,
        public $type,
        public $name,
        public $placeholder,
        public $readonly,
        public $value,
        public String $max
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.date-input');
    }
}
