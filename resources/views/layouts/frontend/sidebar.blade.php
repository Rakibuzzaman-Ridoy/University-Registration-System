<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-decoration-none">
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
          <a href="#" class="d-block text-decoration-none">{{Auth::guard('student')->user()->name}}</a>
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
      <nav class="mt-2 text-light">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="color:blue">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="fa-brands fa-meetup"></i>
              <p class="text-light">
                Student Part
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('studentCourseDataShow') }}" class="nav-link active">
                  <i class="fa-solid fa-book"></i>
                  <p class="text-dark">Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('studenTteacherDataShow')}}" class="nav-link active">
                  <i class="fa-solid fa-person"></i>
                  <p class="text-dark">Teachers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('studentPaymentAmountDataShow') }}" class="nav-link active">
                  <i class="fa-regular fa-money-bill-1"></i>
                  <p class="text-dark">Fee Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="fa-solid fa-registered"></i>
                  <p class="text-dark">Pre-Registration</p>
                </a>
              </li>
             
          </li>
         
                                          {{-- Password Change & Logout --}}
          
         
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="fa-solid fa-gears"></i>
              <p class="text-light">
                Password & Logout
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('PasswordChangeFormOpen')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text-light">Password Change</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('studentLogout')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p class="text-light">Logout</p>
                </a>
              </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>