<nav id="navmenu" class="navmenu">
  @if (Auth::user())
    <ul>
      {{-- <li><a href="">{{__('Profile')}}</a></li> --}}
      <li><a href="#about">{{__('Appointment')}}</a></li>
      <li><a href="#services">{{__('History')}}</a></li>
      {{-- <hr class="dropdown-divider"> --}}
      @can('create all location')
        <li>
          <button class="btn btn-link" >{{__('Location')}}</button>
        </li>
        <li>
          <button class="btn btn-link" >{{__('Therapist')}}</button>
        </li>
        <li>
          <button class="btn btn-link" >{{__('Treatment')}}</button>
        </li>
      @endcan
      <li>
        <button class="btn btn-link" id="btnLogout">{{__('Keluar')}}</button>
      </li>
    </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
  @else
    <marquee loop="infinite">
        {{__('Selamat Datang di Banyumanik Beauty Salon, Silahkan lakukan reservasi untuk menikmati diskon dan melakukan perawaran')}}
    </marquee>
    @endif    
  </nav>