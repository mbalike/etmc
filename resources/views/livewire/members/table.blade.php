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
            
            <!-- Option to show all members (reset supervisor filter) -->
            <li>
                <a class="dropdown-item {{ is_null($selectedSupervisor) ? 'active' : '' }}" 
                   href="#" 
                   wire:click.prevent="updateSupervisorFilter(null)">
                    All Supervisors
                </a>
            </li>
            
            <!-- List all supervisors -->
            @foreach($supervisors as $supervisor)
                <li>
                    <a class="dropdown-item {{ $selectedSupervisor == $supervisor->id ? 'active' : '' }}" 
                       href="#" 
                       wire:click.prevent="updateSupervisorFilter('{{ $supervisor->id }}')">
                        {{ $supervisor->name }} 
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
        
            
                          <div class="card-body">
                  <h5 class="card-title">Members <span></span></h5>

                  <div class="container mt-4">
                    <div class="input-group mb-3">
                       
                        
                        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Search Members...">
                        
                    </div>
                    
                    <div >
                    <table class="table table-striped ">
                        <thead class="table">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                
                                <th>Gender</th>
                                 
                                <th>Deacon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody wire:poll.20s>
                            @forelse($members as $member)
                                <tr>
                                    <td>{{ $member->full_name }} </td>
                                    <td>{{ $member->phone }}</td>
                                    
                                    <td>{{ $member->gender }}</td>
                                    
                                    <td>{{ $member->supervisor->name ?? 'N/L' }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                      <button wire:click="openUpdateModal({{ $member->id }})" class="btn btn-sm btn-primary ">
                                         <i class="bi bi-pencil"></i>
                                      </button>
                                      <button wire:click="openDeleteModal({{ $member->id }})" class="btn btn-sm btn-danger ">
                                         <i class="bi bi-trash"></i>
                                      </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No members found.</td>
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
                  
                        {{ $members->links('livewire.custom-pagination') }}
                </div>
                <p class="text-muted">
             Showing {{ $members->firstItem() }} - {{ $members->lastItem() }}
              of {{ $members->total() }} entries
                </p>

                 <!-- Update Modal -->

                </div> 
                    </div><!-- End Members Table -->
          
                      
                    </div>
                  </div><!-- End Members Summary and Table -->











</div>
