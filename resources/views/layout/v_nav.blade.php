<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MENU</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item text-center">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/"> 
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link {{ request()->is('guru') ? 'active' : '' }}" href="/guru"> 
                    <span>Guru</span>
                </a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link {{ request()->is('siswa') ? 'active' : '' }}" href="/siswa">
                    <span>Siswa</span>
                </a>
            </li>
            </ul>
        </div>
    </div>
  </nav>