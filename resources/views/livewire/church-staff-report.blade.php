<div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Church Staff Report</h3>
        </div>
        
        <div class="card-body">
            <p class="text-muted">
                Generate a comprehensive report of all church staff members organized by their roles.
                The report includes contact information and special role details.
            </p>
            
            <div class="d-flex gap-2">
                <button wire:click="previewReport" class="btn btn-secondary" wire:loading.attr="disabled">
                    <i class="fa fa-eye"></i> Preview Report
                </button>
                
                <button wire:click="generatePdf" class="btn btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="generatePdf">
                        <i class="fa fa-file-pdf"></i> Generate PDF
                    </span>
                    <span wire:loading wire:target="generatePdf">
                        <i class="fa fa-spinner fa-spin"></i> Generating...
                    </span>
                </button>
            </div>
            
            @if($showPreview)
                <div class="mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Report Preview</h4>
                        <button wire:click="$set('showPreview', false)" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-times"></i> Close Preview
                        </button>
                    </div>
                    
                    <div class="border p-3" style="max-height: 600px; overflow-y: auto;">
                        <!-- Include a simplified version of the PDF template -->
                        @include('pdf.church-staff-report-preview')
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>