@extends('layout.layout')
 @section('content')
<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
   

    <div class="col-xl-12">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#user-overview">Users</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#user-create">Create User</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

          <div class="tab-pane fade show active profile-overview pt-3" id="user-overview">
              <!-- Change Password Form -->
              <section class="section dashboard">
                <div class="row">
          
                  <!-- Left side columns -->
                  <div class="col-lg-12">
                    <div class="row">
          
                      <!-- Total Users Card -->
                      <div class="col-xxl-2 col-md-6">
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
                                <h6></h6>
                               
          
                              </div>
                            </div>
                          </div>
          
                        </div>
                      </div><!-- End Total Users Card -->
          
                      <!-- Pastors Card -->
                      <div class="col-xxl-2 col-md-6">
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
                            <h5 class="card-title">Pastors<span></span></h5>
          
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-book-half"></i>

                              </div>
                              <div class="ps-3">
                                <h6></h6>
                                
                              </div>
                            </div>
                          </div>
          
                        </div>
                      </div><!-- End Pastors Card -->
          
                      <!-- Deacons Card -->
                      <div class="col-xxl-2 col-xl-12">
          
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
                            <h5 class="card-title">Deacons <span> </span></h5>
          
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                
                                <i class="bi bi-person-badge-fill"></i>
                              </div>
                              <div class="ps-3">
                                <h6></h6>
                               
          
                              </div>
                            </div>
          
                          </div>
                        </div>
          
                      </div><!-- End Deacons Card -->
          
                      <!-- Trustees Card -->
                      <div class="col-xxl-2 col-md-6">
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
                            <h5 class="card-title">Trustees <span> </span></h5>
          
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-cash-stack"></i>

                              </div>
                              <div class="ps-3">
                                <h6></h6>
                               
          
                              </div>
                            </div>
                          </div>
          
                        </div>
                      </div><!-- End Trustees Card -->
          
                      <!-- Musicians Card -->
                      <div class="col-xxl-2 col-md-6">
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
                            <h5 class="card-title">Musicians <span></span></h5>
          
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-music-note-beamed"></i>

                              </div>
                              <div class="ps-3">
                                <h6></h6>
                                
          
                              </div>
                            </div>
                          </div>
          
                        </div>
                      </div><!-- End Musicians Card -->
          
                      <!-- Evangelists Card -->
                      <div class="col-xxl-2 col-xl-12">
          
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
                            <h5 class="card-title">Evangelists <span> </span></h5>
          
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-megaphone"></i>

                              </div>
                              <div class="ps-3">
                                <h6></h6>
                               
          
                              </div>
                            </div>
          
                          </div>
                        </div>
          
                      </div><!-- End evangelists Card -->
          
          
                      <!-- Believers -->
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
          
                          <div class="card-body">
                            <h5 class="card-title">Users<span> </span></h5>
                            
                            <livewire:users />
                           
          
                          </div>
          
                        </div>
                      </div><!-- End Believers Table -->
          
                      
                    </div>
                  </div><!-- End Left side columns -->
          
                  
                </div>
              </section>
          
            </div>

            
                 

             <livewire:user-form />
            

            <div class="tab-pane fade pt-3" id="user-edit">

              
                           

            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <section class="section dashboard">
                <div class="row">
          
                  <!-- Left side columns -->
                  <div class="col-lg-12">
                    <div class="row">
          
                      <!-- Total Card -->
                      
              </section>
          
            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->



@endsection


                <!-- <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Role</label>
                  <div class="col-md-8 col-lg-9">
                    <select name="role_id" class="form-select" id="role">
                        <option value="" disabled>Pick Role</option>
                        
                       <option value=""></option>
                        
                    </select>
                  </div>
                </div> -->