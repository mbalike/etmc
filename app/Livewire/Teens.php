<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Teenager;

class Teens extends Component
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
        $query = Teenager::query();
        $totalTeens = Teenager::all()->count();
        $maleTeens = Teenager::where('gender','male')->count();
        $femaleTeens = Teenager::where('gender','female')->count(); 

        if(!empty($this->search)){

           $searchTerm = '%'. $this->search .'%';
           $query->where(function ($q) use ($searchTerm){

            $q->where('first_name', 'LIKE', $searchTerm)
            ->orWhere('last_name', 'LIKE', $searchTerm)
            ->orWhere('gender', 'LIKE', $searchTerm)
            ->orWhere('birthdate', 'LIKE', $searchTerm);
            
           });

        }
        $teens = $query->paginate(5);
        
        return view('livewire.teens',[
            'totalTeens' => $totalTeens,
            'teens'=> $teens,
            'maleTeens' => $maleTeens,
            'femaleTeens' => $femaleTeens
        ]);
    }

    public $selectedTeen = null;
    public $isUpdateModalOpen = false;

    public $teenId;
    public $firstName;
    public $lastName;
    public $gender;
    public $birthdate;
    public $fatherId;
    public $motherId;
    public $supervisorId;

    public function openUpdateModal($teenId){

        $this->selectedTeen = Teenager::find($teenId);
          
        $this->teenId  = $this->selectedTeen->id;
        $this->firstName = $this->selectedTeen->first_name;
        $this->lastName = $this->selectedTeen->last_name;
        $this->gender = $this->selectedTeen->gender;
        $this->birthdate = $this->selectedTeen->birthdate;
        $this->fatherId = $this->selectedTeen->father_id;
        $this->motherId = $this->selectedTeen->mother_id;
        $this->supervisorId = $this->selectedTeen->supervisor_id;

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
        //   'gender' => 'required|in:Male,Female',
        //   'birthdate' => 'required|string|max:20',
        //   'fatherId'  => 'nullable|exists:members,id',
        //   'motherId'  => 'nullable|exists:members,id',
        //   'supervisorId'  => 'nullable|exists:users,id',
        ]);

        $teen = Teenager::find($this->teenId);

        $teen->update([

            'first_name'=> $this->firstName,
            'last_name' => $this->lastName,
            'gender'    => $this->gender,
            'birthdate' => $this->birthdate,
            'mother_id' => $this->fatherId,
            'mother_id' => $this->motherId,
            'supervisor_id' => $this->supervisorId,

        ]);

        $this->closeUpdateModal();
        $this->dispatch('TeenUpdated');
    }

    private function resetForm()
    {
        $this->selectedTeen = null;
        $this->TeenId = null;
        $this->firstName = '';
        $this->lastName = '';
        $this->gender = '';
        $this->birthdate = '';
        $this->fatherId = '';
        $this->motherId = '';
        $this->supervisorId = '';
    }

    public $isDeleteModalOpen = false;

    public function openDeleteModal($teenId){

        $this->selectedTeen = Teenager::find($teenId);
        $this->teenId = $teenId;
        $this->isDeleteModalOpen = true;
    }

    public function closeDeleteModal(){

        $this->isDeleteModalOpen = false;
        $this->resetForm();
    }

    public function delete(){

        $teen = Teenager::find($this->teenId);
        $teen->delete();
            
        $this->closeDeleteModal();
        $this->dispatch('TeenDeleted');
    }

}
