 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{('/')}}" >
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

 

  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{('/events')}}">
          <i class="bi bi-circle"></i><span>Events</span>
        </a>
      </li>
      <li>
        <a href="{{route('users-table')}}">
          <i class="bi bi-circle"></i><span>Users</span>
        </a>
      </li>
      <li>
        <a href="{{('/members')}}">
          <i class="bi bi-circle"></i><span>Members</span>
        </a>
      </li>
      <li>
        <a href="{{('/kids')}}">
          <i class="bi bi-circle"></i><span>Kids</span>
        </a>
      </li>
      <li>
        <a href="{{('/teenagers')}}">
          <i class="bi bi-circle"></i><span>Teenagers</span>
        </a>
      </li>
      <li>
        <a href="{{('/baptisms')}}">
          <i class="bi bi-circle"></i><span>Baptism</span>
        </a>
      </li>
      <li>
        <a href="">
          <i class="bi bi-circle"></i><span>Families</span>
        </a>
      </li>
      <li>
        <a href="{{('/marriages')}}">
          <i class="bi bi-circle"></i><span>Marriages</span>
        </a>
      </li>
      <li>
        <a href="{{('/transfers')}}">
          <i class="bi bi-circle"></i><span>Transfers</span>
        </a>
      </li>
      <li>
        <a href="{{('/deaths')}}">
          <i class="bi bi-circle"></i><span>Deaths</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

 

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.html">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-contact.html">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-register.html">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('logOut')}}">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Logout</span>
    </a>
  </li><!-- End Login Page Nav -->


</ul>

</aside><!-- End Sidebar-->