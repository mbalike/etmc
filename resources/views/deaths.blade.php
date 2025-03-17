@extends('layout.layout')
  @section('content')
<div class="pagetitle">
  <h1>Death</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item active">Deaths</li>
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
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#user-overview">Deaths</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#user-create">Add</button>
            </li>


          </ul>
          <div class="tab-content pt-2">

          <div class="tab-pane fade show active profile-overview pt-3" id="user-overview">
              <!-- Change Password Form -->
              <section class="section dashboard">
                <div class="row">
          
                  <livewire:deaths>
                  
                </div>
              </section>
          
            </div>

            <div class="tab-pane fade profile-edit pt-3" id="user-create">

             <!-- Member Death Form -->
             <form action="" method="post">
                           @csrf
                           <div class="row mb-3">
                        <label for="spouse" class="col-md-4 col-lg-3 col-form-label">Deceased</label>
                        <div class="col-md-8 col-lg-9">
                            <select name="id"  class="form-select" id="deceased">
                                <option selected disabled>Select Deceased Member</option>
                                
                                    
                                        <option value="" >
                                            
                                        </option>
                                    
                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="birthdate" class="col-md-4 col-lg-3 col-form-label">Date of Death</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="date" name="dod" class="form-control" id="birthdate" min="1940-01-01" required value="">
                        </div>
                    </div>
                    
                   
                <div class="text-center">
                <button type="submit" class="btn btn-danger">Record as Deceased</button>
                </div>
              </form>
              <!-- End Member Death Form -->    
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