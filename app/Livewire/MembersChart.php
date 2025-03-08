<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member;

class MembersChart extends Component
{

    public $chartData = [];

    public function mount(){

        $this->chartData = [

            ['name' => 'Male', 'value' => Member::where('gender', 'male')->count()],
            ['name' => 'Female', 'value' => Member::where('gender', 'female')->count()],

        ];
    }


    public function render()
    {
        return view('livewire.members-chart');
    }
}
