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

        <div class="card" id="kt_profile_details_view">
            <div class="card-header cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Profile Details</h3>
                </div>
            </div>

            <div class="card-body p-9">

                <div class="row mb-7">
                    <label class="col-lg-4 fw-semibold text-muted">CODE</label>
                    <div class="col-lg-8">                    
                        <span class="fw-bold fs-6 text-gray-800">-</span>                
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-semibold text-muted">FORM NAME</label>
                    <div class="col-lg-8">                    
                        <span class="fw-bold fs-6 text-gray-800">-</span>                
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-semibold text-muted">USER CONTENT</label>
                    <div class="col-lg-8">                    
                        <span class="fw-bold fs-6 text-gray-800">-</span>                
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-semibold text-muted">ROLE APPROVE</label>
                    <div class="col-lg-8">                    
                        <span class="fw-bold fs-6 text-gray-800">-</span>                
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-semibold text-muted">CUSTOMER</label>
                    <div class="col-lg-8">                    
                        <span class="fw-bold fs-6 text-gray-800">-</span>                
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-semibold text-muted">ENTITY</label>
                    <div class="col-lg-8">                    
                        <span class="fw-bold fs-6 text-gray-800">-</span>                
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <a href="#" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                    Add Form List
                </a>
            </div>
        </div>

    </div>
</div>

@stop