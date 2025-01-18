<x-guest-layout>
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
    <div class="card card-accent-color">
        <div class="col-12">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="container section-title">
                        <h2>{{__('Treatment')}}</h2>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                        <div id="treatmentCarousel" class="carousel slide" data-bs-ride="carousel">
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
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="col-12">
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="container section-title mb-4">
                            <h2 class="text-black">{{__('Reservation')}}</h2>
                            <p class="mb-3">{{__('Percantik Hari-harimu Bersama Kami')}}</p>
                            <p>
                                <a class="btn btn-lg btn-primary" href="#appointment">{{__('Reservasi Sekarang')}}</a>
                            </p>
                        </div>
                    </div>
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
                        <div id="treatmentCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">

                                <!-- Slide 1 -->
                                <div class="carousel-item active">
                                  <div class="d-flex justify-content-center gap-3">
                                    <!-- Card 1 -->
                                    <div class="card treatment-card">
                                      <img src="https://picsum.photos/300/200" class="card-img-top" alt="Facial Glow">
                                      <div class="card-body text-center">
                                        <h5 class="card-title">Facial Glow</h5>
                                        <p class="card-text">Meningkatkan kelembapan kulit dan membuat wajah tampak lebih cerah.</p>
                                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                                      </div>
                                    </div>
                        
                                    <!-- Card 2 -->
                                    <div class="card treatment-card">
                                      <img src="https://picsum.photos/300/200" class="card-img-top" alt="Hair Spa">
                                      <div class="card-body text-center">
                                        <h5 class="card-title">Hair Spa</h5>
                                        <p class="card-text">Perawatan rambut intensif untuk rambut lebih sehat dan lembut.</p>
                                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        
                                <!-- Slide 2 -->
                                <div class="carousel-item">
                                  <div class="d-flex justify-content-center gap-3">
                                    <!-- Card 3 -->
                                    <div class="card treatment-card">
                                      <img src="https://picsum.photos/300/200" class="card-img-top" alt="Manicure & Pedicure">
                                      <div class="card-body text-center">
                                        <h5 class="card-title">Manicure & Pedicure</h5>
                                        <p class="card-text">Nikmati kuku yang bersih, rapi, dan tampilan menawan.</p>
                                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                                      </div>
                                    </div>
                        
                                    <!-- Card 4 -->
                                    <div class="card treatment-card">
                                      <img src="https://picsum.photos/300/200" class="card-img-top" alt="Body Scrub">
                                      <div class="card-body text-center">
                                        <h5 class="card-title">Body Scrub</h5>
                                        <p class="card-text">Eksfoliasi tubuh untuk kulit lebih halus dan bercahaya.</p>
                                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        
                              </div>
                        
                              <!-- Controls -->
                              <button class="carousel-control-prev" type="button" data-bs-target="#treatmentCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                              </button>
                              <button class="carousel-control-next" type="button" data-bs-target="#treatmentCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                              </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>