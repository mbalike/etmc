<!-- resources/views/livewire/annual-report.blade.php -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Generate Annual Church Report</h5>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="reportYear" class="form-label">Select Year</label>
                <select wire:model="reportYear" id="reportYear" class="form-select">
                    @php
                        $currentYear = date('Y');
                        $startYear = 2020; // Adjust this as needed for your church's history
                    @endphp
                    
                    @for($year = $currentYear; $year >= $startYear; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
        </div>
        
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            This report will include statistics for members, baptisms, marriages, deaths, transfers, and events for the selected year. It will generate a comprehensive annual report for Ubungo ETMC.
        </div>
        
        <div class="d-flex justify-content-between">
            <div>
                <p class="mb-0"><strong>Report includes:</strong></p>
                <ul class="list-unstyled ps-3">
                    <li><i class="fas fa-check-circle text-success"></i> Member statistics (adults, teenagers, children)</li>
                    <li><i class="fas fa-check-circle text-success"></i> Family information</li>
                    <li><i class="fas fa-check-circle text-success"></i> Baptisms for {{ $reportYear }}</li>
                    <li><i class="fas fa-check-circle text-success"></i> Marriages for {{ $reportYear }}</li>
                    <li><i class="fas fa-check-circle text-success"></i> Deaths for {{ $reportYear }}</li>
                    <li><i class="fas fa-check-circle text-success"></i> Transfers for {{ $reportYear }}</li>
                    <li><i class="fas fa-check-circle text-success"></i> Events for {{ $reportYear }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="button" wire:click="generateReport" class="btn btn-primary" wire:loading.attr="disabled">
            <span wire:loading wire:target="generateReport" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <span wire:loading wire:target="generateReport">Generating...</span>
            <span wire:loading.remove wire:target="generateReport"><i class="fas fa-file-pdf"></i> Generate Annual Report</span>
        </button>
    </div>
</div>