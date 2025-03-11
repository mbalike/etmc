<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserForm extends Component
{
    public $name;
    public $email;
    public $phone;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'phone' => 'required'
    ];

    public function render()
    {
        return view('livewire.user-form');
    }

    public function addUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make('default_password')
        ]);

        // Reset form fields
        $this->reset(['name', 'email', 'phone']);

        // Show success message
        session()->flash('message', 'User successfully added.');
        
        // Emit an event to tell the users table component to refresh
        $this->dispatch('userAdded');
    }
}