<?php

namespace App\Livewire\UsersP;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Role;

class Table extends Component
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
        $query = User::query();

           if(!empty($this->search)){

            $searchTerm = '%'. $this->search .'%';
            $query->where(function ($q) use ($searchTerm){
                $q->where('name', 'LIKE', $searchTerm)
                  ->orWhere('phone', 'LIKE', $searchTerm)
                  ->orWhere('email', 'LIKE', $searchTerm);
            });
           } 

           $users   = $query->paginate(5);
           $roles   = Role::all();
           $total   = User::all()->count();
           $pastors = User::where('role_id','2')->count();
           $deacon = User::where('role_id','3')->count();
           $trustee = User::where('role_id','4')->count();
           $evangelist = User::where('role_id','5')->count();
           $musician   =User::where('role_id', '6')->count();
           

        return view('livewire.users-p.table', [
            
            'users' => $users,
            'roles' => $roles,
            'total' => $total,
            'pastor' => $pastors,
            'deacon' => $deacon,
            'trustee' => $trustee,
            'evangelist' => $evangelist,
            'musician' => $musician,

            
            ]);
    }
}
