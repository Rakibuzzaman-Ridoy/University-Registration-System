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
      @if(Auth::check())
            <ul>
              <i class="fa-regular fa-user float-middle"></i>
              <p><b>{{Auth::user()->name}}</b></p>
            </ul>
      @endif
    </ul>
  </nav>