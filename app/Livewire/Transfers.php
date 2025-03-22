<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Member;
use App\Models\Transfer;


class Transfers extends Component
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
        $query   = Transfer::query();
        $members = Member::all();
        $totalTransfers = Transfer::all()->count();
        $totalMales = Transfer::where('gender','Male')->count();
        $totalFemales = Transfer::where('gender','Female')->count();
        $deacons  = User::where('role_id','3')->get();

        if(!empty($this->search)){

            $searchTerm = '%' . $this->search . '%';
            $query->where(function ($q) use ($searchTerm){
                $q->where('full_name', 'LIKE', $searchTerm)
                    ->orWhere('phone', 'LIKE', $searchTerm)
                    ->orWhere('gender', 'LIKE', $searchTerm)
                    ->orWhere('reason', 'LIKE', $searchTerm)
                    ->orWhere('tansfer_date', 'LIKE', $searchTerm);
            });
        }
                $transfers = $query->paginate(5);

        return view('livewire.transfers',[

            'transfers' => $transfers,
            'members'   => $members,
            'deacons'   => $deacons,
            'totalTransfers' => $totalTransfers,
            'totalMales' => $totalMales,
            'totalFemales' => $totalFemales

        ]);
    }

    public $transId;
    public $fullName;
    public $phone;
    public $gender;
    public $reason;
    public $description;
    public $transferDate;
    public $supervisorId;
}
