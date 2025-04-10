<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChurchStaffReport extends Component
{
    public $showPreview = false;
    public $generatingPdf = false;

    public function render()
    {
        return view('livewire.church-staff-report');
    }

    public function previewReport()
    {
        $this->showPreview = true;
    }

    public function generatePdf()
    {
        $this->generatingPdf = true;
        
        // Get all users grouped by role
        $roleData = $this->prepareRoleData();
        
        // Generate PDF
        $pdf = PDF::loadView('pdf.church-staff-report', [
            'roleData' => $roleData,
            'roleDistribution' => $this->getRoleDistribution($roleData),
            'totalUsers' => User::where('role_id', '!=', 1)->count(),
            'totalSupervisedMembers' => $this->getTotalSupervisedMembers(),
            'generatedDate' => now()->format('F j, Y'),
            'generatorName' => Auth::user()->name,
            'generatorRole' => Auth::user()->role->name ?? 'Staff'
        ]);
        
        // Configure PDF settings
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'defaultFont' => 'sans-serif',
            'fontDir' => public_path('fonts/'),
        ]);
        
        $this->generatingPdf = false;
        
        // Download the PDF
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'Ubungo_ETMC_Staff_Report_' . now()->format('Y-m-d') . '.pdf');
    }
    
    private function prepareRoleData()
    {
        // Initialize array to hold role data
        $roleData = [];
        
        // Get all roles with predefined IDs
        $roles = [
            
            2 => 'Ofisi ya Mchungaji',
            3 => 'Mashemasi',
            4 => 'Wadhamini',
            5 => 'Wainjilisti',
            6 => 'Wanamziki',
            7 => 'Mkutubi',
            8 => 'Ufundi',
            9 => 'Ulinzi'
        ];
        
        // For each role, get users
        foreach ($roles as $roleId => $roleName) {
            $users = User::where('role_id', $roleId)->orderBy('name', 'asc')->get();
            
            // For deacons, count supervised members
            if ($roleId == 3) {
                foreach ($users as $user) {
                    $user->supervisedCount = $user->supervisedMembers()->count();
                }
            }
            
            $roleData[$roleId] = [
                'name' => $roleName,
                'users' => $users,
                'count' => $users->count()
            ];
        }
        
        return $roleData;
    }
    
    public function getRoleDistribution($roleData = null)
    {
        if ($roleData === null) {
            $roleData = $this->prepareRoleData();
        }
        
        $distribution = [];
        
        foreach ($roleData as $roleId => $data) {
            $distribution[$roleId] = $data['count'];
        }
        
        return $distribution;
    }
    
    public function getTotalSupervisedMembers()
    {
        // Sum of all supervised members for all deacons
        $deacons = User::where('role_id', 3)->get();
        $total = 0;
        
        foreach ($deacons as $deacon) {
            $total += $deacon->supervisedMembers()->count();
        }
        
        return $total;
    }
}