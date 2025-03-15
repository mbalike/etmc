<div>
    
              <!-- Create Family Form -->
              <form wire:submit.prevent="addTeen">
                @csrf
                  
      

             <div class="row mb-3">
                 <label for="Teen" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                 <div class="col-md-8 col-lg-9">
                     <input wire:model.defer="firstName" type="text" class="form-control"name="" id="">
                     @error('firstName') <span class="text-danger"> {{$message}} </span> @enderror
                 </div>
             </div>
             <div class="row mb-3">
                 <label for="Teen" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                 <div class="col-md-8 col-lg-9">
                     <input wire:model.defer="lastName" type="text" class="form-control"name="" id="">
                     @error('lastName') <span class="text-danger"> {{$message}} </span> @enderror
                 </div>
             </div>
             <div class="row mb-3">
                 <label for="Teen" class="col-md-4 col-lg-3 col-form-label"> Birthdate </label>
                 <div class="col-md-8 col-lg-9">
                     <input wire:model.defer="birthdate" type="date" class="form-control"name="" id="">
                     @error('birthdate') <span class="text-danger"> {{$message}} </span> @enderror
                 </div>
             </div>
             <div class="row mb-3">
                 <label for="Father" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                 <div class="col-md-8 col-lg-9">
                     <select wire:model.defer="Gender" class="form-select" id="">
                         <option selected disabled>Select Gender</option>
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>
                     </select>
                     @error('gender') <span class="text-danger"> {{$message}} </span> @enderror
                 </div>
                 
             </div>

             <div class="row mb-3">
                 <label for="Father" class="col-md-4 col-lg-3 col-form-label">Father</label>
                 <div class="col-md-8 col-lg-9">
                     <select wire:model.defer="fatherId" class="form-select" id="">
                         <option selected disabled>Father</option>
                         
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
                 <label for="Father" class="col-md-4 col-lg-3 col-form-label">Father</label>
                 <div class="col-md-8 col-lg-9">
                     <select wire:model.defer="motherId" class="form-select" id="">
                         <option selected disabled>Mother</option>
                         
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
                     <select wire:model.defer="supervisorId" class="form-select" id="">
                         <option selected disabled>Deacon</option>
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
                     <span wire:loading.remove wire:target="addTeen">Add Teenager</span>
                     <span wire:loading wire:target="addTeen">Adding...</span>
                  </button>
                </div>
              </form> 
              <!-- End Create Teen Form -->
</div>
