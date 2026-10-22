<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DeleteModal extends Component
{
    public function __construct(
    public int $id,
    public string $name,
    public string $route
) {}

    public function render(): View
    {
        return view('components.delete-modal');
    }
}