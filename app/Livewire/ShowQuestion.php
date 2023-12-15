<?php

namespace App\Livewire;

use Livewire\WithPagination;

use App\Models\Question;
use Livewire\Component;

class ShowQuestion extends Component
{

    use WithPagination;
    public function render()

    {
       $questions = Question::with(['answer'=>function($query){$query->inRandomOrder();}])->inRandomOrder()->limit(3)->get();
        return view('livewire.show-question',compact('questions'));
    }
}
