<?php

namespace App\Livewire\Members;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Member; 
use App\Models\User; 

class Table extends Component
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
        
        $total = $query->count();
        $males = (clone $query)->where('gender', 'male')->count();
        $females = (clone $query)->where('gender', 'female')->count();

        $members = $query->paginate(5);

                return view('livewire.members.table',[
                            
                    'members' => $members,
                    'total'   => $total,
                    'males'   => $males,
                    'females' => $females,
                    'supervisors' => $this->supervisors,
                    'selectedSupervisor' => $this->selectedSupervisor,
                                    
                                ]);

        
    }

}
