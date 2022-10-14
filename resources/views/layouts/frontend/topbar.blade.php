<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa-regular fa-square-minus"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <h5 class="text-center" style="padding-top: 5px;">DIU REGISTRATION SYSTEM</h5>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      @if(Auth::guard('student')->check())
            <ul>
              <i class="fa-regular fa-user float-middle"></i>  <b>Login As</b>
              <p><b>{{Auth::guard('student')->user()->name}}</b></p>
            </ul>
      @endif
    </ul>
  </nav>