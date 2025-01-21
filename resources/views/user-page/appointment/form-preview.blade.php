@section('title-page','Preview')
<x-app-layout>
    <div class="container my-4">
        <div class="col-12">
            <div class="row">
                <div class="card card-accent-color">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">{{__('Name')}}</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->name}}" name="username" id="username" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">{{__('Email')}}</label>
                                    <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email" id="email" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">{{__('Phone Number')}}</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone" id="phone" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                  <a href="{{route('app_review')}}" class="btn btn-block btn-lg btn-outline-primary w-100" id="selectBtn">
                    {{__('Start Booking')}}
                    <i class="bi bi-arrow-right-circle-fill"></i>
                  </a>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                  <button class="btn btn-block btn-lg btn-warning w-100" id="backBtn">
                    <i class="bi bi-arrow-left-circle-fill"></i>
                    {{__('Back')}}
                  </button>
                </div>
              </div>
        </div>
    </div>
</x-app-layout>