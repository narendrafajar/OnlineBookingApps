@section('title-page','Banyumanik Beauty Salon')
@section('subtitle-page','Online Booking')
<x-app-layout>
    <div class="col-12">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">{{__('Review')}}</h4>
                    <div class="card card-accent-color mb-3">
                        <div class="card-header">
                            <h6 class="card-title">{{__('Order Details')}}</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="responsive">
                                        <table class="w-100">
                                            <tr>
                                                <td> ID Trans</td>
                                                <td class="text-end"> {{$code}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Customers')}}</td>
                                                <td class="text-end"> {{Auth::user()->name}}</td>
                                            </tr>
                                            <tr>
                                                <td> Locations</td>
                                                <td class="text-end" id="locationsName"></td>
                                            </tr>
                                            <tr>
                                                <td> {{__('Phone Number')}}</td>
                                                <td class="text-end"> {{Auth::user()->phone}}</td>
                                            </tr>
                                        </table>
                                        <table class="w-100">
                                            <tr>
                                                <th colspan="2">{{__('Treatments')}}</th>
                                            </tr>
                                            <tbody id="bodyTreatments">
                                                <!-- Data akan diisi melalui JavaScript -->
                                            </tbody>
                                        </table>
                                        <table class="w-100">
                                            <tr>
                                                <th colspan="2">{{__('Therapist')}}</th>
                                            </tr>
                                            <tbody id="bodyTherapist">
                                                <!-- Data akan diisi melalui JavaScript -->
                                            </tbody>
                                        </table>
                                        <table class="w-100">
                                            <tr>
                                                <td> {{__('Date')}}</td>
                                                <td class="text-end" id="dateApp"></td>
                                            </tr>
                                            <tr>
                                                <td>{{__(' ')}}</td>
                                                <td class="text-end" id="timeApp"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">{{__('Payment Details')}}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="w-100">
                                    <tbody id="bodyDetailPayment">
                                        <!-- Data akan diisi melalui JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <table class="w-100">
                                <tr>
                                    <td><h6 class="card-title">{{__('Total')}}</h6></td>
                                    <td class="text-end"><h6 class="card-title" id="totalPayment">{{__('Total')}}</h6></td>
                                </tr>
                            </table>
                        </div>
                    </div>   
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-lg w-100">{{__('Submit')}}</button>
                </div>
            </div>
        </div>
    </div>
@section('additional_js')
<script src="{{ asset('obs/js/user-page/appointment-reviews.js') }}"></script>
@endsection  
</x-app-layout>
