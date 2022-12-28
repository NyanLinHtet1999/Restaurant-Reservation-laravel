<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <h2>Reservation</h2>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/category')) ? 'active' : '' }}" aria-current="page" href="{{route('admin#category')}}">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/menu')) ? 'active' : '' }}" href="{{route('admin#menu')}}">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/table')) ? 'active' : '' }}" href="{{route('admin#table')}}">Table</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/reservation')) ? 'active' : '' }}" href="{{route('admin#reservation')}}">Reservation</a>
          </li>
          <li class="nav-item dropdown">
            <div class="">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('admin#editInfo')}}">Edit Info</a></li>
              <li><a class="dropdown-item" href="{{route('admin#changePasswordPage')}}">Change Password</a></li>
              <li><a class="dropdown-item" href="{{route('user#home')}}">Client Side</a></li>
              <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class='dropdown-item' type="submit">Log out</button>
                </form>
              </li>
            </ul>
          </div>
          </li>


        </ul>
      </div>
    </div>
  </nav>
            @yield('mycontent')
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>
