@extends('main')
@section('content')

<style>
    .card-add-judul{
        width: 100%;
        border-top: 0.7rem solid #009688;
        padding: 0.5rem;
        border-radius: 0.3rem
    }

    .card-add{
        width: 100%;
        padding: 0.5rem;
        border-radius: 0.3rem
    }

    .card-add-judul .body,
    .card-add .body{
        width: 100%;
        padding: 0.5rem
    }

    .card-add-judul .footer,
    .card-add .footer{
        width: 100%;
        display: flex;
        justify-content: end;
        padding: 0.5rem;
        margin: 0rem;
        min-height: 0px;
        font-size: 1.5rem;
    }

    .card-add-judul .footer i,
    .card-add .footer i{
        cursor: pointer;
    }

    .card-add .footer i{
        margin-left: 0.5rem;
    }

    .form-judul{
        font-size: 2rem;
    }

    .form-control{
        border: 0px solid #ffffff;
        border-bottom: 0.2rem solid #dddddd;
    }

    .form-control:focus{
        outline:0px !important;
        -webkit-appearance:none;
        box-shadow: none !important;
        border-bottom: 0.2rem solid #009688;
    }

    .form-label{
        margin: 0rem;
    }
</style>

<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
           <div class="page_title">
                <h2>Add Formulir</h2>
           </div>
        </div>
     </div>
     <!-- row -->
     <div class="row column1">
        <div class="col-md-12 mb-3">
            <div class="white_shd card-add-judul">
                <div class="body">
                    <div class="mb-3">
                        <label for="" class="form-label form-judul">Judul Formulir</label>
                        <input type="text" class="form-control form-judul" id="" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="footer">
                    <i class="fa fa-plus-circle green_color"></i>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="white_shd card-add">
                <div class="body">
                    <div class="mb-3">
                        <label for="" class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control" id="" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="footer">
                    <i class="fa fa-plus-circle green_color"></i>
                    <i class="fa fa-plus-circle green_color"></i>
                    <i class="fa fa-trash red_color"></i>
                </div>
            </div>
        </div>


     </div>
</div>

@stop