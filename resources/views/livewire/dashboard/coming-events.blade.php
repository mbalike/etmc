<div class="card">
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
              <h5 class="card-title">Upcoming Events<span> </span></h5>

              <div class="activity">
                
                        @foreach($events as $event)
                <div class="activity-item d-flex">
                    <div class="activite-label">{{$event->title}} </div>
                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'>{{$event->event_date}}</i>
                  <div class="activity-content">
                  
                  </div>
                </div>
                 @endforeach
                <!-- End activity item-->
                
                
              </div>

            </div>
          </div>