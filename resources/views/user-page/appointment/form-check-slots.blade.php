@section('title-page','Select Appointment Date')
<x-app-layout>
    <div class="container my-4">
        <h4 class="text-center mb-3">Select Date and Time</h4>
        <div class="col-12">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="mb-3">
                        <div id="calendarWrapper" class="text-center">
                            <div id="inlineDatePicker"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <div class="mb-3">
                        <div id="timeSlotsContainer" class="time-slots-container">
                            <!-- Slot waktu akan ditambahkan di sini -->
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <button id="confirmButton" class="btn btn-outline-primary w-100 mt-4" disabled>{{__('Next')}} <i class="bi bi-arrow-right-circle-fill"></i></button>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <button id="backButton" class="btn btn-warning w-100 mt-4"><i class="bi bi-arrow-left-circle-fill"></i> {{__('Back')}}</button>
                </div>
            </div>
        </div>
        
        {{-- <h5 class="mt-4">Pilih Waktu:</h5> --}}
        
        
        
    </div>
    
@section('additional_js')
    <script src="{{ asset('obs/js/user-page/select-date.js') }}"></script>
@endsection  
</x-app-layout>