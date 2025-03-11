<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $query = User::query();

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

    public $selectedUser = null;
    public $isUpdateModalOpen = false;

    //Form properties

    public $userId;
    public $name;
    public $phone;
    public $email;
    

    public function openUpdateModal($userId){
            
        $this->selectedUser = User::find($userId);

        $this->userId = $this->selectedUser->id;
        $this->name   = $this->selectedUser->name;
        $this->phone  = $this->selectedUser->phone;
        $this->email  = $this->selectedUser->email;

        $this->isUpdateModalOpen = true;
    }

    public function closeUpdateModal(){

        $this->isUpdateModalOpen = false;
        $this->resetForm();
    }

    public function update(){

        $this->validate([

            'name'   => 'required|string|max:255',
            'phone'  => 'required|string|max:14',
            'email'  => 'required|email|max:255',

        ]);

        $user = User::find($this->userId);
        $user->update([

            'name'  => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
 
        ]);

        $this->closeUpdateModal();
        // $this->dispach('userUpdated');
    }

    private function resetForm()
    {

        $this->selectedUser = null;
        $this->userId = null;
        $this->name = '';        
        $this->phone = '';
        $this->email = '';
        
    }

    public $isDeleteModalOpen = false;

    public function openDeleteModal($userId){

        $this->selectedUser = User::find($userId);
        $this->userId = $this->selectedUser->id;
        $this->isDeleteModalOpen = true;

    }

    public function closeDeleteModal(){

        $this->isDeleteModalOpen = false;
        $this->resetForm();
    }

    public function delete(){

        $user = User::find($this->userId);
        $user->delete();

        $this->closeDeleteModal;
    }
}
