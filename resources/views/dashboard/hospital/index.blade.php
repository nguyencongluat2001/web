@extends('dashboard.layouts.index')
@section('body')
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_Hospital.js') }}"></script>
    {{-- <link  href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" /> --}}
    <div class="container-fluid">
        <div class="row">
            <form action="" method="POST" id="frmHospital_index">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <!-- <div class="breadcrumb-input-fix d-sm-flex align-items-center justify-content-between">
                    <button class="btn btn-success btn-sm shadow-sm" id="" type="button"data-toggle="tooltip"
                    data-original-title="Thêm danh mục"><i class="fas fa-book-medical"></i> Cẩm nang</button>
                   
                </div> -->
                <section class="content-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row form-group" style="text-align: center;">
                                <div class="col-md-5">
                                    <div class="breadcrumb-input-right">
                                        <button class="btn btn-success shadow-sm" id="btn_add" type="button"data-toggle="tooltip"
                                            data-original-title="Thêm bệnh viện"><i class="fas fa-plus"></i></button>
                                        <button class="btn btn-warning shadow-sm" id="btn_edit" type="button"data-toggle="tooltip"
                                            data-original-title="Sửa bệnh viện"><i class="far fa-edit"></i></button>
                                        <button class="btn btn-info shadow-sm" id="btn_money_package" type="button"data-toggle="tooltip"
                                            data-original-title="Cấu hình giá khám"><i class="fas fa-file-invoice-dollar"></i></button>
                                        <button class="btn btn-danger shadow-sm" id="btn_delete" type="button"data-toggle="tooltip"
                                            data-original-title="Xóa bệnh viện"><i class="fas fa-trash-alt"></i></button>
                                        <button class="btn btn-info shadow-sm" id="btn_stage" type="button"data-toggle="tooltip"
                                            data-original-title="Cấu hình bác sĩ">
                                            <i class="fas fa-tools"></i>
                                        </button>
                                    </div>
                                </div>
                               
                                <!-- <div class="col-md-3">
                                    <select class="form-control input-sm chzn-select" name="cate"
                                        id="cate">
                                        <option value=''>-- Chọn loại cẩm nang --</option>
                                        @foreach($data['category'] as $item)
                                            <option value="{{$item['code_category']}}">{{$item['decision']}}</option>
                                        @endforeach
                                    </select>
                                </div> -->
                                <div class="input-group" style="width:30%;height:10%">
                                    <!-- <span class="input-group-text text-body"><i class="fas fa-search"
                                            aria-hidden="true"></i></span> -->
                                    <input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm...">
                                </div>
                                <button style="width:5%" id="txt_search" name="txt_search" type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>

                            </div>
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
        var JS_Hospital = new JS_Hospital(baseUrl, 'system', 'hospital');
        $(document).ready(function($) {
            JS_Hospital.loadIndex(baseUrl);
        })
    </script>
@endsection
