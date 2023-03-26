@extends('main')
@section('content')

<div class="toolbar" id="kt_toolbar">
    <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <!--begin::Title-->
            <h1 class="text-dark fw-bold my-1 fs-2">
                Dashboard <small class="text-muted fs-6 fw-normal ms-1"></small>
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb fw-semibold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Dashboard</a>
                </li>
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Info-->
    </div>
</div>

<div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
    <div class="container-xxl min-w-100">
        <div class="row g-xl-8">

            <div class="col-xxl-4 gy-0 gy-xxl-8">
                <div class="card card-xxl-stretch mb-5 mb-xl-8">
                    <div class="card-body">
                        <div class="d-flex flex-column justify-content-between h-100">                   
                            <div class="pt-0">
                                <h3 class="text-dark text-center fs-1 fw-bolder line-height-lg">
                                    LOCATION
                                </h3>
                                <div class="text-center text-gray-600 fs-5 fw-semibold pt-4 pb-1">
                                    <table>
                                        <tr>
                                            <th class="text-start">Latitude</th>
                                            <th>:</th>
                                            <th><span id="lat"></span></th>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Longitude</th>
                                            <th>:</th>
                                            <th><span id="long"></span></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom card-rounded-bottom max-h-175px min-h-175px">
                                <div id="map" style="width: 100%; height: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>

        </div>
    </div>
</div>

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

        $('#lat').text(lat);
        $('#long').text(long);

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


@stop
