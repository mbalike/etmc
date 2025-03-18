<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Death;

class Deaths extends Component
{

    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function getListeners(){
        return [

            'refreshComponent' => '$refresh'
        ];
    }

    public function updatingSearch(){

        $this->resetPage(); 
    }


    public $memberId;
    public $date_of_death;
    
    public function render()
    {
        $query = Death::query();
        $totalDeaths = Death::all()->count();

        if(!empty($this->search)){

           $searchTerm = '%'. $this->search .'%';
           $query->where(function ($q) use ($searchTerm){

            $q->where('date_of_death', 'LIKE', $searchTerm);
            
           });

        }
        $deaths = $query->paginate(5);
        
        return view('livewire.deaths',[
            'totalDeaths' => $totalDeaths,
            'deaths'=> $deaths,
        ]);
    }

    public $selectedDeath = null;
    public $isUpdateModalOpen = false;

    public $deathId;
    public $fullName;
    public $deathDate;
    

    public function openUpdateModal($deathId){

        $this->selectedDeath = Death::find($deathId);
          
        $this->deathId  = $this->selectedDeath->id;
        $this->fullName = $this->selectedDeath->full_name;
        $this->deathDate = $this->selectedDeath->date_of_death;
        

            $this->isUpdateModalOpen = true;
    }

    public function closeUpdateModal(){

        $this->isUpdateModalOpen = false;
        $this->resetForm();
    }

    public function update(){


        $this->validate([
            
          'deathDate' => 'required|date',
          'fullName'  => 'required|string|max:20'

        ]);

        $death = Death::find($this->deathId);

        $death->update([

            'date_of_death' => $this->deathDate,
            'full_name'     => $this->fullName

        ]);

        $this->closeUpdateModal();
        $this->dispatch('deathUpdated');
    }

    private function resetForm()
    {
        $this->selectedDeath = null;
        $this->deathId = null;
        $this->deathDate = '';
    }

    public $isDeleteModalOpen = false;

    public function openDeleteModal($deathId){

        $this->selectedDeath = Death::find($deathId);
        $this->deathId = $deathId;
        $this->isDeleteModalOpen = true;
    }

    public function closeDeleteModal(){

        $this->isDeleteModalOpen = false;
        $this->resetForm();
    }

    public function delete(){

        $death = Death::find($this->deathId);
        $death->delete();
            
        $this->closeDeleteModal();
        $this->dispatch('deathDeleted');
    }

}
