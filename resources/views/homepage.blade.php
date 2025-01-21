<x-guest-layout>
    {{-- @if (Session::has('error'))
        <div class="alert alert-important alert-danger alert-dismissible" role="alert">
            <div class="d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/alert-circle</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                <div>
                    {{ __(Session::get('error')) }}
                </div>
            </div>
            <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-important alert-success alert-dismissible" role="alert">
            <div class="d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/check</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                <div>
                    {{ __(Session::get('success')) }}
                </div>
            </div>
            <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif
    <div id="message-alert"></div> --}}
    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-center">
            @include('layouts.navigation')
          </div>
    </div>
    <div class="container mb-3">
        <div class="row text-center">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h1>{{__('Banyumanik Beauty Salon')}}</h1>
                <h3>{{__('Online Booking')}}</h3>
            </div>
        </div>
    </div>
    <div class="card card-accent-color mb-3">
        <div class="col-12">
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="container section-title mb-4">
                            <h2>{{__('Reservation')}}</h2>
                            <p class="mb-3">{{__('Percantik Hari-harimu Bersama Kami')}}</p>
                            <p>
                                <buton type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">{{__('Reservasi Sekarang')}}</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="col-12">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="container section-title">
                        <h2 class="text-black">{{__('Treatment')}}</h2>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                        <div id="treatmentCarousel" class="carousel slide">
                              <div class="carousel-inner">
                                @foreach ($lstTreatment as $key => $treatment)
                                <div class="carousel-item @if($key === 0) active @endif">
                                    <div class="d-flex justify-content-center">
                                        <div class="card treatment-card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$treatment->treatment_name}}</h5>
                                                <p class="card-text">{{$treatment->treatment_desc}}</p>
                                                <div class="text-center">
                                                    <a href="#" class="btn btn-outline-primary">{{__('Reservasi')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                              </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#treatmentCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#treatmentCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                      <p class="text-center"><small><i>{{__('Slide to next content >>')}}</i></small></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card card-accent-color">
        <div class="col-12">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="container section-title">
                        <h2>{{__('Feed')}}</h2>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                        <div id="feedCarousel" class="carousel slide">
                            <div class="row">
                                @foreach ($feed as $key => $feedVal)
                                <div class="carousel-item @if($key === 0) active @endif">
                                    <div class="d-flex justify-content-center">
                                        <div class="card treatment-card">
                                            <div class="card-body">
                                                <div class="treatment-card-image mb-3">
                                                    <img src="{{$feedVal['image']}}" alt="{{$feedVal['title']}}">
                                                </div>
                                                <h6 class="card-title">{{$feedVal['title']}}</h6>
                                                <p class="card-text"></p>
                                                <div class="text-center">
                                                    <a href="{{$feedVal['link']}}" class="btn btn-outline-primary" target="_BLANK">{{__('Selengkapnya')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#feedCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#feedCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">{{__('Login')}}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (Session::has('error'))
                    <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                        <div class="d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/alert-circle</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            <div>
                                {{ __(Session::get('error')) }}
                            </div>
                        </div>
                        <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-important alert-success alert-dismissible" role="alert">
                        <div class="d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/check</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                            <div>
                                {{ __(Session::get('success')) }}
                            </div>
                        </div>
                        <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif
                <div id="message-alert"></div>
              <div class="form-control-plaintext text-center">{{__('Silahkan masuk untuk melakukan reservasi')}}</div>
                <div class="row" id="loginForm">
                    <form action="">
                        @csrf
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label for="" class="form-label">{{__('Email')}}</label>
                                <input type="email" class="form-control" placeholder="Masukkan email anda" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="" class="form-label">{{__('Password')}}</label>
                            <input type="password" class="form-control" placeholder="Masukkan password anda" name="password" id="password" required>
                        </div>
                    </form>
                </div>
                <div class="row" id="loaderForm" style="display: none">
                    <center>
                        <div> <img src="{{asset('obs/img/loading_new.gif')}}" alt=""></div>
                    </center>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
              <button type="button" class="btn btn-primary" id="btnLogin">Masuk</button>
            </div>
          </div>
        </div>
      </div>
      @section('additional_js')
      <script src="{{ asset('obs/js/homepage.js') }}"></script>
      @endsection  
</x-guest-layout>