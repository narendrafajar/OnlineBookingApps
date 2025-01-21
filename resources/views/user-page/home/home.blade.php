@section('title-page','Banyumanik Beauty Salon')
@section('subtitle-page','Online Booking')
<x-app-layout>
        <div class="card card-accent-color mb-3">
            <div class="col-12">
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="container section-title mb-4">
                                <h2>{{__('Reservation')}}</h2>
                                <p class="mb-3">{{__('Waktunya manjakan dirimu')}}</p>
                                <p>
                                    <a href="{{route('location_select')}}" class="btn btn-lg btn-primary" >{{__('Reservasi Sekarang')}}</a>
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
                            <h2 class="text-black">{{__('Appoinment')}}</h2>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                            <div id="treatmentCarousel" class="carousel slide">
                                  <div class="carousel-inner">
                                    {{-- @foreach ($lstTreatment as $key => $treatment)
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
                                    @endforeach --}}
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
                          {{-- <p class="text-center"><small><i>{{__('Slide to next content >>')}}</i></small></p> --}}
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
@section('additional_js')
    <script src="{{ asset('obs/js/user-page/home.js') }}"></script>
@endsection  
</x-app-layout>