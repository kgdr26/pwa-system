@extends('main')
@section('content')

<div class="toolbar" id="kt_toolbar">
    <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <!--begin::Title-->
            <h1 class="text-dark fw-bold my-1 fs-2">
                Formulir <small class="text-muted fs-6 fw-normal ms-1"></small>
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb fw-semibold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Formulir</a>
                </li>
                <li class="breadcrumb-item text-muted">List Formulir </li>
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
                        Add Formulir
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
                            <th>CODE</th>
                            <th>JUDUL</th>
                            <th>CUSTOMER</th>
                            <th>ENTITY</th>
                            <th class="text-center">ACTIVE DATE</th>
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
                                <td>{{strtoupper($val->code)}}</td>
                                <td>{{strtoupper($val->judul)}}</td>
                                <td>{{strtoupper($val->customer_name)}}</td>
                                <td>{{strtoupper($val->entity_name)}}</td>
                                <td class="text-center">
                                    {{$val->date_start_active}}
                                </td>
                                <td>
                                    @if ($val->is_active == 1)
                                        <div class="badge badge-light-success">Active</div>
                                    @else
                                        <div class="badge badge-light-danger">Inactive</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-info me-3" data-item="{{$val->id}}">
                                            Show Form
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
                <h2>Add New Form</h2>
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

                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">JUDUL</span>
                    </label>
                    <input type="text" class="form-control form-control-solid" placeholder="Judul" data-name="judul"/>
                </div>

                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Customer</span>
                    </label>
                    <select name="customer_id" data-name="customer_id" data-control="select2" data-dropdown-parent="#add_data" data-placeholder="Select a Customer..." class="form-select form-select-solid">
                        <option value="">Select a Customer...</option>
                        @foreach ($customer as $key => $val)
                            <option value="{{$val->id}}">{{strtoupper($val->name)}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Entity</span>
                    </label>
                    <select name="entity_id" data-name="entity_id" data-control="select2" data-dropdown-parent="#add_data" data-placeholder="Select a Entity..." class="form-select form-select-solid">
                        <option value="">Select a Entity...</option>
                        @foreach ($entity as $key => $val)
                            <option value="{{$val->id}}">{{strtoupper($val->name)}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">DATE START ACTIVE</span>
                    </label>
                    <input type="text" class="form-control form-control-solid datepicker" placeholder="Date Start Active" data-name="date_start_active"/>
                </div>

                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">USER CONTENT</span>
                    </label>
                    <select name="user_id[]" data-name="user_id[]" data-control="select2"multiple="multiple" data-dropdown-parent="#add_data" data-placeholder="Select a User Content..." class="form-select form-select-solid">
                        <option value="">Select a User Content...</option>
                        @foreach ($user as $key => $val)
                            <option value="{{$val->id}}">{{strtoupper($val->alias)}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">ROLE APPROVAL</span>
                    </label>
                    <select name="role_id[]" data-name="role_id[]" data-control="select2"multiple="multiple" data-dropdown-parent="#add_data" data-placeholder="Select a Role Approval..." class="form-select form-select-solid">
                        <option value="">Select a Role Approval...</option>
                        @foreach ($role as $key => $val)
                            <option value="{{$val->id}}">{{strtoupper($val->name)}}</option>
                        @endforeach
                    </select>
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
        $('[data-name="judul"]').val('');
        $('[data-name="project_id"]').val('').trigger("change");
        $('[data-name="user_id"]').val('').trigger("change");
        $('[data-name="role_id"]').val('').trigger("change");
        $('[data-name="date_start_active"]').val('');
        $('[data-name="date_end_active"]').val('');
        $('#add_data').modal('show');
    });

    $(document).on("click", "[data-name='save_data']", function (e) {

        $('.preloader').show();
        var judul      = $('[data-name="judul"]').val();
        var project_id = $('[data-name="project_id"]').val();
        var date_start_active = $('[data-name="date_start_active"]').val();
        var date_end_active = $('[data-name="date_end_active"]').val();
        var user_id = $('[data-name="user_id[]"]').val();
        var role_id = $('[data-name="role_id[]"]').val();

        $.ajax({
            type: "POST",
            url: "{{ route('formuliradd') }}",
            data: {judul:judul,project_id:project_id,date_start_active:date_start_active,date_end_active:date_end_active,user_id:user_id,role_id:role_id},
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
    $(function () {
        $(".datepicker").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "yyyy-mm-dd",
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

@stop
