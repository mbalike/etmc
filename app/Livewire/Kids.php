<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kid;

class Kids extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function getListeners(){

        return[

            'refreshComponent' => '$refresh'
        ];
    }

    public function   updatingSearch(){

        $this->resetPage();
    }

    public function render()
    {
        $query = Kid::query();
        $totalKids = Kid::all()->count();
        $maleKids = Kid::where('gender','male')->count();
        $femaleKids = Kid::where('gender','female')->count(); 

        if(!empty($this->search)){

           $searchTerm = '%'. $this->search .'%';
           $query->where(function ($q) use ($searchTerm){

            $q->where('first_name', 'LIKE', $searchTerm)
            ->orWhere('last_name', 'LIKE', $searchTerm)
            ->orWhere('gender', 'LIKE', $searchTerm)
            ->orWhere('birthdate', 'LIKE', $searchTerm);
            
           });

        }
        $Kids = $query->paginate(5);
        
        return view('livewire.kids',[
            'totalKids' => $totalKids,
            'Kids'=> $Kids,
            'maleKids' => $maleKids,
            'femaleKids' => $femaleKids
        ]);
    }

    public $selectedkid = null;
    public $isUpdateModalOpen = false;

    public $kidId;
    public $firstName;
    public $lastName;
    public $gender;
    public $birthdate;
    public $fatherId;
    public $motherId;
    public $supervisorId;

    public function openUpdateModal($kidId){

        $this->selectedkid = Kid::find($kidId);
          
        $this->kidId  = $this->selectedkid->id;
        $this->firstName = $this->selectedkid->first_name;
        $this->lastName = $this->selectedkid->last_name;
        $this->gender = $this->selectedkid->gender;
        $this->birthdate = $this->selectedkid->birthdate;
        $this->fatherId = $this->selectedkid->father_id;
        $this->motherId = $this->selectedkid->mother_id;
        $this->supervisorId = $this->selectedkid->supervisor_id;

            $this->isUpdateModalOpen = true;
    }

    public function closeUpdateModal(){

        $this->isUpdateModalOpen = false;
        $this->resetForm();
    }

    public function update(){


        $this->validate([
          
          'firstName' => 'required|string|max:255',
          'lastName' => 'required|string|max:255',
          'gender' => 'required|in:Male,Female',
          'birthdate' => 'required|string|max:20',
          'fatherId'  => 'nullable|exists:members,id',
          'motherId'  => 'nullable|exists:members,id',
          'supervisorId'  => 'nullable|exists:users,id',
        ]);

        $kid = Kid::find($this->kidId);

        $kid->update([

            'first_name'=> $this->firstName,
            'last_name' => $this->lastName,
            'gender'    => $this->gender,
            'birthdate' => $this->birthdate,
            'mother_id' => $this->fatherId,
            'mother_id' => $this->motherId,
            'supervisor_id' => $this->supervisorId,

        ]);

        $this->closeUpdateModal();
        $this->dispatch('kidUpdated');
    }

    private function resetForm()
    {
        $this->selectedkid = null;
        $this->kidId = null;
        $this->firstName = '';
        $this->lastName = '';
        $this->gender = '';
        $this->birthdate = '';
        $this->fatherId = '';
        $this->motherId = '';
        $this->supervisorId = '';
    }

    public $isDeleteModalOpen = false;

    public function openDeleteModal($kidId){

        $this->selectedkid = Kid::find($kidId);
        $this->kidId = $kidId;
        $this->isDeleteModalOpen = true;
    }

    public function closeDeleteModal(){

        $this->isDeleteModalOpen = false;
        $this->resetForm();
    }

    public function delete(){

        $kid = Kid::find($this->kidId);
        $kid->delete();
            
        $this->closeDeleteModal();
        $this->dispatch('kidDeleted');
    }

}
