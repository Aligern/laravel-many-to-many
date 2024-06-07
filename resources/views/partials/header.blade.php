<header class="shadow-md">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="{{ route('admin.dashboard') }}">
              {{-- <img class="profile-img" src="/img/Numemon.png" alt="Numemon"> --}}
            Benvenuto {{ Auth::user()->name }}
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.projects.index') }}">Projects</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="text-white fa-solid fa-rectangle-list"></i></a>
                <ul class="dropdown-menu ls-glass">
                  <li>
                      <a class="dropdown-item text-white" href="#" id="userProfile" role="button">
                      <span class="mr-2 d-none d-lg-inline text-grat-600 small">Profile <i class="ps-2 fa-solid fa-user"></i></span>
                      {{-- <img class="profile-img rounded-circle" src="/img/Numemon.png" alt="Numemon"> --}}
                </a>
              </li>
              <li class="nav-item">
                <a class="dropdown-item text-white" role="button" href="https://github.com/Aligern">Il tuo GitHub<i class="ps-2 fa-brands fa-github"></i></a>
              </li>
                  <li>
                    <a class="dropdown-item text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Logout">Logout <i class="fa-solid fa-right-from-bracket">  
                    </i>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                    </form>
                </li>
                </ul>
              </li>

            </ul>
          </div>
        </div>
      </nav>
</header>