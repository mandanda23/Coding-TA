 <!--navbar -->
 <section id="nav">
  <nav class="navbar navbar-expand-lg navbar-Light fixed-top">
    <div class="container-fluid ms-4 me-5">
      <a class="logo-name" href="/">
        <i><img src="{{ asset('assets/img/logo1.png')}}" alt="" width="37" height="32" class="d-inline-block align-item-center"></i>
        SIRAKAJA 
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto me-5">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home") ? 'active' : ''}}" href="/"> <i class='bx bx-home' ></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'About') ? 'active' : '' }}" href="/about"><i class='bx bx-info-circle' ></i> about</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'About') ? 'active' : '' }}" href="/lihat"><i class='bx bxs-dashboard'></i> Dashboard</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class='bx bx-dock-left'></i> Fitur
            </a>
            <ul class="dropdown-menu" id="dropdownmenu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/tesbrowsing"><i class='bx bx-globe'></i> Browsing</a></li>
              <li><a class="dropdown-item" href="/searching"><i class='bx bx-search-alt'></i> Searching</a></li>
            </ul>
          </li>
          </ul>
      </div>
    </div>
  </nav>
  </section>