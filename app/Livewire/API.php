<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class API extends Component
{
    use WithPagination;
    
    public $search = '';
    public $perPage = 10;
    public $isLoading = false;
    public $allDrivers = [];
    
    // Refresh the data when search changes
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function mount()
    {
        $this->fetchDrivers();
    }
    
    public function fetchDrivers()
{
    $this->isLoading = true;
    
    try {
        // Skip SSL verification
        $response = Http::withoutVerifying()->get('https://vbam.japparchitect.ct.ws/api.php');
        
        if ($response->successful()) {
            $responseBody = $response->body(); // Get the raw response body
            
            // Check if the response is valid JSON
            $jsonData = json_decode($responseBody, true);
            
            if (json_last_error() === JSON_ERROR_NONE) {
                $this->allDrivers = $jsonData;
                session()->flash('info', 'API fetched successfully. Got ' . count($this->allDrivers) . ' records.');
            } else {
                // If not valid JSON, show the raw response
                session()->flash('error', 'API returned invalid JSON. Raw response: ' . substr($responseBody, 0, 300) . '...');
            }
        } else {
            session()->flash('error', 'Failed to fetch drivers. Status: ' . $response->status());
        }
    } catch (\Exception $e) {
        session()->flash('error', 'Error: ' . $e->getMessage());
    }
    
    $this->isLoading = false;
}
    
    public function getDriversProperty()
    {
        // Filter by search term
        $drivers = collect($this->allDrivers);
        
        if (strlen($this->search) > 0) {
            $drivers = $drivers->filter(function ($driver) {
                // Adjust these fields based on your actual driver data structure
                return $this->stringContains($driver['name'] ?? '', $this->search) || 
                       $this->stringContains($driver['phone'] ?? '', $this->search) ||
                       $this->stringContains($driver['email'] ?? '', $this->search);
            });
        }
        
        // Manual pagination since we're working with an array
        // Use the page method from WithPagination
        $page = $this->getPage();
        $perPage = $this->perPage;
        $items = $drivers->forPage($page, $perPage);
        
        return new LengthAwarePaginator(
            $items,
            $drivers->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }
    
    // Get the current page number properly
    protected function getPage()
    {
        return request()->query('page', 1);
    }
    
    // Helper function for case-insensitive search
    private function stringContains($haystack, $needle)
    {
        return stripos($haystack, $needle) !== false;
    }
    
    public function refreshData()
    {
        $this->fetchDrivers();
    }
    
    public function render()
    {
        return view('livewire.a-p-i', [
            'drivers' => $this->drivers
        ]);
    }
}