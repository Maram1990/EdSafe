<?php

namespace App\Livewire;

use App\Models\Question;
use Livewire\Component;

class ShowQuestion extends Component
{
    public $mark=0;

     
    public function render()

    {
        $this->questions = Question::with(['answer'=>function($query){$query->inRandomOrder();}])->inRandomOrder()->get();
        return view('livewire.show-question');
    }
}
