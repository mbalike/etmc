<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Member; 
use App\Models\User; 

class TestComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $selectedSupervisor = null; 
    public $supervisors = [];

    public function mount()
    {
        // Fetch all supervisors from the Users table
        $this->supervisors = User::where('role_id', '3')->get(); 
    }

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

    public function updateSupervisorFilter($supervisorId)
    {
        $this->selectedSupervisor = $supervisorId;
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

        if (!empty($this->selectedSupervisor)) {
            $query->where('supervisor_id', $this->selectedSupervisor);
        }

        if (auth()->check() && auth()->user()->role_id == 3) {
            $query->where('supervisor_id', auth()->id());
        }
        
        
        $total = $query->count();
        $males = (clone $query)->where('gender', 'male')->count();
        $females = (clone $query)->where('gender', 'female')->count();

        $members = $query->paginate(5);

                return view('livewire.test-component',[
                            
                    'members' => $members,
                    'total'   => $total,
                    'males'   => $males,
                    'females' => $females,
                    'supervisors' => $this->supervisors,
                    'selectedSupervisor' => $this->selectedSupervisor,
                                    
                                ]);

        
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
public $birthdate;
public $marital_status;
public $family_id;
public $supervisor_id;
public $spouse_id;

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
    $this->birthdate = $this->selectedMember->birthdate ? date('Y-m-d', strtotime($this->selectedMember->birthdate)) : null;
    $this->marital_status = $this->selectedMember->marital_status;
    $this->family_id = $this->selectedMember->family_id;
    $this->supervisor_id = $this->selectedMember->supervisor_id;
    $this->spouse_id = $this->selectedMember->spouse_id;

    
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
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'gender' => 'required|in:Male,Female',
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
    $this->memberId = $memberId;
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
    $this->dispatch('memberDeleted'); 
}
}
