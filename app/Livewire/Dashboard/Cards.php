<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\{User, Member,Baptism, Teenager, Child};

class Cards extends Component
{
    public function render()
    {
        if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2){

        $members = Member::count();
        $teenagers = Teenager::count();
        $kids = Child::count();
        $baptisms = Baptism::count();
        $users = User::count();
        $children = $teenagers + $kids;
        $total = $members + $teenagers + $kids + $baptisms;
    }
        if(auth()->user()->role_id == 3){
            $members = Member::where('supervisor_id', auth()->user()->id)->count();
            $teenagers = Teenager::where('supervisor_id', auth()->user()->id)->count();
            $kids = Child::where('supervisor_id', auth()->user()->id)->count();
            $baptisms = Baptism::where('supervisor_id', auth()->user()->id)->count();
            $users = User::all()->count();
            $children = $teenagers + $kids;
            $total = $members + $teenagers + $kids + $baptisms ;
        }

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
