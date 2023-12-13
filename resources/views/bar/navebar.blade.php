

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('app_home')}}">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('app_home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('app_about')}}">about</a>
        </li>
        
          <!-- Example single danger button -->
          @guest
          <div class="btn-group">
            <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Mon compte
            </button>
            
          </div>
          <ul class="">
            <li><a class="dropdown-item" href="{{route('login') }}">login</a></li>
            <li><a class="dropdown-item" href="{{route('register') }}">register</a></li>
            </ul>

          @endguest
        @auth
        <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}
            </button>
           
          </div>
          <ul class="">
            <li><a class="dropdown-item" href="{{route('app_logout') }}">logout</a></li>
            </ul>
        @endauth
      </ul>
     
    </div>
  </div>
</nav>