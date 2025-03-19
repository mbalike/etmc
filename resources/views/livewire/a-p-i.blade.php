<!-- resources/views/livewire/drivers-table.blade.php -->
<div>
    <!-- Loading indicator -->
    @if($isLoading)
        <div class="text-center p-4">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    @endif
    
    <!-- Error message -->
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <!-- Search and refresh controls -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" wire:model.debounce.300ms="search" class="form-control" placeholder="Search drivers...">
            </div>
        </div>
        <div class="col-md-6 text-end">
            <button wire:click="refreshData" class="btn btn-secondary">
                <i class="fas fa-sync"></i> Refresh
            </button>
        </div>
    </div>
    
    <!-- Drivers table -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <!-- Adjust these columns based on your drivers data structure -->
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @forelse($drivers as $driver)
                    <tr>
                        <td>{{ $driver['id'] ?? 'N/A' }}</td>
                        <td>{{ $driver['name'] ?? 'N/A' }}</td>
                        <td>{{ $driver['phone'] ?? 'N/A' }}</td>
                        <td>{{ $driver['email'] ?? 'N/A' }}</td>
                        <!-- Add more cells as needed -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No drivers found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center">
        <div>
            Showing {{ $drivers->firstItem() ?? 0 }} to {{ $drivers->lastItem() ?? 0 }} of {{ $drivers->total() }} drivers
        </div>
        <div>
            {{ $drivers->links() }}
        </div>
    </div>
</div>