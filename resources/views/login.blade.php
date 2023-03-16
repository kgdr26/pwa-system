<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1" />
        <title>Login || PWA</title>
        <link rel="apple-touch-icon" href="">
        <link rel="shortcut icon" href="{{asset('assets/plugin_tenp/logo.svg')}}" />

        <link href="{{asset('assets/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/main/login.css')}}" rel="stylesheet">
        <link href="{{asset('assets/maps/jqvmap.css')}}" media="screen" rel="stylesheet" type="text/css"/>
        <script src="{{asset('assets/bootstrap/jquery.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/maps/jquery.vmap.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/maps/jquery.vmap.indonesia.js')}}" charset="utf-8"></script>

        <style>
            .alert{
                position: absolute !important;
                width: 100%;
                top: -5rem;
            }
        </style>
    </head>

    <body>
        <div id="vmap" class="mapss"></div>
        <div class="card-login">

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="logo">
                <img src="{{asset('assets/plugin_tenp/logo.svg')}}" alt="Logo">
            </div>
            <div class="d-flex justify-content-center flex-wrap">
                <p class="judul-1 mb-12">Progressive Web App</p>
            </div>
            <form action="{{route('dashboard')}}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="row mt-5">
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control form-costum" placeholder="Username" name="username">
                    </div>
                    <div class="col-12 mb-3">
                        <input type="password" class="form-control form-costum" placeholder="Password" name="password">
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-login">Login</button>
                    </div>
                </div>
            </form>
        </div>
        <script>
            jQuery(document).ready(function () {
                jQuery('#vmap').vectorMap({
                    map: 'indonesia_id',
                    enableZoom: false,
                    showTooltip: true,
                    selectedColor: null,
                    onRegionClick: function(event, code, region){
                    event.preventDefault();
                }
                });
            });
        </script>

    </body>
</html>
