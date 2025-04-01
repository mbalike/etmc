<div>
<form wire:submit.prevent="createEvent">
                

                <div class="row mb-3">
                   <label for="lname" class="col-md-4 col-lg-3 col-form-label">Title</label>
                   <div class="col-md-8 col-lg-9">
                       <input type="text" wire:model="title" class="form-control" id="lname" required value="">
                   </div>
                </div>
                <div class="row mb-3">
                   <label for="lname" class="col-md-4 col-lg-3 col-form-label">Description</label>
                   <div class="col-md-8 col-lg-9">
                       <input type="text" wire:model="description" class="form-control" id="lname" required value="">
                   </div>
                </div>
                
                <div class="row mb-3">
                    <label for="birthdate" class="col-md-4 col-lg-3 col-form-label">Date</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="date" wire:model="eventDate" class="form-control" id="birthdate" min="1940-01-01" required value="">
                      </div>
                </div>
                <div class="row mb-3">
                    <label for="birthdate" class="col-md-4 col-lg-3 col-form-label">Time</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="time" wire:model="eventTime" class="form-control" id="birthdate" min="1940-01-01" required value="">
                    </div>
                </div>
                <div class="row mb-3">
                   <label for="lname" class="col-md-4 col-lg-3 col-form-label">Location</label>
                   <div class="col-md-8 col-lg-9">
                       <input type="text" wire:model="location" class="form-control" id="lname" required value="">
                   </div>
                </div>
                <div class="row mb-3">
                   <label for="lname" class="col-md-4 col-lg-3 col-form-label">Reminder Interval</label>
                   <div class="col-md-8 col-lg-9">
                       <input type="text" wire:model="reminderInterval" class="form-control" id="lname" required value="">
                   </div>
                </div>
                <div class="row mb-3">
                   <label for="lname" class="col-md-4 col-lg-3 col-form-label">Filters</label>
                   <div class="col-md-8 col-lg-9">
                       <input type="text" wire:model="filters" class="form-control" id="lname" required value="">
                   </div>
                </div>
         
              <div class="text-center">
                <button type="submit" class="btn btn-primary">
                   <span wire:loading.remove wire:target="createEvent"> Create Event </span>
                   <span wire:loading wire:target="createEvent"> Creating... </span>
                </button>
              </div>
              @if (session()->has('message'))
                <div class="alert alert-success mt-3">
                    {{ session('message') }}
                </div>
              @endif
            </form>
</div>
