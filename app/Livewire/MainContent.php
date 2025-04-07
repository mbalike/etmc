<?php
namespace App\Livewire;

use Livewire\Component;

class MainContent extends Component
{
    protected $listeners = ['changeView'];

    public $view = 'dashboard'; // default view


    public function changeView($newView)
    {
        $this->view = $newView;
    }

    public function render()
    {
        return view('livewire.main-content');
    }
}
