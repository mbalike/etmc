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
        $users = User::where('role_id', '3')->get();

        return view('livewire.baptism-form',[

            'members' => $members,
            'deacons' => $users,
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

            'member_id' => $this->member_id,
            'phone' => $this->phone,
            'baptism_date' => $this->baptism_date,
            'occupation' => $this->occupation,
            'description' => $this->description,
            'baptised_by' => $this->baptised_by,
            'testified_by' => $this->testified_by,
            'supervisor_id' => $this->supervisor_id,
            'status' => $this->status,
        ]);

        $this->dispatch('Baptised Member Recorded');
    }
}
