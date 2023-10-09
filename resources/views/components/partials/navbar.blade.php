<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Hidden brand</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Catagory
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @foreach ($categories as $categoryId => $categoryTitle)
              <li><a class="dropdown-item" href="#">{{$categoryTitle}}</a></li>

              @endforeach
             
            </ul>
          </li>
        </li>
      </ul>

      <form class="d-flex">

        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <ul class="navbar-nav mb-2 mb-lg-0">

        @auth
        <li class="nav-item">
          <a class="nav-link " href="{{route('dashboard')}}" tabindex="-1" aria-disabled="true">Dashboard</a>
        </li>
            
        @else
       
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="{{route('register')}}">Registration</a>
        </li>
        @endauth
       
      </ul>
    </div>
  </div>
</nav>

