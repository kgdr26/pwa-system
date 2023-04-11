@extends('main')
@section('content')

<div class="toolbar" id="kt_toolbar">
    <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <!--begin::Title-->
            <h1 class="text-dark fw-bold my-1 fs-2">
                Record Latlong <small class="text-muted fs-6 fw-normal ms-1"></small>
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb fw-semibold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Record Latlong</a>
                </li>
                <li class="breadcrumb-item text-muted">Between Latlong </li>
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Info-->
    </div>
</div>

<!--begin::Post-->
<div class="post fs-6 d-flex flex-column-fluid mb-10" id="kt_post">
    <!--begin::Container-->
    <div class="container-xxl min-w-100">
        <!--begin::Products-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card title-->
                <div class="card-title">

                </div>
                <!--end::Card title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5" data-name="add_data">
                    
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">

                <div class="row">
                    <div class="col-md-6 fv-row fv-plugins-icon-container">

                        <div class="row mb-8">
                            <div class=" col-md-6 d-flex flex-column fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="">Latitude</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder="" id="lat" data-name="lat" disabled/>
                            </div>

                            <div class=" col-md-6 d-flex flex-column fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="">Longitude</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder="" id="long" data-name="long" disabled/>
                            </div>
                        </div>
                        
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="">Machine</span>
                            </label>
                            <select name="machine" data-name="machine" data-control="select2" data-placeholder="Select a Machine..." class="form-select form-select-solid">
                                <option value="">Select a Machine...</option>
                                @foreach ($machine as $key => $val)
                                    <option value="{{$val->id}}">{{strtoupper($val->location_name)}} - {{strtoupper($val->serial_no)}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                        <table class="table between">
                            <tr>
                                <td class="text-start">WSID</td>
                                <td>:</td>
                                <td><span data-name="show_wsid">-</span></td>
                            </tr>
                            <tr>
                                <td class="text-start">Srial Number</td>
                                <td>:</td>
                                <td><span data-name="show_serial_no">-</span></td>
                            </tr>
                            <tr>
                                <td class="text-start">Location Name</td>
                                <td>:</td>
                                <td><span data-name="show_location_name">-</span></td>
                            </tr>
                            <tr>
                                <td class="text-start">Location Address</td>
                                <td>:</td>
                                <td><span data-name="show_location_adr">-</span></td>
                            </tr>
                            <tr>
                                <td class="text-start">Customer Name</td>
                                <td>:</td>
                                <td><span data-name="show_customer_name">-</span></td>
                            </tr>
                            <tr>
                                <td class="text-start">Latlong</td>
                                <td>:</td>
                                <td><span data-name="show_lat_long">-</span></td>
                            </tr>
                            <tr>
                                <td class="text-start">Distance</td>
                                <td>:</td>
                                <td><span data-name="show_distance">-</span></td>
                            </tr>
                            <tr>
                                <td class="text-start">Travel Time</td>
                                <td>:</td>
                                <td><span data-name="show_travel_time">-</span></td>
                            </tr>
                            <input type="hidden" name="inp_latlong_mc" data-name="inp_latlong_mc">
                            <input type="hidden" name="inp_latlong_usr" data-name="inp_latlong_usr">
                            <input type="hidden" name="inp_id_mc" data-name="inp_id_mc">
                            <input type="hidden" name="inp_distance_estimation" data-name="inp_distance_estimation">
                            <input type="hidden" name="inp_time_estimation" data-name="inp_time_estimation">
                        </table>
                    </div>

                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                        <div class="d-flex flex-column mb-8 fv-row">
                            <button type="button" class="btn btn-primary" data-name="set_distance">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                                    <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                                </svg>
                                Set Distance
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                        <div class="d-flex flex-column mb-8 fv-row">
                            <button type="button" class="btn btn-primary" data-name="save_record" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-record-btn" viewBox="0 0 16 16">
                                    <path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                </svg>
                                Start Record
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Card body-->
        </div>
        <!--end::Products-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

<!--begin::Post-->
<div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div class="container-xxl min-w-100">
        <!--begin::Products-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-4"><svg width="24"
                                height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                    height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                    fill="currentColor" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon--> 
                        <input type="text" data-search-table="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Card title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">

                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="main_table">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="text-center">NO</th>
                            <th class="text-center">Location Name</th>
                            <th class="text-center">Latlong Start</th>
                            <th class="text-center">Latlong End</th>
                            <th class="text-center">Date Time Start</th>
                            <th class="text-center">Date Time End</th>
                            <th class="text-center">Distance Estimation</th>
                            <th class="text-center">Duration Estimation</th>
                            <th class="text-center">Duration Actual</th>
                            <th class="text-center" class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->

                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($arr as $key => $val)
                            <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td class="text-center">{{$val->mac_location_name}}</td>
                                <td class="text-center">{{$val->latlong_start}}</td>
                                <td class="text-center">{{$val->latlong_end}}</td>
                                <td class="text-center">{{$val->date_time_start}}</td>
                                <td class="text-center">{{$val->date_time_end}}</td>
                                <td class="text-center">{{$val->distance_estimation}}</td>
                                <td class="text-center">{{$val->time_estimation}}</td>
                                <td class="text-center">{{$val->duration_actual}}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-info me-3">
                                        End
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Products-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

<script>
    $(document).on("click", "[data-name='set_distance']", function (e) {
        $('.preloader').show();
        var lat     = $('[data-name="lat"]').val();
        var long    = $('[data-name="long"]').val();
        var machine = $('[data-name="machine"]').val();
        // console.log("lat "+betlat+"long "+betlong);

        $.ajax({
            type: "POST",
            url: "{{ route('setdistance') }}",
            data: {lat:lat,long:long,machine:machine},
            cache: false,
            success: function(data) {
                // console.log(data);
                $('.preloader').hide();

                console.log(data);

                $('[data-name="show_wsid"]').text(data.show_wsid);
                $('[data-name="show_serial_no"]').text(data.show_serial_no);
                $('[data-name="show_location_name"]').text(data.show_location_name);
                $('[data-name="show_location_adr"]').text(data.show_location_adr);
                $('[data-name="show_customer_name"]').text(data.show_customer_name);
                $('[data-name="show_lat_long"]').text(data.show_lat_long);
                $('[data-name="show_distance"]').text(data.show_distance+" meters\n");
                $('[data-name="show_travel_time"]').text(data.show_travel_time+" minutes");
                $('[data-name="inp_distance_estimation"]').val(data.show_distance);
                $('[data-name="inp_time_estimation"]').val(data.show_travel_time);
                $('[data-name="inp_latlong_mc"]').val(data.show_lat_long);
                $('[data-name="inp_id_mc"]').val(data.show_id_mc);

                $('[data-name="save_record"]').removeAttr("disabled")

            },            
            error: function (data) {
                $('.preloader').hide();
                Swal.fire({
                    position:'center',
                    title: 'Action Not Valid!',
                    icon: 'warning',
                    showConfirmButton: true,
                    // timer: 1500
                }).then((data) => {
                    // location.reload();
                })
            }
        });

    });

    $(document).on("click", "[data-name='save_record']", function (e) {
        var inp_latlong_mc          =$('[data-name="inp_latlong_mc"]').val();
        var inp_latlong_usr         =$('[data-name="inp_latlong_usr"]').val();
        var inp_id_mc               =$('[data-name="inp_id_mc"]').val();
        var inp_distance_estimation =$('[data-name="inp_distance_estimation"]').val();
        var inp_time_estimation     =$('[data-name="inp_time_estimation"]').val();

        $.ajax({
            type: "POST",
            url: "{{ route('addrecordlatlong') }}",
            data: {inp_latlong_mc:inp_latlong_mc,inp_latlong_usr:inp_latlong_usr,inp_id_mc:inp_id_mc,inp_distance_estimation:inp_distance_estimation,inp_time_estimation:inp_time_estimation},
            cache: false,
            success: function(data) {
                // console.log(data);
                $('.preloader').hide();
                Swal.fire({
                    position:'center',
                    title: 'Success!',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }).then((data) => {
                    location.reload();
                })
            },            
            error: function (data) {
                $('.preloader').hide();
                Swal.fire({
                    position:'center',
                    title: 'Action Not Valid!',
                    icon: 'warning',
                    showConfirmButton: true,
                    // timer: 1500
                }).then((data) => {
                    // location.reload();
                })
            }
        });
    });
</script>

<script>
    if(navigator.geolocation){ //jika navigator tersedia
        navigator.geolocation.getCurrentPosition(initialize);
    }
    else{ //jika navigator tidak tersedia
        console.log("Geolocation is not supported by this device");
    }

    function initialize(position) {
        var lat     = position.coords.latitude;
        var long    = position.coords.longitude;

        $('#lat').val(lat);
        $('#long').val(long);
        $('[data-name="inp_latlong_usr"]').val(lat+", "+long);


        // var latlng = new google.maps.LatLng(-6.298233,107.017143);
        var latlng = new google.maps.LatLng(lat,long);
        var map = new google.maps.Map(document.getElementById('map'), {
            center: latlng,
            zoom: 17
        });

        var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            draggable: false,
       });
        var infowindow = new google.maps.InfoWindow();   
        google.maps.event.addListener(marker, 'click', function() {
            var iwContent = '<div id="iw_container"><div class="iw_title"><b>Location</b> : Noida</div></div>';
            // including content to the infowindow
            infowindow.setContent(iwContent);
            // opening the infowindow in the current map and at the current marker location
            infowindow.open(map, marker);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script>
    "use strict";
    var MainJSTable = function () {
        // Shared variables
        var table;
        var datatable;

        // Private functions
        var initDatatable = function () {
            datatable = $(table).DataTable({
                "info": false,
                'order': [],
                'pageLength': 10,
            });
            datatable.on('draw', function () {
                handleDeleteRows();
            });
        }

        var handleSearchDatatable = () => {
            const filterSearch = document.querySelector('[data-search-table="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                datatable.search(e.target.value).draw();
            });
        }

        return {
            init: function () {
                table = document.querySelector('#main_table');

                if (!table) {
                    return;
                }

                initDatatable();
                handleSearchDatatable();
            }
        };
    }();

    KTUtil.onDOMContentLoaded(function () {
        MainJSTable.init();
    });
</script>

@stop