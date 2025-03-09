
<div class="container mt-4">
    <div class="input-group mb-3">
       
        
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Search Users...">
        
    </div>
    
    <div >
    <table class="table table-striped ">
        <thead class="table">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                
            </tr>
        </thead>
        <tbody wire:poll.20s>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No users found.</td>
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
        {{ $users->links('livewire.custom-pagination') }}
    </div>
</div>