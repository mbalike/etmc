@extends('layout.layout')

@section('content')
<div class="pagetitle">
  <h1>Ndoa</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item active">Marriages</li>
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
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#user-overview">Marriages</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#user-create">Add Marriage</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#user-edit">Edit Marriage</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
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
          
                      <!-- Total Card -->
                      <div class="col-xxl-4 col-md-6">
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
                            <h5 class="card-title">Total <span>| </span></h5>
          
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                              </div>
                              <div class="ps-3">
                                <h6></h6>
                               
          
                              </div>
                            </div>
                          </div>
          
                        </div>
                      </div><!-- End Sales Card -->
          
                      <!-- Males Card -->
                      <div class="col-xxl-4 col-md-6">
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
                            <h5 class="card-title">Males <span>| </span></h5>
          
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                              </div>
                              <div class="ps-3">
                                <h6></h6>
                                
          
                              </div>
                            </div>
                          </div>
          
                        </div>
                      </div><!-- End Revenue Card -->
          
                      <!-- Females Card -->
                      <div class="col-xxl-4 col-xl-12">
          
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
                                <i class="bi bi-people"></i>
                              </div>
                              <div class="ps-3">
                                <h6></h6>
                               
          
                              </div>
                            </div>
          
                          </div>
                        </div>
          
                      </div><!-- End Customers Card -->
          
          
                      <!-- Members -->
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
                          <!--  Marriages Table -->

                          @livewire('marriage.table')
                          
                          <!-- End Marriages Table -->
          
                      
                    </div>
                  </div><!-- End Left side columns -->
          
                  
                </div>
              </section>
          
            </div>

            <div class="tab-pane fade profile-edit pt-3" id="user-create">

              <!-- Create Marriage Form -->
              <form action="" method="post">
                @csrf
                  
                
                
                <div class="row mb-3">
                  <label for="supervisor" class="col-md-4 col-lg-3 col-form-label">Husband</label>
                  <div class="col-md-8 col-lg-9">
                    <select name="husband" class="form-select" id="supervisor">
                      <option selected disabled>Select </option>
                      
                      
                      <option value="">
                        
                                         </option>
                                         
                        
                             </select>
                            </div>
                      </div>
                      
                      <div class="row mb-3">
                        <label for="supervisor" class="col-md-4 col-lg-3 col-form-label">Wife</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="wife" class="form-select" id="supervisor">
                            <option selected disabled>Select </option>
                           
                            
                            <option value="">
                              
                            </option>
                            
                            
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                          <label for="birthdate" class="col-md-4 col-lg-3 col-form-label">Date of Marriage</label>
                          <div class="col-md-8 col-lg-9">
                              <input type="date" name="marriage_date" class="form-control" id="birthdate" min="1940-01-01" required value="">
                          </div>
                      </div>
               
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Create UserForm -->
    
                </div>
    
                <div class="tab-pane fade pt-3" id="user-edit">
    
                                <!-- User Edit Form -->
                                <form>
                      
                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="email" type="email" class="form-control" id="Email" value="">
                        </div>
                      </div>
    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End User Edit Form -->
    
                </div>
    
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
    
  @endsection 