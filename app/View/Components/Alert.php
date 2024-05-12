<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct(
        public string $message,
        public array $options,
    ) {
    }
    
    public $title = 'Test Page Layout';
    public $selected = 'hayy';

    public function isSelected($option):bool{
        return $option === $this->selected;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return function (array $data) {
            // dd($data);
            // $data['componentName'];
            // $data['attributes'];
            // $data['slot'];
    
            return view('components.alert');
        };
    }
}
