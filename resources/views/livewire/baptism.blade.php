<div>
 <!-- Left side columns -->
 <div class="col-lg-12">
                    <div class="row">
    <!-- Total Card -->
    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card sales-card">
          
                          <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                              <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                              </li>
          
                              <li><a class="dropdown-item" href="#">Today</a></li>
                              <li><a class="dropdown-item" href="#">This Month</a></li>
                              <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                          </div>

                          <div class="card-body">
                            <h5 class="card-title">Total <span> </span></h5>
          
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                              </div>
                              <div class="ps-3">
                                <h6>{{ $totalBaptisms }}</h6>
                               
          
                              </div>
                            </div>
                          </div>
          
                        </div>
                      </div><!-- End Total Card -->
          
                      <!-- Males Card -->
                      <div class="col-xxl-4 col-md-4">
                        <div class="card info-card revenue-card">
          
                          <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                              <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                              </li>
          
                              <li><a class="dropdown-item" href="#">Today</a></li>
                              <li><a class="dropdown-item" href="#">This Month</a></li>
                              <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                          </div>
          
                          <div class="card-body">
                            <h5 class="card-title">Males <span> </span></h5>
          
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-gender-male"></i>
                              </div>
                              <div class="ps-3">
                                <h6>{{ $maleBaptisms }}</h6>
                                
          
                              </div>
                            </div>
                          </div>
          
                        </div>
                      </div><!-- End Revenue Card -->
          
                      <!-- Females Card -->
                      <div class="col-xxl-4 col-xl-4">
          
                        <div class="card info-card customers-card">
          
                          <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                              <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                              </li>
          
                              <li><a class="dropdown-item" href="#">Today</a></li>
                              <li><a class="dropdown-item" href="#">This Month</a></li>
                              <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                          </div>
          
                          <div class="card-body">
                            <h5 class="card-title">Females <span>| </span></h5>
          
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-gender-female"></i>
                              </div>
                              <div class="ps-3">
                                <h6>{{ $femaleBaptisms }}</h6>
                               
          
                              </div>
                            </div>
          
                          </div>
                        </div>
          
                      </div><!-- End Customers Card -->
                                   <!-- Baptisms -->
                                   <div class="col-12">
                        <div class="card recent-sales overflow-auto">
          
                          <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                              <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                              </li>
          
                              <li><a class="dropdown-item" href="#">Today</a></li>
                              <li><a class="dropdown-item" href="#">This Month</a></li>
                              <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                          </div>
          
                          <div class="card-body pb-0">
                  <h5 class="card-title">Baptisms <span></span></h5>

         <div class="container mt-4">
                    <div class="input-group mb-3">
                       
                        
                        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Search Baptisms...">
                        
                    </div>
                    
                    <div >
                    <table class="table table-striped ">
                        <thead class="table">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Occupation</th>
                                <th>Date</th> 
                                <th>Deacon</th>  
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody wire:poll.20s>
                            @forelse($baptisms as $baptism)
                                <tr>
                                    <td>{{ $baptism->member_id}}</td>
                                    <td>{{ $baptism->phone }}</td>
                                    <td>{{ $baptism->occupation }}</td>
                                    <td>{{ $baptism->baptism_date }}</td>
                                    <td>{{ $baptism->supervisor_id}}</td>

                                        <div class="d-flex gap-1">
                                      <button wire:click="openUpdateModal({{ $baptism->id }})" class="btn btn-sm btn-primary ">
                                         <i class="bi bi-pencil"></i>
                                      </button>
                                      <button wire:click="openDeleteModal({{ $baptism->id }})" class="btn btn-sm btn-danger ">
                                         <i class="bi bi-trash"></i>
                                      </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Baptisms found.</td>
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
                        {{ $baptisms->links('livewire.custom-pagination') }}
                </div>
                </div>                      
             </div>
                      </div><!-- End Members Table -->
          
                      
                    </div>
                  </div><!-- End Left side columns -->
 
                 <!-- Update Modal -->
@if($isUpdateModalOpen)
<div class="modal fade show" tabindex="-1" style="display: block; background-color: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Baptism</h5>
                <button type="button" class="btn-close" wire:click="closeUpdateModal"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    
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
                                <option >Select Occupation</option>
                                <option value="active" >Active</option>
                                <option value="inactive" >Inactive</option>    
                            </select>
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
                <p>Are you sure you want to delete this baptism record?</p>
                <p><strong>{{ $selectedBaptism->member->full_name}} </strong></p>
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
