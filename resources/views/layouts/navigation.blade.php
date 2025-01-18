<nav id="navmenu" class="navmenu">
    <ul>
      <li><a href="#hero" class="active">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#departments">Departments</a></li>
      <li><a href="#doctors">Doctors</a></li>
      <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
        <ul>
          <li><a href="#">Dropdown 1</a></li>
          <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Deep Dropdown 1</a></li>
              <li><a href="#">Deep Dropdown 2</a></li>
              <li><a href="#">Deep Dropdown 3</a></li>
              <li><a href="#">Deep Dropdown 4</a></li>
              <li><a href="#">Deep Dropdown 5</a></li>
            </ul>
          </li>
          <li><a href="#">Dropdown 2</a></li>
          <li><a href="#">Dropdown 3</a></li>
          <li><a href="#">Dropdown 4</a></li>
        </ul>
      </li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    @if (Auth::user())
        <i class="mobile-nav-toggle d-xl-none bi bi-menu-down"></i>
    @else
    <marquee loop="infinite">
        {{__('Selamat Datang di Banyumanik Beauty Salon, Silahkan lakukan reservasi untuk menikmati diskon dan melakukan perawaran')}}
    </marquee>
    @endif    
  </nav>