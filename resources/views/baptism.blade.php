@extends('layout.layout')

 @section('content')
<div class="pagetitle">
  <h1>Baptism</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item active">Baptism</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
   

    <div class="col-xl-12">
  
        </div>
      

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#user-overview">Baptism</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#user-create">Add Baptism</button>
            </li>

            <!-- <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#user-edit">Edit Baptism</button>
            </li> -->

            <!-- <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li> -->

          </ul>
          <div class="tab-content pt-2">

          <div class="tab-pane fade show active profile-overview pt-3" id="user-overview">
              <!-- Change Password Form -->
              <section class="section dashboard">
                <div class="row">
                   <livewire:baptism />          
                  
                </div>
              </section>
            </div>

            <div class="tab-pane fade profile-edit pt-3" id="user-create">

              <!-- Create Family Form -->

              <livewire:baptism-form />

              <!-- End Create UserForm -->

            </div>

            <div class="tab-pane fade pt-3" id="user-edit">

              
                            <!-- User Edit Form -->
                           <!-- End User Edit Form -->

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