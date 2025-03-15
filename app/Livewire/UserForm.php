<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $roleId;

    protected $rules = [
        'name'   => 'required|min:3',
        'email'  => 'required|email|unique:users',
        'phone'  => 'required',
        'roleId' => 'required'
    ];

    public function render()
    {
        $roles = Role::all();
        return view('livewire.user-form', ['roles' => $roles]);
    }

    public function addUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role_id' => $this->roleId,
            'password' => Hash::make('default_password')
        ]);

        // Reset form fields
        $this->reset(['name', 'email', 'phone','role_id','password']);

        // Show success message
        session()->flash('message', 'User successfully added.');
        
        // Emit an event to tell the users table component to refresh
        $this->dispatch('userAdded');
    }
}