<div>


            <!-- Members Table -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

              <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-three-dots"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
                <h6>Filter by Supervisor</h6>
            </li>
            
            <!-- Option to show all users (reset supervisor filter) -->
            <li>
                <a class="dropdown-item " 
                   href="#" 
                   wire:click.prevent="updateSupervisorFilter(null)">
                    All Supervisors
                </a>
            </li>
            
            <!-- List all supervisors -->
           
        </ul>
    </div>
        
            
                          <div class="card-body">
                  <h5 class="card-title">Users <span></span></h5>

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
                                
                                <th>Role</th>
                                  
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody wire:poll.20s>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->name }} </td>
                                    <td>{{ $user->phone }}</td>
                                    
                                    <td>{{ $user->role->name }}</td>
                                    

                                    <td>
                                        <div class="d-flex gap-1">
                                      <button wire:click="openUpdateModal({{ $user->id }})" class="btn btn-sm btn-primary ">
                                         <i class="bi bi-pencil"></i>
                                      </button>
                                      <button wire:click="openDeleteModal({{ $user->id }})" class="btn btn-sm btn-danger ">
                                         <i class="bi bi-trash"></i>
                                      </button>
                                        </div>
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
                <p class="text-muted">
             Showing {{ $users->firstItem() }} - {{ $users->lastItem() }}
              of {{ $users->total() }} entries
                </p>

                 <!-- Update Modal -->

                </div> 
                    </div><!-- End Members Table -->
          
                      
                    </div>
                  </div><!-- End Members Summary and Table -->











</div>
