<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>University Registration System!</title>
  </head>
  <body>
    <div class="container">
        <h1 class="bg-dark text-danger text-center" style="padding: 30px">University Registration System!</h1>
        {{-- <div class="row">
            <div class="col-md-6 float-md-right">
              <h1 class="text-center">Admin</h1>
              @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
              @else 
                <div class="row">
                  <div class="col-md-3 float-end">
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                      <button class="btn btn-danger float-end">
                      Log in as Admin
                      </button>
                    </a>
                  </div>
                  <div class="col-md-3 float-end">
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
                      <button class="btn btn-danger">
                        Register as Admin
                      </button>
                    </a>
                  </div>
                </div>
              @endauth
            </div> --}}
            <div class="row">
            <div class="col-sm-6 float-end">
              <h1 class="text-center">Admin</h1>
              <div class="row">
                <div class="col-md-5">
                  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    <button class="btn btn-success">
                    Log in as Admin
                    </button>
                  </a>
                </div>
                <div class="col-md-5">
                  <a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    <button class="btn btn-danger">
                    Sign up as Admin
                    </button>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 float-end">
              <h1 class="text-center">Student</h1>
              <div class="row">
                <div class="col-md-5">
                  <a href="{{ route('studentLoginFormOpen') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    <button class="btn btn-success">
                    Log in as Student
                    </button>
                  </a>
                </div>
                <div class="col-md-5">
                  <a href="{{ route('studentRegisterFormOpen') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    <button class="btn btn-danger">
                    Sign up  as Student
                    </button>
                  </a>
                </div>
              </div>
            </div>
           
        </div>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

