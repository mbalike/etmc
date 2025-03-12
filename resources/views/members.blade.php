@extends('layout.layout')
 @section('content')

<div class="pagetitle">
  <h1>Members</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item active">Members</li>
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
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#user-overview">Members</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#user-create">Add Member</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password"></button>
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

            <!-- Sales Card -->
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
                  <h5 class="card-title">Total <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Children</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
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
                  <h5 class="card-title"> Males<span></span></h5>

                  <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                   <i class="bi bi-gender-male"></i>
                  </div>

                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Boys</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
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
                  <h5 class="card-title">Females <span></span></h5>

                  <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-gender-female"></i>
                  </div>

                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Girls</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

           

            <!-- Recent Sales -->
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
                  <h5 class="card-title">Members <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">s/n</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Supervisor</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                      <tr>
                        <th scope="row"><a href="#"></a></th>
                        <td><a href="#" data-bs-toggle="modal" ></a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <div class="d-flex">
                        <a href="" class="btn btn-primary me-2">Edit</a>
                             <form action="" method="post">
                                
                                <button type="submit" class="btn btn-danger">Delete</button>
                             </form>   
                      
                        </td>
                        </div>
                      </tr>
                     
                      
                      
                    </tbody>
                  </table>

                </div>                       </div>
                      </div><!-- End Members Table -->
          
                      
                    </div>
                  </div><!-- End Left side columns -->
          
                  
                </div>
              </section>
          
            </div>

            <div class="tab-pane fade profile-edit pt-3" id="user-create">

              <!-- Create Member Form -->
              <form action="" method="post">
                @csrf
                  
                <div class="row mb-3">
    <label for="fname" class="col-md-4 col-lg-3 col-form-label">First Name</label>
    <div class="col-md-8 col-lg-9">
        <input type="text" name="fname" class="form-control" id="fname" required value="">
    </div>
</div>

<div class="row mb-3">
    <label for="lname" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
    <div class="col-md-8 col-lg-9">
        <input type="text" name="lname" class="form-control" id="lname" required value="">
    </div>
</div>

<div class="row mb-3">
    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
    <div class="col-md-8 col-lg-9">
        <input type="email" name="email" class="form-control" id="email" required value="">
    </div>
</div>

<div class="row mb-3">
    <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
    <div class="col-md-8 col-lg-9">
        <input type="text" name="phone" class="form-control" id="phone" required value="">
    </div>
</div>

<div class="row mb-3">
    <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
    <div class="col-md-8 col-lg-9">
        <input type="text" name="address" class="form-control" id="address" required value="">
    </div>
</div>

<div class="row mb-3">
    <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
    <div class="col-md-8 col-lg-9">
        <select name="gender" class="form-select" id="gender" required>
            <option selected disabled value="">Select gender</option>
            <option value="Male" >Male</option>
            <option value="Female" >Female</option>
        </select>
    </div>
</div>

<div class="row mb-3">
    <label for="birthdate" class="col-md-4 col-lg-3 col-form-label">Date of Birth</label>
    <div class="col-md-8 col-lg-9">
        <input type="date" name="birthdate" class="form-control" id="birthdate" min="1940-01-01" required value="">
    </div>
</div>

<div class="row mb-3">
    <label class="col-md-4 col-lg-3 col-form-label">Marital Status</label>
    <div class="col-md-8 col-lg-9">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="marital_status" id="single" value="Single" >
            <label class="form-check-label" for="single">Single</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="marital_status" id="married" value="Married" >
            <label class="form-check-label" for="married">Married</label>
        </div>
    </div>
</div>

<div class="row mb-3">
    <label for="spouse" class="col-md-4 col-lg-3 col-form-label">Spouse</label>
    <div class="col-md-8 col-lg-9">
        <select name="spouse_id" class="form-select" id="spouse">
            <option selected disabled>Select Spouse</option>
            
                
                    <option value="">
                        
                    </option>
                
            
        </select>
    </div>
</div>

<div class="row mb-3">
    <label for="supervisor" class="col-md-4 col-lg-3 col-form-label">Family</label>
    <div class="col-md-8 col-lg-9">
        <select name="family_id" class="form-select" id="supervisor">
            <option selected disabled>Select Family</option>
            
                
                    <option value="">
                        
                    </option>
                
            
        </select>
    </div>
</div>
<div class="row mb-3">
    <label for="supervisor" class="col-md-4 col-lg-3 col-form-label">Supervisor</label>
    <div class="col-md-8 col-lg-9">
        <select name="supervisor_id" class="form-select" id="supervisor">
            <option selected disabled>Select Supervisor</option>
            
                    <option value="" >
                        
                    </option>
               
        </select>
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

            

               
                <


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