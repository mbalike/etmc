<div>
    
              <!-- Create Family Form -->
              <form wire:submit.prevent="addKid">
                @csrf
                  
      

             <div class="row mb-3">
                 <label for="Kid" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                 <div class="col-md-8 col-lg-9">
                     <input wire:model="firstName" type="text" class="form-control"name="" id="">
                     @error('firstName') <span class="text-danger"> {{$message}} </span> @enderror
                 </div>
             </div>
             <div class="row mb-3">
                 <label for="Kid" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                 <div class="col-md-8 col-lg-9">
                     <input wire:model="lastName" type="text" class="form-control"name="" id="">
                     @error('lastName') <span class="text-danger"> {{$message}} </span> @enderror
                 </div>
             </div>
             <div class="row mb-3">
                 <label for="Kid" class="col-md-4 col-lg-3 col-form-label"> Birthdate </label>
                 <div class="col-md-8 col-lg-9">
                     <input wire:model="birthdate" type="date" class="form-control"name="" id="">
                     @error('birthdate') <span class="text-danger"> {{$message}} </span> @enderror
                 </div>
             </div>
             <div class="row mb-3">
                 <label for="Father" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                 <div class="col-md-8 col-lg-9">
                     <select wire:model="Gender" class="form-select" id="">
                         <option >Select Gender</option>
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>
                     </select>
                     @error('Gender') <span class="text-danger"> {{$message}} </span> @enderror
                 </div>
                 
             </div>

             <div class="row mb-3">
                 <label for="Father" class="col-md-4 col-lg-3 col-form-label">Father</label>
                 <div class="col-md-8 col-lg-9">
                     <select wire:model="fatherId" class="form-select" id="">
                         <option >Father</option>
                         
                         @foreach($fathers as $father)
                                 <option value="{{$father->id}}">
                                     {{ $father->first_name }} {{ $father->last_name }}
                                 </option>
                             @endforeach                         
                     </select>
                     @error('fatherId') <span class="text-danger"> {{$message}} </span> @enderror
                 </div>
             </div>
             <div class="row mb-3">
                 <label for="Father" class="col-md-4 col-lg-3 col-form-label">Mother</label>
                 <div class="col-md-8 col-lg-9">
                     <select wire:model="motherId" class="form-select" id="">
                         <option >Mother</option>
                         
                             @foreach($mothers as $mother)
                                 <option value="{{$mother->id}}">
                                     {{ $mother->first_name }} {{ $mother->last_name }}
                                 </option>
                             @endforeach
                         
                     </select>
                     @error('motherId') <span class="text-danger"> {{$message}} </span> @enderror
                 </div>
             </div>

             <div class="row mb-3">
                 <label for="Mother" class="col-md-4 col-lg-3 col-form-label">Deacon</label>
                 <div class="col-md-8 col-lg-9">
                     <select wire:model="supervisorId" class="form-select" id="">
                         <option >Deacon</option>
                                 @foreach($deacons as $deacon)
                                 <option value="{{$deacon->id}}">
                                     {{$deacon->name}}
                                 </option>
                                 @endforeach
                     </select>
                     @error('supervisorId') <span class="text-danger"> {{$message}} </span> @enderror
                 </div>
             </div>
          
             <div class="text-center">
                  <button type="submit" class="btn btn-primary">
                     <span wire:loading.remove wire:target="addKid">Add Kids</span>
                     <span wire:loading wire:target="addKid">Adding...</span>
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
              <!-- End Create Kid Form -->
</div>
