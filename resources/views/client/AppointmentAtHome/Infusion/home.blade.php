@extends('client.layouts.index')
@section('body-client')
<style>
    form{
        width:80%;
    }
    .form-control:disabled{
        background-color:#ffffff
    }
</style>
<link rel="stylesheet" href="../clients/css/style.css">
    <!-- Start Banner Hero -->
    <div class="bg-light" >
        <!-- <div id="index_banner" class="banner-vertical-center-index"> -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner active" >
                     
                    <!-- End Contact -->
                    <div class="carousel-item active list-hispital-home" >
                        <div class=" row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-10 offset-1 m-lg-auto text-left ">
                                <div class="row g-lg-5 mb-4">
                                    <div class="banner-wrapper w-100" style="background:#ffffffba;color:black">
                                        <!-- <div class="row g-lg-5 mb-4">
                                            <div class="banner-wrapper w-100 py-3" style="background:#15283dd6">
                                                <div class="list-group wrapper pb-0 px-3">
                                                    <a class="col-sm-6 col-lg-12 text-decoration-none text-light">
                                                        <div class="d-lg-flex gx-5">
                                                            <div class="col-lg-3">
                                                                <img class="card-img-top" src="{{url('/clients/img/laymautainha.jpeg')}}" style="width:250px;height:150px;object-fit: cover;" alt="...">
                                                            </div>
                                                            <div class="col-lg-1 "></div>
                                                            <div class="col-lg-8 ">
                                                            <span  class="text-title-home" style="color:#ff9300"><center> Truyền dịch tại nhà - Tiêm thuốc theo chỉ định của bác sĩ</center></span>
                                                        </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="row g-lg-5 mb-4">
                                            <div class="banner-wrapper w-100 py-3">
                                                <div class="list-group wrapper pb-0 px-3">
                                                    <a class="col-sm-6 col-lg-12 text-decoration-none text-light">
                                                        <div class="d-lg-flex gx-5">
                                                            <div class="col-lg-1">
                                                                <!-- <center>
                                                                <img class="card-img-top" src="{{url('/clients/img/logoMed.webp')}}" style="width:120px;object-fit: cover;" alt="...">

                                                                </center> -->
                                                            </div>
                                                            <div class="col-lg-1 "></div>
                                                            <div class="col-lg-8 ">
                                                            <span  class="text-title-home" style="color:#000000"><center> Truyền dịch tại nhà</center></span>
                                                            <span  style="font-size:15px;color:#577391">Truyền dịch tại nhà theo chỉ định của bác sĩ.</span>
                                                        </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" pb-0 px-3">
                                        <span  class="text-title-home" style="color:#226c28c9" ><center> Thông tin</center></span>

                                        <div class="wrapper" style="display: flex; justify-content: center;">
                                            <form id="frmSendSchedule" method="POST"  autocomplete="off">
                                                @csrf
                                                <!-- <input type="hidden" id="code" name="code" value="{{ !empty($datas->code)?$datas->code:'' }}"> -->
                                                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" id="type_at_home" name="type_at_home" value="TRUYEN_DICH">
                                                <div class="row">
                                                    <div class="form-wrapper col-md-6">
                                                        <label for="">Họ và tên <span class="request_star">*</span></label>
                                                        <input placeholder="Nhập tên..." id="name" type="text" class="form-control" name="name" value="" autofocus>
                                                    </div>
                                                    <div class="form-wrapper col-md-6">
                                                        <label for="">Số điện thoại <span class="request_star">*</span></label>
                                                        <input placeholder="Số điện thoại..." id="phone" type="phone" class="form-control" name="phone" value="">
                                                    </div>
                                                    {{--<div class="form-wrapper col-md-4">
                                                        <label for="">Địa chỉ Email</label>
                                                        <input placeholder="Nhập email..." id="email" type="email" class="form-control" name="email" value="">
                                                    </div>--}}
                                                </div>
                                                <div class="row">
                                                    <div class="form-wrapper col-md-3">
                                                        <label for="">Giới tính <span class="request_star">*</span></label>
                                                        <input type="radio" value="1" name="sex" id="sex" />  <span style="padding-left:5px" >Nam</span>&emsp;
                                                        <input  type="radio" value="2" name="sex" id="sex"  /> <span style="padding-left:5px" >Nữ</span>
                                                    </div>
                                                    <div class="form-wrapper col-md-4">
                                                            <label for="">Ngày truyền<span class="request_star">*</span></label>
                                                        <input  id="date_sampling" type="date" class="form-control" name="date_sampling" value="">
                                                    </div>
                                                    <div class="form-wrapper col-md-4">
                                                            <label for="">Giờ truyền<span class="request_star">*</span></label>
                                                        <select class="form-control input-sm chzn-select" name="hour_sampling" id="hour_sampling">
                                                            <option value="">--Chọn giờ--</option>
                                                            <option value="05h30">05 giờ 30 phút</option>
                                                            <option value="06h00">06 giờ 00 phút</option>
                                                            <option value="06h30">06 giờ 30 phút</option>
                                                            <option value="07h00">07 giờ 00 phút</option>
                                                            <option value="07h30">07 giờ 30 phút</option>
                                                            <option value="08h00">08 giờ 00 phút</option>
                                                            <option value="08h30">08 giờ 30 phút</option>
                                                            <option value="09h00">09 giờ 00 phút</option>
                                                            <option value="09h30">00 giờ 30 phút</option>
                                                            <option value="10h00">10 giờ 00 phút</option>
                                                            <option value="10h30">10 giờ 30 phút</option>
                                                            <option value="11h00">11 giờ 00 phút</option>
                                                            <option value="11h30">11 giờ 30 phút</option>
                                                            <option value="13h30">13 giờ 30 phút</option>
                                                            <option value="14h00">14 giờ 00 phút</option>
                                                            <option value="14h30">14 giờ 30 phút</option>
                                                            <option value="15h00">15 giờ 00 phút</option>
                                                            <option value="15h30">15 giờ 30 phút</option>
                                                            <option value="16h00">16 giờ 00 phút</option>
                                                            <option value="16h30">16 giờ 30 phút</option>
                                                            <option value="17h00">17 giờ 00 phút</option>
                                                            <option value="17h30">17 giờ 30 phút</option>
                                                            <option value="18h00">18 giờ 00 phút</option>
                                                            <option value="17h30">17 giờ 30 phút</option>
                                                            <option value="18h00">18 giờ 00 phút</option>
                                                            <option value="18h30">18 giờ 30 phút</option>
                                                            <option value="19h00">19 giờ 00 phút</option>
                                                            <option value="19h30">19 giờ 30 phút</option>
                                                            <option value="20h00">20 giờ 00 phút</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-wrapper">
                                                        <label for="">Địa chỉ chi tiết <span class="request_star">*</span></label>
                                                        <input placeholder="Nhập địa chỉ chi tiết..." id="address" type="text" class="form-control" name="address" value="{{ old('birth') }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-wrapper">
                                                        <label for="">Nội dung <span class="request_star">*</span></label>
                                                        <textarea style="height: 100px;" placeholder="Bạn cảm thấy trong người?..." name="reason" id="reason" class="form-control"  rows="8" cols="50"></textarea>
                                                    </div>
                                                </div>
                                                <div class="pt-3 mb-3">
                                                    <button type="button" onclick="JS_AppointmentAtHome.add()" class=" btn-primary" id="btn_register" style="background-color: slategrey">
                                                        {{ __('Đặt lịch') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Banner Hero -->
                </div>
            </div>
        <!-- </div> -->
    </div>
<div class="modal fade" id="editmodal" role="dialog"></div>
<div class="modal " id="addfile" role="dialog"></div>
<div class="modal " id="show" role="dialog"></div>

<div id="dialogconfirm"></div>
    <!-- End Service -->
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_AppointmentAtHome.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    NclLib.menuActive('.link-infusion');
    var baseUrl = "{{ url('') }}";
    var JS_AppointmentAtHome = new JS_AppointmentAtHome(baseUrl, 'client', 'appointmentathome');
    $(document).ready(function($) {
        JS_AppointmentAtHome.loadIndex(baseUrl);
    })
</script>
@endsection