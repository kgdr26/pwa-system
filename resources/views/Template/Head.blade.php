@if (Route::currentRouteName()=='role')
    <link href="{{asset('assets/plugin_tenp/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugin_tenp/datatables.bundle.js')}}"></script>
@endif

@if (Route::currentRouteName()=='users')
    <link href="{{asset('assets/plugin_tenp/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugin_tenp/datatables.bundle.js')}}"></script>
@endif