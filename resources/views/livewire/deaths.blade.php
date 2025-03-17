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
                                <h6>{{ $totalDeaths }}</h6>
                               
          
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
                                <h6></h6>
                                
          
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
                                <h6></h6>
                               
          
                              </div>
                            </div>
          
                          </div>
                        </div>
          
                      </div><!-- End Customers Card -->
                                   <!-- Deaths -->
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
                  <h5 class="card-title">Deaths <span></span></h5>

         <div class="container mt-4">
                    <div class="input-group mb-3">
                       
                        
                        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Search Deaths...">
                        
                    </div>
                    
                    <div >
                    <table class="table table-striped ">
                        <thead class="table">
                            <tr>
                                <th>Name</th>
                                <th>Date Of Death</th>   
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody wire:poll.20s>
                            @forelse($deaths as $death)
                                <tr>
                                    <td>{{ $death->member->full_name }}</td>
                                    <td>{{ $death->date_of_death }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                      <button wire:click="openUpdateModal({{ $death->id }})" class="btn btn-sm btn-primary ">
                                         <i class="bi bi-pencil"></i>
                                      </button>
                                      <button wire:click="openDeleteModal({{ $death->id }})" class="btn btn-sm btn-danger ">
                                         <i class="bi bi-trash"></i>
                                      </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Deaths found.</td>
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
                        {{ $deaths->links('livewire.custom-pagination') }}
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
                <h5 class="modal-title">Update Death</h5>
                <button type="button" class="btn-close" wire:click="closeUpdateModal"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label class="form-label">Date of Death</label>
                        <input type="text" wire:model="deathDate" class="form-control">
                        @error('deathDate') <span class="text-danger">{{ $message }}</span> @enderror
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
                <p>Are you sure you want to delete this deathager?</p>
                <p><strong>{{ $selectedDeath->member->full_name }} </strong></p>
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
