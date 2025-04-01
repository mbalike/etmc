<?php

namespace App\Livewire\Events;

use Livewire\Component;
use App\Models\Event;

class Manage extends Component
{
    public $title, $description, $eventDate, $eventTime, $location, $reminderIntervals = [], $filters = [];

    public function updatedReminderIntervals($value)
    {
        // Ensure the input is split and stored as an array
        $this->reminderIntervals = array_map('trim', explode(',', $value));
    }

    public function updatedFilters($value)
    {
        // Handle JSON format if needed
        $this->filters = json_decode($value, true);
    }

    public function createEvent()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'eventDate' => 'required|date',
            'eventTime' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'reminderIntervals' => 'array',  // Ensure validation checks for an array
            'filters' => 'array'
        ]);

        Event::create([
            'title' => $this->title,
            'description' => $this->description,
            'event_date' => $this->eventDate,
            'event_time' => $this->eventTime,
            'location' => $this->location,
            'reminder_intervals' => $this->reminderIntervals,
            'filters' => $this->filters
        ]);

        session()->flash('message', 'Event Created Successfully');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.events.manage');
    }
}
