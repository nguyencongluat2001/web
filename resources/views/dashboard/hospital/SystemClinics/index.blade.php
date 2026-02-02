@extends('dashboard.layouts.index')
@section('body')
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_SystemClinics.js') }}"></script>
    {{-- <link  href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" /> --}}
    <div class="container-fluid">
        <div class="row">
            <form action="" method="POST" id="frmSystemClinics_index">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="code_hospital" id="code_hospital" value="{{ $data['code'] }}">
                <!-- <div class="breadcrumb-input-fix d-sm-flex align-items-center justify-content-between">
                    <button class="btn btn-success btn-sm shadow-sm" id="" type="button"data-toggle="tooltip"
                    data-original-title="Thêm danh mục"><i class="fas fa-book-medical"></i> Cẩm nang</button>
                   
                </div> -->
                <section class="content-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row form-group" style="text-align: center;">
                                <div class="col-md-3">
                                    <div class="breadcrumb-input-right">
                                        <button class="btn btn-success shadow-sm" id="btn_add" type="button"data-toggle="tooltip"
                                            data-original-title="Thêm cẩm nang"><i class="fas fa-plus"></i></button>
                                        <button class="btn btn-warning shadow-sm" id="btn_edit" type="button"data-toggle="tooltip"
                                            data-original-title="SỬa cẩm nang"><i class="far fa-edit"></i></button>
                                        <button class="btn btn-danger shadow-sm" id="btn_delete" type="button"data-toggle="tooltip"
                                            data-original-title="Xóa cẩm nang"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </div>
                                <div class="input-group" style="width:30%;height:10%">
                                    <!-- <span class="input-group-text text-body"><i class="fas fa-search"
                                            aria-hidden="true"></i></span> -->
                                    <input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm...">
                                </div>
                                <button style="width:5%" id="txt_search" name="txt_search" type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>

                            </div>
                            <span>{{ $data['name_hospital'] }}</span>

                            <!-- Màn hình danh sách -->
                            <div class="row" id="table-container" style="padding-top:10px"></div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <div class="modal fade" id="editmodal" role="dialog"></div>
    <div class="modal" id="videomodal" role="dialog"></div>
    <div class="modal " id="addfile" role="dialog"></div>

    <div id="dialogconfirm"></div>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = '{{ url('') }}';
        var JS_SystemClinics = new JS_SystemClinics(baseUrl, 'system', 'hospital/stage');
        $(document).ready(function($) {
            JS_SystemClinics.loadIndex(baseUrl);
        })
    </script>
@endsection
