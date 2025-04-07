<div>
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
          
                 @livewire('members.table')
                 
          
                  
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
</div>
