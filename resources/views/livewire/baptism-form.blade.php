<div>
    
    <form wire:submit.prevent="addBaptism">
        @csrf
        <div class="row mb-3">
            <label for="baptized" class="col-md-4 col-lg-3 col-form-label">Baptized</label>
            <div class="col-md-8 col-lg-9">
                <select wire:model="memberId" class="form-select" id="baptized">
                    <option>Select Baptized Member</option>
                    @foreach( $members as $member)
                    <option value="{{$member->id}}" >
                        {{$member->full_name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="baptism_date" class="col-md-4 col-lg-3 col-form-label">Date of Baptism</label>
            <div class="col-md-8 col-lg-9">
                <input type="date" wire:model="baptismDate" class="form-control" id="baptism_date" min="1940-01-01" required value="">
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="baptism_place" class="col-md-4 col-lg-3 col-form-label">Place of Baptism</label>
            <div class="col-md-8 col-lg-9">
                <input type="text" wire:model="baptismPlace" class="form-control" id="baptism_place" required value="">
            </div>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary">
                <span wire:loading.remove wire:target="addBaptism"> Record as Baptized </span>
                <span wire:loading wire:target="addBaptism"> Adding... </span>
            </button>
        </div>
        @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('alert-message').style.display = 'none';
            }, 3000); // 3000 milliseconds = 3 seconds
        </script>
        @endif
    </form
</div>
