<?php

namespace App\Livewire\Marriage;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Marriage;
use App\Models\Member;


class Table extends Component
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
        $query = Marriage::query();

        // More flexible search across multiple columns
        if (!empty($this->search)) {
            $searchTerm = '%' . $this->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->whereHas('husband', function ($q) use ($searchTerm) {
                    $q->where('first_name', 'LIKE', $searchTerm)
                      ->orWhere('last_name', 'LIKE', $searchTerm);
                })
                ->orWhereHas('wife', function ($q) use ($searchTerm) {
                    $q->where('first_name', 'LIKE', $searchTerm)
                      ->orWhere('last_name', 'LIKE', $searchTerm);
                });
            });
        }

        return view('livewire.marriage.table', [
            'marriages' => $query->paginate(5),
        ]);
    }
       
    
}
