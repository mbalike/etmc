<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member; 

class MemberList extends Component
{
    public $search = '';

    public function render()

    {
        
        $members = Member::where('first_name', 'like', '%' . $this->search . '%')
                       ->orWhere('last_name', 'like', '%' . $this->search . '%')
                       ->orWhere('phone', 'like', '%' . $this->search . '%')
                       ->orWhere('marital_status', 'like', '%' . $this->search . '%')
                       ->get();

                    //    dd($members);

                return view('livewire.member-list',['members' => $members]);

    }
}
