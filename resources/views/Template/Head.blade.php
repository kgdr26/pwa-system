@if (Route::currentRouteName()=='role')
    <link href="{{asset('assets/plugin_tenp/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugin_tenp/datatables.bundle.js')}}"></script>
@endif

@if (Route::currentRouteName()=='users')
    <link href="{{asset('assets/plugin_tenp/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugin_tenp/datatables.bundle.js')}}"></script>
@endif

@if (Route::currentRouteName()=='entity')
    <link href="{{asset('assets/plugin_tenp/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugin_tenp/datatables.bundle.js')}}"></script>
@endif

@if (Route::currentRouteName()=='customer')
    <link href="{{asset('assets/plugin_tenp/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugin_tenp/datatables.bundle.js')}}"></script>
@endif

@if (Route::currentRouteName()=='customertype')
    <link href="{{asset('assets/plugin_tenp/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugin_tenp/datatables.bundle.js')}}"></script>
@endif

@if (Route::currentRouteName()=='machine')
    <link href="{{asset('assets/plugin_tenp/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugin_tenp/datatables.bundle.js')}}"></script>
@endif

@if (Route::currentRouteName()=='machinetype')
    <link href="{{asset('assets/plugin_tenp/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugin_tenp/datatables.bundle.js')}}"></script>
@endif

@if (Route::currentRouteName()=='machinevendor')
    <link href="{{asset('assets/plugin_tenp/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugin_tenp/datatables.bundle.js')}}"></script>
@endif

@if (Route::currentRouteName()=='machinemodel')
    <link href="{{asset('assets/plugin_tenp/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugin_tenp/datatables.bundle.js')}}"></script>
@endif

@if (Route::currentRouteName()=='project')
    <link href="{{asset('assets/plugin_tenp/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugin_tenp/datatables.bundle.js')}}"></script>
@endif

@if (Route::currentRouteName()=='formulir')
    <link href="{{asset('assets/plugin_tenp/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugin_tenp/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/bootstrap/bootstrap-datepicker.min.js')}}"></script>
    <style>
        .table-condensed {
            width: 250px;
            cursor: pointer;
        }
    
        .datepicker-days .table-condensed thead tr th{
            font-size: 1.5rem !important;
            text-align: center;
        }
    
        .datepicker-days .table-condensed tbody tr td{
            font-size: 1.2rem !important;
            cursor: pointer;
            text-align: center;
        }
    
        .datepicker-days .table-condensed tbody tr td.new.day,
        .datepicker-days .table-condensed tbody tr td.old.day{
            color: #8B8B8B;
        }
    
        .datepicker-days .table-condensed tbody tr td.today.day{
            background: rgb(0, 171, 85);
            color: #ffffff;
            border-radius: 0.3rem;
        }
    </style>
@endif