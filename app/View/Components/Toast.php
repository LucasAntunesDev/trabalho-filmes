<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toast extends Component
{

    public $tipo;

    public function __construct(string $tipo)
    {
        $this->tipo = $tipo;
    }

    public function render(): View|Closure|string
    {
        return view('components.toast');
    }
}