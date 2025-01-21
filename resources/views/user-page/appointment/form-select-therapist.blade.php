@section('title-page','Therapist')
<x-app-layout>
    <div class="container my-4">
        <div class="col-12">
            <h4 class="text-center mb-3">{{__('Select Available Therapist')}}</h4>
            <div class="row" id="therapist-cards">
                <!-- Kartu therapist akan ditambahkan di sini oleh JavaScript -->
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                    <button type="button" class="btn btn-block btn-lg btn-primary w-100" id="btnNextTherapist" disabled><span class="badge badge-warning" id="badgeCountTherapist"></span> {{__('Therapist Selected')}} <i class="bi bi-arrow-right-circle-fill"></i></button>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                    <button class="btn btn-block btn-lg btn-warning w-100" id="btnBack"><i class="bi bi-arrow-left-circle-fill"></i> {{__('Back')}}</button>
                </div>
            </div>
        </div>
    </div>
@section('additional_js')
<script src="{{ asset('obs/js/user-page/therapist.js') }}"></script>
@endsection  
</x-app-layout>