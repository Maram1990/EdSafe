<?php

namespace App\Livewire;

use Livewire\Component;

class ShowQuestion extends Component
{
    public $mark=0;

    public function addmark($answer)
    {
        $this->mark =+ $answer->istrue;
    }
    public function render()

    {
        return view('livewire.show-question');
    }
}
