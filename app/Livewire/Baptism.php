<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Baptism as BaptismModel;
use App\Models\Member;
use App\Models\User;
use Livewire\WithPagination;

class Baptism extends Component
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
        $query = BaptismModel::query();
        $totalBaptisms = BaptismModel::all()->count();
        $members = Member::all();
        $users = User::all();

         if (!empty($this->search)) {

            $searchTerm = '%' . $this->search . '%';
            $query->where(function ($q) use ($searchTerm) {

                $q->where('baptism_date', 'LIKE', $searchTerm)
                    ->orWhere('baptised_by', 'LIKE', $searchTerm)
                    ->orWhere('testified_by', 'LIKE', $searchTerm)
                    ->orWhere('status', 'LIKE', $searchTerm)
                    ->orWhereHas('member', function ($query) use ($searchTerm) {
                        $query->where('first_name', 'LIKE', $searchTerm)
                            ->orWhere('last_name', 'LIKE', $searchTerm);
                    });
                });
            }
            $baptisms = $query->paginate(5);
                return view('livewire.baptism', [

                   'totalBaptisms' => $totalBaptisms,
                   'baptisms' => $baptisms,
                   'members' => $members,
                   'deacons' => $users
        ]);
       }

    public $selectedBaptism = null;
    public $isUpdateModalOpen = false;

    public $baptismId;
    public $memberId;
    public $phone;
    public $occupation;
    public $description;
    public $baptism_date;
    public $baptised_by;
    public $testified_by;
    public $supervisor_id;
    public $status;

    public function openUpdateModal($baptismId)
    {

        $this->selectedBaptism = BaptismModel::find($baptismId);

        $this->baptismId = $this->selectedBaptism->id;
        $this->memberId = $this->selectedBaptism->member_id;
        $this->phone = $this->selectedBaptism->phone;
        $this->occupation = $this->selectedBaptism->occupation;
        $this->description = $this->selectedBaptism->description;
        $this->baptism_date = $this->selectedBaptism->baptism_date;
        $this->baptised_by = $this->selectedBaptism->baptised_by;
        $this->testified_by = $this->selectedBaptism->testified_by;
        $this->supervisor_id = $this->selectedBaptism->supervisor_id;
        $this->status = $this->selectedBaptism->status;

        $this->isUpdateModalOpen = true;
    }

    public function closeUpdateModal()
    {

        $this->isUpdateModalOpen = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->baptismId = '';
        $this->memberId = '';
        $this->phone = '';
        $this->occupation = '';
        $this->description = '';
        $this->baptism_date = '';
        $this->baptised_by = '';
        $this->testified_by = '';
        $this->supervisor_id = '';
        $this->status = '';
    }

    public function update()
    {

        $this->validate([

            'memberId' => 'required|exists:members,id',
            'phone' => 'required|string|max:20',
            'occupation' => 'required|string|max:20',
            'description' => 'required|string|max:255',
            'baptism_date' => 'date',
            'baptised_by' => 'string|max:20',
            'testified_by' => 'string|max:20',
            'supervisor_id' => 'required|exists:users,id',
            'status' => 'required|string|max:20'

        ]);

        $baptism = BaptismModel::find($this->baptismId);

        $baptism->update([

            'member_id' => $this->memberId,
            'phone' => $this->phone,
            'occupation' => $this->occupation,
            'description' => $this->description,
            'baptism_date' => $this->baptism_date,
            'baptised_by' => $this->baptised_by,
            'testified_by' => $this->testified_by,
            'supervisor_id' => $this->supervisor_id,
            'status' => $this->status

        ]);

        $this->closeUpdateModal();
        $this->dispatch('baptismUpdated');
    }


    public $isDeleteModalOpen = false;

    public function openDeleteModal($baptismId)
    {

        $this->selectedBaptism = BaptismModel::find($baptismId);
        $this->baptismId = $baptismId;
        $this->isDeleteModalOpen = true;
    }

    public function closeDeleteModal()
    {

        $this->isDeleteModalOpen = false;
        $this->resetForm();
    }

    public function delete()
    {

        $baptism = BaptismModel::find($this->baptismId);
        $baptism->delete();
        $this->closeDeleteModal();
        $this->dispatch('baptismDeleted');
    }
}
