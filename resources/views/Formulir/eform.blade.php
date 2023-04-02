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
                <li class="breadcrumb-item text-muted">eForm </li>
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

        <div class="card mb-3" id="">
            <div class="card-header">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">e-form</h3>
                </div>
            </div>

            <div class="card-body p-9">

                <div class="row mb-7">
                    <label class="col-lg-4 fw-semibold text-muted">CODE</label>
                    <div class="col-lg-8">                    
                        <span class="fw-bold fs-6 text-gray-800" id="code">-</span>                
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-semibold text-muted">FORM NAME</label>
                    <div class="col-lg-8">                    
                        <span class="fw-bold fs-6 text-gray-800" id="form_name">-</span>                
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-semibold text-muted">USER CONTENT</label>
                    <div class="col-lg-8">                    
                        <span class="fw-bold fs-6 text-gray-800" id="user_content">-</span>                
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-semibold text-muted">ROLE APPROVE</label>
                    <div class="col-lg-8">                    
                        <span class="fw-bold fs-6 text-gray-800" id="role_approval">-</span>                
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-semibold text-muted">CUSTOMER</label>
                    <div class="col-lg-8">                    
                        <span class="fw-bold fs-6 text-gray-800" id="customer">-</span>                
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-semibold text-muted">ENTITY</label>
                    <div class="col-lg-8">                    
                        <span class="fw-bold fs-6 text-gray-800" id="entity">-</span>                
                    </div>
                </div>

            </div>

            <div class="card-footer d-flex justify-content-end">
                <a href="#" class="btn btn-primary" id="add_awal" data-name="add_data">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                    Add Form List
                </a>
            </div>
        </div>

        <div class="list-form-show">

        </div>
        {{-- <div class="card mb-3" id="">
            <div class="card-header">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">1. Pertanyaan 1 ?</h3>
                </div>
            </div>

            <div class="card-body">
                <h4 class="fw-bold m-0">ANSWER :</h4>
            </div>

            <div class="card-footer d-flex justify-content-end">
                <a href="#" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                    Add Form List
                </a>
            </div>
        </div> --}}

    </div>
</div>

<div class="modal fade" id="add_data" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="">
                <h2>Add New List Form</h2>
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
                        <span class="required">Question</span>
                    </label>
                    <input type="text" class="form-control form-control-solid" placeholder="Question" data-name="QUESTION"/>
                </div>

                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Type</span>
                    </label>
                    <select name="TYPE" data-name="TYPE" data-control="select2" data-dropdown-parent="#add_data" data-placeholder="Select a Type..." class="form-select form-select-solid">
                        <option value="">Select a Type...</option>
                        <option value="ANSWER">ANSWER</option>
                        <option value="CHOICE">CHOICE</option>
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
    $(document).ready(function() {
        setTimeout(getdataeform);
    });
</script>

<script>
    $(document).on("click", "[data-name='add_data']", function (e) {
        $('[data-name="QUESTION"]').val('');
        $('[data-name="TYPE"]').val('').trigger("change");
        $('#add_data').modal('show');
    });

    $(document).on("click", "[data-name='save_data']", function (e) {
        var id          = '{{$id}}';
        var QUESTION    = $('[data-name="QUESTION"]').val();
        var TYPE        = $('[data-name="TYPE"]').val();

        $.ajax({
            type: "POST",
            url: "{{ route('adddataeform') }}",
            data: {id:id,QUESTION:QUESTION,TYPE:TYPE},
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
                    // location.reload();
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
    function getdataeform(){
        var id  = '{{$id}}';
        $.ajax({
            type: "POST",
            url: "{{ route('getdataeform') }}",
            dataType: 'json',
            global: false,
            cache: false,
            data: {id:id},
            success: function(data) {
                // console.log(data.form);
                $('#code').text(data.code.toUpperCase());
                $('#form_name').text(data.form_name.toUpperCase());
                $('#customer').text(data.customer);
                $('#entity').text(data.entity);
                $('#user_content').text(data.user_content);
                $('#role_approval').text(data.role_approval);
                $('.list-form-show').html(data.form);
                if(data.form !== ''){
                    $('#add_awal').hide();
                }
            },
            complete: function (data) {
                 // Schedule the next
                setTimeout(getdataeform, 1000);
            }

        });
    }
</script>

@stop