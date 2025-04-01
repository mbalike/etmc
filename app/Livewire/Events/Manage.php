<?php

namespace App\Livewire\Events;

use Livewire\Component;
use App\Models\Events;

class Manage extends Component
{

    public $title, $description, $eventDate, $eventTime, $location, $reminderIntervals = [], $filters = [];

    public function createEvent(){

        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'eventDate' => 'required|date',
            'eventTime' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'reminderIntervals' => 'array',
            'filters' => 'array'
        ]);

        Event::create([
            'title' => $this->title,
            'description' => $this->description,
            'event_date' => $this->eventDate,
            'event_time' => $this->eventTime,
            'location' => $this->location,
            'reminder_intervals' => json_encode($this->reminderIntervals),
            'filters' => json_encode($this->filters)
        ]);

        session()->flash('message', 'Event Created Successfully');
        $this->reset();
    }

    


    public function render()
    {
        return view('livewire.events.manage');
    }
}
