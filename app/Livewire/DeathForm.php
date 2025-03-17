<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Death;
use App\Models\Member;

class DeathForm extends Component
{
    public $deathId;
    public $deathDate;
    public $memberId;

    protected $rules = [

        'deathDate' => 'required|string',
    ];


    public function render()
    {
        $members = Member::all();
        
        return view('livewire.death-form',[

            'members' => $members,
        ]);
    }

    public function addDeath(){

        $member = Member::find($this->memberId);

        Death::create([

            'full_name' => $member->first_name. ' ' .$member->last_name,
            'date_of_death' => $this->deathDate
        ]);

        $member->delete();

        $this->dispatch('Deceased Member Recorded');
  
    }
}
