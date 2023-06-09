@extends('main')
@section('content')

<div class="toolbar" id="kt_toolbar">
    <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <!--begin::Title-->
            <h1 class="text-dark fw-bold my-1 fs-2">
                Machine <small class="text-muted fs-6 fw-normal ms-1"></small>
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb fw-semibold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Machine</a>
                </li>
                <li class="breadcrumb-item text-muted">List Machine </li>
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Info-->
    </div>
</div>

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
                    <!--begin::Add product-->
                    <a href="#" class="btn btn-primary" data-name="add_data">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg>
                        Add Machine
                    </a>
                    <!--end::Add product-->
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
                            <th>NO</th>
                            <th>WSID</th>
                            <th>SERIAL NUMBER</th>
                            <th>LOCATION NAME</th>
                            <th>CUSTOMER</th>
                            <th>ENTITY</th>
                            <th>LAT LONG</th>
                            <th>TYPE</th>
                            <th>MODEL</th>
                            <th>VENDOR</th>
                            <th>QR CODE</th>
                            <th>STATUS</th>
                            <th class="text-center">ACTION</th>
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
                                <td>{{$no++}}</td>
                                <td>{{strtoupper($val->wsid)}}</td>
                                <td>{{$val->serial_no}}</td>
                                <td>{{strtoupper($val->location_name)}}</td>
                                <td>{{strtoupper($val->name_customer)}}</td>
                                <td>{{strtoupper($val->name_entity)}}</td>
                                <td>{{$val->lat_long}}</td>
                                <td>{{strtoupper($val->name_type)}}</td>
                                <td>{{strtoupper($val->name_model)}}</td>
                                <td>{{strtoupper($val->name_vendor)}}</td>
                                <td>{{$val->qr_code}}</td>
                                <td>
                                    @if ($val->is_active == 1)
                                        <div class="badge badge-light-success">Active</div>
                                    @else
                                        <div class="badge badge-light-danger">Inactive</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-info me-3" data-name="edit_data" data-item="{{$val->id}},{{$val->wsid}}">
                                            Edit
                                        </button>
                                        <button type="button" data-name="save_data" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </div>
                                    </div>
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

<div class="modal fade" id="add_data" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="">
                <h2>Add New Machine</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body py-10 px-lg-17">

                <div class="row mb-5">
                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">WSID</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="WSID" data-name="wsid"/>
                    </div>

                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">SERIAL NUMBER</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="SERIAL NUMBER" data-name="serial_no"/>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">CUSTOMER</span>
                        </label>
                        <select name="customer_id" data-name="customer_id" data-control="select2" data-dropdown-parent="#add_data" data-placeholder="Select a Customer..." class="form-select form-select-solid">
                            <option value="">Select a Customer...</option>
                            @foreach ($customer as $key => $val)
                                <option value="{{$val->id}}">{{strtoupper($val->name)}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">ENTITY</span>
                        </label>
                        <select name="entity_id" data-name="entity_id" data-control="select2" data-dropdown-parent="#add_data" data-placeholder="Select a Entity..." class="form-select form-select-solid">
                            <option value="">Select a Entity...</option>
                            @foreach ($entity as $key => $val)
                                <option value="{{$val->id}}">{{strtoupper($val->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">TYPE</span>
                        </label>
                        <select name="type_id" data-name="type_id" data-control="select2" data-dropdown-parent="#add_data" data-placeholder="Select a Type..." class="form-select form-select-solid">
                            <option value="">Select a Type...</option>
                            @foreach ($type as $key => $val)
                                <option value="{{$val->id}}">{{strtoupper($val->name)}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Model</span>
                        </label>
                        <select name="model_id" data-name="model_id" data-control="select2" data-dropdown-parent="#add_data" data-placeholder="Select a Model..." class="form-select form-select-solid">
                            <option value="">Select a Model...</option>
                            @foreach ($model as $key => $val)
                                <option value="{{$val->id}}">{{strtoupper($val->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Vendor</span>
                        </label>
                        <select name="vendor_id" data-name="vendor_id" data-control="select2" data-dropdown-parent="#add_data" data-placeholder="Select a Vendor..." class="form-select form-select-solid">
                            <option value="">Select a Vendor...</option>
                            @foreach ($vendor as $key => $val)
                                <option value="{{$val->id}}">{{strtoupper($val->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">LOCATION NAME</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="LOCATION NAME" data-name="location_name"/>
                    </div>
                </div>

                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">LOCATION ADDRESS</span>
                    </label>
                    <input type="text" class="form-control form-control-solid" placeholder="LOCATION ADDRESS" data-name="location_adr"/>
                </div>

                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">LAT LONG</span>
                    </label>
                    <input type="text" class="form-control form-control-solid" placeholder="LAT LONG" data-name="lat_long"/>
                </div>

            </div>
            <div class="modal-footer flex-center">
                <button type="button" class="btn btn-danger me-3" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" data-name="save_data" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", "[data-name='add_data']", function (e) {
        $('[data-name="wsid"]').val('');
        $('[data-name="serial_no"]').val('');
        $('[data-name="location_name"]').val('');
        $('[data-name="location_adr"]').val('');
        $('[data-name="customer_id"]').val('').trigger("change");
        $('[data-name="entity_id"]').val('').trigger("change");
        $('[data-name="lat_long"]').val('');
        $('[data-name="type_id"]').val('').trigger("change");
        $('[data-name="model_id"]').val('').trigger("change");
        $('[data-name="vendor_id"]').val('').trigger("change");
        
        $('#add_data').modal('show');
    });

    $(document).on("click", "[data-name='save_data']", function (e) {

        $('.preloader').show();
        var wsid            = $('[data-name="wsid"]').val();
        var serial_no       = $('[data-name="serial_no"]').val();
        var location_name   = $('[data-name="location_name"]').val();
        var location_adr    = $('[data-name="location_adr"]').val();
        var customer_id     = $('[data-name="customer_id"]').val();
        var entity_id       = $('[data-name="entity_id"]').val();
        var lat_long        = $('[data-name="lat_long"]').val();
        var type_id         = $('[data-name="type_id"]').val();
        var model_id        = $('[data-name="model_id"]').val();
        var vendor_id       = $('[data-name="vendor_id"]').val();

        $.ajax({
            type: "POST",
            url: "{{ route('machineadd') }}",
            data: {wsid:wsid,serial_no:serial_no,location_name:location_name,location_adr:location_adr,customer_id:customer_id,entity_id:entity_id,lat_long:lat_long,type_id:type_id,model_id:model_id,vendor_id:vendor_id},
            cache: false,
            success: function(data) {
                console.log(data);
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

<script>
    $('[name="type_id"]').select2({
        allowClear: false,
    });
    $('[name="model_id"]').select2({
        allowClear: false,
    });
    $('[name="vendor_id"]').select2({
        allowClear: false,
    });
    $('[name="customer_id"]').select2({
        allowClear: false,
    });
</script>


@stop