<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Baptism as BaptismModel;
use App\Models\Member;
use App\Models\User;


class BaptismForm extends Component
{
    public $baptism_date;
    public $baptised_by;
    public $testified_by;
    public $status;
    public $member_id;
    public $phone;
    public $occupation;
    public $description;
    public $supervisor_id;

    public function render()
    {
        $members = Member::all();
        $users = User::all();

        return view('livewire.baptism-form',[

            'members' => $members,
            'users' => $users,
        ]);
    }

    protected $rules = [

        'baptism_date' => 'required|string',
        'baptised_by' => 'required|string',
        'testified_by' => 'required|string',
        'status' => 'required|string',
        'member_id' => 'required|string',
        'phone' => 'required|string',
        'occupation' => 'required|string',
        'description' => 'required|string',
        'supervisor_id' => 'required|string',
    ];

    public function addBaptism(){

        $this->validate();

        $member = Member::find($this->member_id);
        $user = User::find($this->supervisor_id);

        BaptismModel::create([

            'baptism_date' => $this->baptism_date,
            'baptised_by' => $this->baptised_by,
            'testified_by' => $this->testified_by,
            'status' => $this->status,
            'member_id' => $this->member_id,
            'phone' => $this->phone,
            'occupation' => $this->occupation,
            'description' => $this->description,
            'supervisor_id' => $this->supervisor_id,
        ]);

        $member->delete();
        $user->delete();

        $this->dispatch('Baptised Member Recorded');
    }
}
