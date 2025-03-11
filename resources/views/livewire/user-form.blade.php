        <div class="tab-pane fade profile-edit pt-3" id="user-create">
           <!-- Profile Edit Form -->
           <form wire:submit.prevent="addUser">
                @csrf
                         
                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input wire:model.defer="name" type="text" class="form-control" id="Name" value="">
                       @error('name') <span class="text danger"> {{$message}} </span> @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input wire:model.defer="email" type="email" class="form-control" id="Email" value="">
                       @error('email')<span class="text-danger"> {{ $message }} </span> @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input wire:model.defer="phone" type="text" class="form-control" id="Phone" value="">
                       @error('phone') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                  </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">
                     <span wire:loading.remove wire:target="addUser">Add User</span>
                     <span wire:loading wire:target="addUser">Adding...</span>
                  </button>
                </div>
                @if (session()->has('message'))
                 <div class="alert alert-success mt-3">
                   {{ session('message') }}
                 </div>
                @endif
              </form><!-- End Create UserForm -->
        </div>