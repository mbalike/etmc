<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Death;

class Deaths extends Component
{

    public $memberId;
    public $date_of_death;
    
    public function render()
    {
        return view('livewire.deaths');
    }
}
