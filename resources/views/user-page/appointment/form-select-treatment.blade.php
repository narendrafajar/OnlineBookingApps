@section('title-page','Treatments')
<x-app-layout>
    <div id="message-alert"></div>
    <div class="container my-4">
        <div class="col-12">
            <h4 class="text-center mb-3">{{__('Select Treatment')}}</h4>
            <div class="row">
                @foreach ($cat as $key => $catVal )
                    <h4>{{$catVal->category_name}}</h4>
                    @foreach ($catVal->manyTreatments as $keyTreatment => $valTreatment )
                        <div class="col-sm-4 col-md-4 col-lg-4 mb-3"> <!-- Menggunakan col-4 untuk 3 kolom -->
                            <div class="card selectable" id="{{$valTreatment->id}}">
                                <div class="card-header text-center">
                                    <div class="card-title-container text-center">
                                        <img src="{{asset('storage/treatment/'.$valTreatment->image_treatments)}}" alt="" style="widows: 50%">
                                        <small class="">{{$valTreatment->location_name}}</small>
                                        <i class="fa fa-check-circle check-icon" style="display: none;"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text text-center">{{$valTreatment->treatment_name}}</p>
                                    <p class="card-text text-center">{{formatRupiah($valTreatment->treatment_price)}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                    <button type="button" class="btn btn-block btn-lg btn-primary w-100" id="btnNext"><span class="badge badge-warning" id="badgeCount"></span> {{__('Treatment')}} <i class="bi bi-arrow-right-circle-fill"></i></button>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                    <button class="btn btn-block btn-lg btn-warning w-100" id="btnBack"><i class="bi bi-arrow-left-circle-fill"></i> {{__('Back')}}</button>
                </div>
            </div>
        </div>
    </div>
    
@section('additional_js')
    <script src="{{ asset('obs/js/user-page/treatment-select.js') }}"></script>
@endsection  
</x-app-layout>