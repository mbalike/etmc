<div>
                   <form wire:submit.prevent="addDeath">
                           @csrf
                           <div class="row mb-3">
                        <label for="spouse" class="col-md-4 col-lg-3 col-form-label">Deceased</label>
                        <div class="col-md-8 col-lg-9">
                            <select wire:model="memberId"  class="form-select" id="deceased">
                                <option >Select Deceased Member</option>
                                    @foreach( $members as $member)                                    
                                        <option value="{{$member->id}}" >
                                            {{$member->full_name}}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="birthdate" class="col-md-4 col-lg-3 col-form-label">Date of Death</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="date" wire:model="deathDate" class="form-control" id="birthdate" min="1940-01-01" required value="">
                        </div>
                    </div>
                    
                   
                <div class="text-center">
                <button type="submit" class="btn btn-danger">
                    <span wire:loading.remove wire:target="addDeath"> Record as Deceased </span>
                    <span wire:loading wire:target="addDeath"> Adding... </span>
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
              </form>
</div>
