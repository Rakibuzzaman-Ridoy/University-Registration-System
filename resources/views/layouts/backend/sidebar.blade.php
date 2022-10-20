<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link float-start">
      <img src="{{asset('backend')}}/dist/img/UMSDIU.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <h6 class="brand-text text-light fw-bold">DIU Registration System</h6>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="fa-brands fa-meetup"></i>
              <p>
                Admin's Job
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('semesterFormOpen') }}" class="nav-link active">
                  <i class="fa-solid fa-book"></i>
                  <p>Semester</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('departmentFormOpen') }}" class="nav-link active">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <i class="fas fa-home"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('paymentCategoryFormOpen') }}" class="nav-link active">
                  <i class="fa fa-dollar" aria-hidden="true"></i>
                  <p>Payment Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('paymentAmountFormOpen') }}" class="nav-link active">
                  <i class="fa-regular fa-money-bill-1"></i>
                  <p>Payment Amount</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('courseFormOpen') }}" class="nav-link active">
                  <i class="fa-solid fa-book"></i>
                  <p>Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('teacherFormOpen') }}" class="nav-link active">
                  <i class="fa-solid fa-person"></i>
                  <p>Teacher</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('creditFormOpen') }}" class="nav-link active">
                  <i class="fa-solid fa-pen-clip"></i>
                  <p>Credit</p>
                </a>
              </li>
            </ul>
          </li>
         <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="fa-brands fa-meetup"></i>
              <p>
                Student Registration
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('regDataShow')}}" class="nav-link active">
                  <i class="fa-solid fa-request"></i>
                  <p>Student's Reg Request</p>
                </a>
              </li>
            </ul>
          </li>
         
         
                                          {{-- Password Change & Logout --}}
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="fa-solid fa-gears"></i> 
                  <p>Password & Logout</p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('passwordChangeFormOpen')}}" class="nav-link">
                      <i class="nav-icon far fa-circle text-danger"></i>
                      <p class="text">Password Change</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                      <i class="nav-icon far fa-circle text-info"></i>
                      <p>Logout</p>
                    </a>
                  </li>
                </ul>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>