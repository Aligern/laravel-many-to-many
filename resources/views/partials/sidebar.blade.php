<nav id='sidebar'>
    <a href="/" class="nav-link text-light">
        <h2 class="p-2"><i class="fa-solid fa-folder-open pe-2"></i>Boolfolio</h2>
    </a>
    <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link"  {{Route::currentRouteName() === 'admin.dashboard' ? 'active-' : ''}} href="{{route('admin.dashboard')}}"><i class="fa-solid fa-link pe-2"></i>Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  {{Route::currentRouteName() === 'admin.projects.index' ? 'active' : ''}} href="{{route('admin.projects.index')}}"><i class="fa-solid fa-diagram-project pe-2"></i>Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  {{Route::currentRouteName() === 'admin.types.index' ? 'active' : ''}} href="{{route('admin.types.index')}}"><i class="fa-solid fa-layer-group pe-2"></i>Types</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  {{Route::currentRouteName() === 'admin.technologies.index' ? 'active' : ''}} href="{{route('admin.technologies.index')}}"><i class="fa-solid fa-microchip pe-2"></i></i>technologies</a>
        </li>
      </ul>
</nav>