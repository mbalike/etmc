<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Users extends Component
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


    public function render()
    {
        $query = Member::query();

           if(!empty($this->search)){

            $searchTerm = '%'. $this->search .'%';
            $query->where(function ($q) use ($searchTerm){
                $q->where('name', 'LIKE', $searchTerm)
                  ->orWhere('phone', 'LIKE', $searchTerm)
                  ->orWhere('email', 'LIKE', $searchTerm);
            });
           } 

           $users = $query->paginate(5);

        return view('livewire.users', ['users' => $users]);
    }
}
