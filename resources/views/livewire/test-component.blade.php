
<div class="container mt-4">
    <div class="input-group mb-3">
       
        
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Search Members...">
        
    </div>
    
    <div >
    <table class="table table-striped ">
        <thead class="table">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Marital Status</th>    
                <th>Deacon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody wire:poll.20s>
            @forelse($members as $member)
                <tr>
                    <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->gender }}</td>
                    <td>{{ $member->marital_status }}</td>
                    <td>{{ $member->supervisor->name ?? 'N/L' }}</td>
                    <td>
                        <div class="d-flex gap-1">
                      <button wire:click="openUpdateModal({{ $member->id }})" class="btn btn-sm btn-primary ">
                         <i class="bi bi-pencil"></i>
                      </button>
                      <button wire:click="openDeleteModal({{ $member->id }})" class="btn btn-sm btn-danger ">
                         <i class="bi bi-trash"></i>
                      </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No members found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
    
</div>
<div class="d-flex justify-content-center">
        {{ $members->links('livewire.custom-pagination') }}
    </div>
    <!-- Update the action buttons in your table -->



<!-- Update Modal -->
@if($isUpdateModalOpen)
<div class="modal fade show" tabindex="-1" style="display: block; background-color: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Member</h5>
                <button type="button" class="btn-close" wire:click="closeUpdateModal"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" wire:model="firstName" class="form-control">
                        @error('firstName') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" wire:model="lastName" class="form-control">
                        @error('lastName') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!-- Add other form fields -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeUpdateModal">Cancel</button>
                <button type="button" class="btn btn-primary" wire:click="update">Update</button>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Delete Modal -->
@if($isDeleteModalOpen)
<div class="modal fade show" tabindex="-1" style="display: block; background-color: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Confirmation</h5>
                <button type="button" class="btn-close" wire:click="closeDeleteModal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this member?</p>
                <p><strong>{{ $selectedMember->first_name }} {{ $selectedMember->last_name }}</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeDeleteModal">Cancel</button>
                <button type="button" class="btn btn-danger" wire:click="delete">Delete</button>
            </div>
        </div>
    </div>
</div>
@endif

</div>