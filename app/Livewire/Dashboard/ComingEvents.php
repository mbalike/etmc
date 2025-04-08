<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Event;

class ComingEvents extends Component
{
    public $refreshInterval = 20;
    public function render()
    {
        $events = Event::where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->get();

        return view('livewire.dashboard.coming-events',[

            'events' => $events

        ]);
    }
}
