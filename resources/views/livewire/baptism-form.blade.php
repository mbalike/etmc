<div>
    
    <form wire:submit.prevent="addBaptism">
        @csrf
                 <div class="mb-3">
                    <label for="spouse" class="col-md-4 col-lg-3 col-form-label">Member</label>
                        <div class="col-md-8 col-lg-9">
                            <select wire:model="memberId"  class="form-select" id="deceased">
                                <option >Select Member</option>
                                    @foreach( $members as $member)                                    
                                        <option value="{{$member->id}}" >
                                            {{$member->full_name}}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" wire:model="phone" class="form-control">
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                    <label for="" class="col-md-4 col-lg-3 col-form-label">Occupation</label>
                        <div class="col-md-8 col-lg-9">
                            <select wire:model="occupation"  class="form-select" id="">
                                <option >Select Occupation</option>
                                <option value="employed" >Employed</option>
                                <option value="unemployed" >Unemployed</option>
                                <option value="student" >Student</option>
                                <option value="retired" >Retired</option>
                                <option value="others" >Others</option>     
                            </select>
                        </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" wire:model="description" class="form-control">
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>          
                    <div class="mb-3">
                        <label class="form-label">Date of Baptism</label>
                        <input type="date" wire:model="baptism_date" class="form-control">
                        @error('baptism_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Baptized By</label>
                        <input type="text" wire:model="baptized_by" class="form-control">
                        @error('baptized_by') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Testified By</label>
                        <input type="text" wire:model="testified_by" class="form-control">
                        @error('testified_by') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                    <label for="" class="col-md-4 col-lg-3 col-form-label">Deacon</label>
                        <div class="col-md-8 col-lg-9">
                            <select wire:model="supervisor_id"  class="form-select" id="">
                                <option >Select Deacon</option>
                                    @foreach( $deacons as $deacon)                                    
                                        <option value="{{$deacon->id}}" >
                                            {{$deacon->name}}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                    <label for="" class="col-md-4 col-lg-3 col-form-label">Status</label>
                        <div class="col-md-8 col-lg-9">
                            <select wire:model="status"  class="form-select" id="">
                                <option >Member Status</option>
                                <option value="active" >Active</option>
                                <option value="inactive" >Inactive</option>    
                            </select>
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
        @endif
    </form
</div>
