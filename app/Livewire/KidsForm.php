<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Child;
use App\Models\Member;
use App\Models\User;

class KidsForm extends Component
{
    public $firstName;
    public $lastName;
    public $Gender;
    public $birthdate;
    public $fatherId;
    public $motherId;
    public $supervisorId;

    protected $rules = [

        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'Gender' => 'required|in:Male,Female',
        'birthdate' => 'required|date|before:today',
        'fatherId' => ['nullable', 'exists:members,id'],
        'motherId' => ['nullable', 'exists:members,id'],
        'supervisorId' => ['required', 'exists:users,id'],
    ];

    public function render()
    {
        $deacons = User::where('role_id','3')->get();
        $fathers = Member::where('gender','male')->get();
        $mothers = Member::where('gender','female')->get();

        return view('livewire.kids-form',[

            'deacons' => $deacons,
            'fathers' => $fathers,
            'mothers' => $mothers
        ]);
    }

    public function addKid(){

        $this->validate();
        
         Child::create([
            
            'first_name' => $this->firstName,
            'last_name'  => $this->lastName,
            'gender'     => $this->Gender,
            'birthdate'  => $this->birthdate,
            'father_id'  => $this->fatherId,
            'mother_id'  => $this->motherId,
            'supervisor_id' => $this->supervisorId,

         ]);

         $this->reset(
             
             'firstName',
             'lastName',
             'Gender',
             'birthdate',
             'fatherId',
             'motherId',
             'supervisorId'
        );

        $this->dispatch('KidAdded');

        session()->flash('message', 'Child successfully added.');
    }
}
