@extends('dashboard.layouts.index')
@section('css')
<style>
    #txt_search{
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;  
    }
</style>
@endsection
@section('body')
<div class="container-fluid">
    <section class="content-wrapper">
        <form id="frmApproveAthome">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="row">
                @if(!empty($_SESSION['role']) && $_SESSION['role'] == 'ADMIN')
                <div class="col-md-6">
                    <!-- <button type="button" class="btn btn-success shadow-sm" id="btn_add"><i class="fas fa-plus"></i> Thêm</button> -->
                    <button type="button" class="btn btn-danger shadow-sm" id="btn_delete"><i class="fas fa-trash-alt"></i> Xóa</button>
                    <!-- <button type="button" class="btn btn-warning shadow-sm" id="btn_delete"><i class="fas fa-trash-alt"></i> Xuất danh sách</button> -->
                </div>
                @endif
                <div class="col-md-10 row">
                     <div class="col-md-3">
                        <select class="form-control input-sm chzn-select" name="type_at_home"
                            id="type_at_home">
                            <!-- <option value=''>-- Chọn loại dịch vụ--</option> -->
                            <option value="XET_NGHIEM">Xét nghiệm</option>
                            <option value="TRUYEN_DICH">Truyền dịch</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control input-sm chzn-select" name="status"
                            id="status">
                            <option value="">--Trạng thái--</option>
                            <option value="1">Đã thu tiền</option>
                            <option value="0">Chưa thu tiền</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <!-- <input type="text" class="form-control datepicker" name="fromdate" id="fromdate" placeholder="Từ ngày"> -->
                        <input class="form-control input-sm" style="font-size: 13px;" type="date"
                                id="fromdate" name="fromdate" value="<?php echo (new DateTime())->format('Y-m-d'); ?>" min="2010-01-01"
                                max="2030-12-31">
                    </div>
                    <div class="col-md-3">
                        <!-- <input type="text" class="form-control datepicker" name="todate" id="todate" placeholder="Đến ngày"> -->
                        <input class="form-control input-sm" style="font-size: 13px;" type="date"
                                id="todate" name="todate" value="<?php echo (new DateTime())->format('Y-m-d'); ?>" min="2010-01-01" max="2030-12-31">
                    </div>
                    <div class="col-md-7 row pt-3"> 
                        <div class="form-search form-group input-group">
                            <input type="text" class="form-control" name="search" id="search" style="height:40px" placeholder="Từ khóa tìm kiếm..." onkeydown="if (event.key == 'Enter'){JS_AppointmentAtHome.search();return false;}">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-dark" id="txt_search"><i class="fas fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="table-container" style="padding-top:10px"></div>
        </form>
    </section>
</div>
<div class="modal fade" id="addmodal" data-backdrop="static" role="dialog"></div>
<!-- @section('js') -->
<!-- <script>
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });
</script> -->
<script src="{{URL::asset('dist/js/backend/pages/JS_AppointmentAtHome.js')}}"></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_AppointmentAtHome = new JS_AppointmentAtHome(baseUrl, 'system', 'appointmentathome');
    jQuery(document).ready(function($) {
        JS_AppointmentAtHome.loadIndex(baseUrl);
    })
</script>
@endsection
@endsection