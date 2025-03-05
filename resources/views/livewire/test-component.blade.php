
<div class="container mt-4">
    <div class="input-group mb-3">
       
        
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Search Members...">
        
    </div>
    
    <div wire:ignore.self>
    <table class="table table-striped table-bordered">
        <thead class="table">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>Marital Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
                <tr>
                    <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->gender }}</td>
                    <td>{{ $member->birthdate }}</td>
                    <td>{{ $member->marital_status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No members found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
</div>
<div class="d-flex justify-content-center">
        {{ $members->links('livewire.custom-pagination') }}
    </div>
</div>