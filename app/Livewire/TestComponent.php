<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Member; 

class TestComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function getListeners()
{
    return [
        'refreshComponent' => '$refresh'
    ];
}

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $query = Member::query();

        // More flexible search across multiple columns
        if (!empty($this->search)) {
            $searchTerm = '%' . $this->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('first_name', 'LIKE', $searchTerm)
                  ->orWhere('last_name', 'LIKE', $searchTerm)
                  ->orWhere('phone', 'LIKE', $searchTerm)
                  ->orWhere('email', 'LIKE', $searchTerm)
                  ->orWhere('marital_status', 'LIKE', $searchTerm);
            });
        }

        $members = $query->paginate(5);

                return view('livewire.test-component',['members' => $members]);

        
    }

    // Add these properties to your MembersTable class
public $selectedMember = null;
public $isUpdateModalOpen = false;

// Form properties
public $memberId;
public $firstName;
public $lastName;
public $phone;
public $email;
public $gender;

// Add these methods
public function openUpdateModal($memberId)
{
    $this->selectedMember = Member::find($memberId);
    
    // Populate form fields
    $this->memberId = $this->selectedMember->id;
    $this->firstName = $this->selectedMember->first_name;
    $this->lastName = $this->selectedMember->last_name;
    $this->phone = $this->selectedMember->phone;
    $this->email = $this->selectedMember->email;
    $this->gender = $this->selectedMember->gender;
    
    $this->isUpdateModalOpen = true;
}

public function closeUpdateModal()
{
    $this->isUpdateModalOpen = false;
    $this->resetForm();
}

public function update()
{
    // Validate form data
    $this->validate([
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        // 'phone' => 'required|string|max:20',
        // 'email' => 'required|email|max:255',
        // 'gender' => 'required|in:Male,Female',
    ]);
    
    // Update member
    $member = Member::find($this->memberId);
    $member->update([
        'first_name' => $this->firstName,
        'last_name' => $this->lastName,
        'phone' => $this->phone,
        'email' => $this->email,
        'gender' => $this->gender,
    ]);
    
    $this->closeUpdateModal();
    $this->dispatch('memberUpdated'); // Event for notification
}

private function resetForm()
{
    $this->selectedMember = null;
    $this->memberId = null;
    $this->firstName = '';
    $this->lastName = '';
    $this->phone = '';
    $this->email = '';
    $this->gender = '';
}

// Add these properties to your MembersTable class
public $isDeleteModalOpen = false;

// Add these methods
public function openDeleteModal($memberId)
{
    $this->selectedMember = Member::find($memberId);
    $this->memberId = $this->selectedMember->id;
    $this->isDeleteModalOpen = true;
}

public function closeDeleteModal()
{
    $this->isDeleteModalOpen = false;
    $this->resetForm();
}

public function delete()
{
    $member = Member::find($this->memberId);
    $member->delete();
    
    $this->closeDeleteModal();
    $this->dispatch('memberDeleted'); // Event for notification
}
}
