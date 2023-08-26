<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public $showDropdown = false;

    public function archive()
    {
        $this->showDropdown = false;
    }

    public function delete()
    {
        $this->showDropdown = false;
    }

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
