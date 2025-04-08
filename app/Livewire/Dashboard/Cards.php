<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\{User, Member,Baptism, Teenager, Child};

class Cards extends Component
{
    public function render()
    {
        $members = Member::count();
        $teenagers = Teenager::count();
        $kids = Child::count();
        $baptisms = Baptism::count();
        $users = User::count();
        $children = $teenagers + $kids;
        $total = $members + $teenagers + $kids + $baptisms + $users;

        // $this->dispatchBrowserEvent('update-card', [
        //     'members' => $members,
        //     'teenagers' => $teenagers,
        //     'kids' => $kids,
        //     'children' => $children,
        //     'baptisms' => $baptisms,
        //     'users' => $users,
        //     'total' => $total
        // ]);

        return view('livewire.dashboard.cards', [
            'members' => $members,
            'teenagers' => $teenagers,
            'kids' => $kids,
            'children' => $children,
            'baptisms' => $baptisms,
            'users' => $users,
            'total' => $total
        ]);
    }
}
