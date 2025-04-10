<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member;
use App\Models\Teenager;
use App\Models\Child;
use App\Models\Baptism;
use App\Models\Family;
use App\Models\Death;
use App\Models\Marriage;
use App\Models\Transfer;
use App\Models\Event;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class AnnualReport extends Component
{
    public $reportYear;
    public $isLoading = false;
    
    public function mount()
    {
        $this->reportYear = date('Y');
    }
    
    public function render()
    {
        return view('livewire.annual-report');
    }
    
    public function generateReport()
    {
        $this->isLoading = true;
        
        // Set year start and end dates
        $yearStart = Carbon::createFromDate($this->reportYear, 1, 1)->startOfDay();
        $yearEnd = Carbon::createFromDate($this->reportYear, 12, 31)->endOfDay();
        
        // Get member statistics
        $adultMemberCount = Member::count();
        $maleMemberCount = Member::where('gender', 'Male')->count();
        $femaleMemberCount = Member::where('gender', 'Female')->count();
        
        // Get teenager statistics
        $teenagersCount = Teenager::count();
        $maleTeenCount = Teenager::where('gender', 'Male')->count();
        $femaleTeenCount = Teenager::where('gender', 'Female')->count();
        
        // Get children statistics
        $childrenCount = Child::count();
        $maleChildCount = Child::where('gender', 'Male')->count();
        $femaleChildCount = Child::where('gender', 'Female')->count();
        
        // Total counts
        $totalMemberCount = $adultMemberCount + $teenagersCount + $childrenCount;
        $totalMaleCount = $maleMemberCount + $maleTeenCount + $maleChildCount;
        $totalFemaleCount = $femaleMemberCount + $femaleTeenCount + $femaleChildCount;
        
        // Marital status statistics
        $marriedMaleCount = Member::where('gender', 'Male')->where('marital_status', 'Married')->count();
        $marriedFemaleCount = Member::where('gender', 'Female')->where('marital_status', 'Married')->count();
        $singleMaleCount = Member::where('gender', 'Male')->where('marital_status', 'Single')->count();
        $singleFemaleCount = Member::where('gender', 'Female')->where('marital_status', 'Single')->count();
        $widowerCount = Member::where('gender', 'Male')->where('marital_status', 'Widowed')->count();
        $widowCount = Member::where('gender', 'Female')->where('marital_status', 'Widowed')->count();
        $divorcedMaleCount = Member::where('gender', 'Male')->where('marital_status', 'Divorced')->count();
        $divorcedFemaleCount = Member::where('gender', 'Female')->where('marital_status', 'Divorced')->count();
        
        // Annual data
        $baptisms = Baptism::whereBetween('baptism_date', [$yearStart, $yearEnd])
            ->with('member')
            ->get();
        $baptismsCount = $baptisms->count();
        
        $marriages = Marriage::whereBetween('marriage_date', [$yearStart, $yearEnd])
            ->with(['husband', 'wife'])
            ->get();
        $marriagesCount = $marriages->count();
        
        $deaths = Death::whereBetween('date_of_death', [$yearStart, $yearEnd])->get();
        $deathsCount = $deaths->count();
        
        $transfers = Transfer::whereBetween('transfer_date', [$yearStart, $yearEnd])->get();
        $transfersCount = $transfers->count();
        
        $events = Event::whereBetween('event_date', [$yearStart, $yearEnd])->get();
        $eventsCount = $events->count();
        
        // Get family statistics
        $familiesCount = Family::count();
        
        // Prepare data for PDF
        $data = [
            'reportYear' => $this->reportYear,
            'generatedDate' => Carbon::now()->format('d/m/Y'),
            'totalMemberCount' => $totalMemberCount,
            'adultMemberCount' => $adultMemberCount,
            'teenagersCount' => $teenagersCount,
            'childrenCount' => $childrenCount,
            'maleMemberCount' => $maleMemberCount,
            'femaleMemberCount' => $femaleMemberCount,
            'maleTeenCount' => $maleTeenCount,
            'femaleTeenCount' => $femaleTeenCount,
            'maleChildCount' => $maleChildCount,
            'femaleChildCount' => $femaleChildCount,
            'totalMaleCount' => $totalMaleCount,
            'totalFemaleCount' => $totalFemaleCount,
            'marriedMaleCount' => $marriedMaleCount,
            'marriedFemaleCount' => $marriedFemaleCount,
            'singleMaleCount' => $singleMaleCount,
            'singleFemaleCount' => $singleFemaleCount,
            'widowerCount' => $widowerCount,
            'widowCount' => $widowCount,
            'divorcedMaleCount' => $divorcedMaleCount,
            'divorcedFemaleCount' => $divorcedFemaleCount,
            'familiesCount' => $familiesCount,
            'baptisms' => $baptisms,
            'baptismsCount' => $baptismsCount,
            'marriages' => $marriages,
            'marriagesCount' => $marriagesCount,
            'deaths' => $deaths,
            'deathsCount' => $deathsCount,
            'transfers' => $transfers,
            'transfersCount' => $transfersCount,
            'events' => $events,
            'eventsCount' => $eventsCount,
        ];
        
        // Generate PDF
        $pdf = PDF::loadView('pdf.church-annual-report', $data);
        
        $this->isLoading = false;
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, "ETMC_Annual_Report_{$this->reportYear}.pdf");
    }
}