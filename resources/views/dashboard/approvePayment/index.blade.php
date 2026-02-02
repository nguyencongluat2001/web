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
        <form id="frmApprovePayment_index">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="row">
                @if(!empty($_SESSION['role']) && Auth::user()->role == 'ADMIN')
                <div class="col-md-6">
                    <!-- <button type="button" class="btn btn-success shadow-sm" id="btn_add"><i class="fas fa-plus"></i> Thêm</button> -->
                    <button type="button" class="btn btn-danger shadow-sm" id="btn_delete"><i class="fas fa-trash-alt"></i> Xóa</button>
                    <button type="button" class="btn btn-warning shadow-sm" id="btn_delete"><i class="fas fa-trash-alt"></i> Xuất danh sách</button>
                </div>
                @endif
                <div class="col-md-10 row">
                    <div class="col-md-3">
                        <select name="type_payment" id="type_payment" class="form-control chzn-select">
                            <option value="">--Chọn loại giao dịch--</option>
                            <option value="BANK">Chuyển khoản qua ngân hàng</option>
                            <!-- <option value="MOMO">Momo</option> -->
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control datepicker" name="fromdate" id="fromdate" placeholder="Từ ngày">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control datepicker" name="todate" id="todate" placeholder="Đến ngày">
                    </div>
                    <div class="col-md-5 row">
                        <div class="form-search form-group input-group">
                            <input type="text" class="form-control" name="search" id="search" style="height:40px" placeholder="Từ khóa tìm kiếm..." onkeydown="if (event.key == 'Enter'){JS_ApprovePayment.search();return false;}">
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
@section('js')
<script>
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });
</script>
<script src="{{URL::asset('dist/js/backend/pages/JS_ApprovePayment.js')}}"></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_ApprovePayment = new JS_ApprovePayment(baseUrl, 'system', 'approvepayment');
    jQuery(document).ready(function($) {
        JS_ApprovePayment.loadIndex(baseUrl);
    })
</script>
@endsection
@endsection