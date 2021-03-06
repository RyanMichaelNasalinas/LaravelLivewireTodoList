<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TodoStep extends Component
{
    public $steps = [];

    public function increment()
    {
        $this->steps[] = count($this->steps);
    }

    public function decrement($index)
    {
        unset($this->steps[$index]);
    }

    public function render()
    {
        return view('livewire.todo-step');
    }
}
