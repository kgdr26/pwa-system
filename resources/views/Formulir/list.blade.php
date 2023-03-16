@extends('main')
@section('content')

<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
           <div class="page_title">
                <h2>Formulir</h2>
           </div>
        </div>
     </div>
     <!-- row -->
     <div class="row column1">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <a href="{{route('formuliradd')}}" class="btn cur-p btn-success"><i class="fa fa-file-word-o"></i> Add Formulir</a>
                    </div>
                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive-sm">
                                <table class="table table-striped projects">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th style="width: 50%">Judul</th>
                                            <th>Admin Create</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                <tbody>

                                    <tr>
                                        <td colspan="4">No Data Available</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop