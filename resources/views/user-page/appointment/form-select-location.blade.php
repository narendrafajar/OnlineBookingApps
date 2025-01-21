@section('title-page','Locations')
<x-app-layout>
    <div id="message-alert"></div>
    <div class="container my-4">
        <h4 class="text-center mb-3">{{__('Select Locations')}}</h4>
        <div class="row">
          @foreach ($loc as $key => $valLoc )
          <div class="col-md-4 mb-3">
            <div class="card selectable" id="locationSelect_{{$valLoc->id}}">
              <div class="card-header">
                
                  <h5 class="card-title"><svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-map-pin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" /></svg> {{$valLoc->location_name}}</h5>
              </div>
              <div class="card-body">
                <p class="card-text">{{$valLoc->location_address}}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
            <button type="button" class="btn btn-block btn-lg btn-outline-primary w-100" id="selectBtn">
              {{__('Select')}}
               <i class="bi bi-check-circle-fill"></i>
            </button>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
            <button class="btn btn-block btn-lg btn-warning w-100" id="backBtn">
              <i class="fa fa-times"></i>
              {{__('Cancel')}}
            </button>
          </div>
        </div>
    </div>
    
@section('additional_js')
    <script src="{{ asset('obs/js/user-page/location-select.js') }}"></script>
@endsection  
</x-app-layout>