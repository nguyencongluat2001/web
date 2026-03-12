@extends('client.layouts.index')
@section('body-client')
<style>
    form{
        width:80%;
    }
</style>
<link rel="stylesheet" href="../clients/css/style.css">
    <!-- Start Banner Hero -->
    <div class="banner-wrapper bg-light" >
        <div id="index_banner" class="banner-vertical-center-index">
            <!-- Start slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner active pt-5" >
                     <!-- <div class="list-hispital-home-one pt-5">
                        <section class="banner-bg">
                            <span  class="text-title-home "><center> ĐĂNG KÝ KHÁM NHANH</center></span>
                        </section>
                        
                     </div> -->
                     
                    <!-- End Contact -->
                    <div class="carousel-item active list-hispital-home" >
                        <div class=" row d-flex align-items-center">
                            <div class="banner-content col-lg-10 col-10 offset-1 m-lg-auto text-left ">
                                <div class="row g-lg-5 mb-4">
                                    <div class="banner-wrapper w-100" style="background:#ffffffba;color:black">
                                        <div class="row g-lg-5 mb-4">
                                            <div class="banner-wrapper w-100 py-3" style="background:#15283dd6">
                                                <div class="list-group wrapper pb-0 px-3">
                                                    <a class="col-sm-6 col-lg-12 text-decoration-none text-light">
                                                        <div class="d-lg-flex gx-5">
                                                            <div class="col-lg-3">
                                                                <img class="card-img-top" src="{{url('/file-image-client/avatar-hospital/')}}/{{ !empty($datas->avatar)?$datas->avatar:'' }}" style="object-fit: cover;" alt="...">
                                                            </div>
                                                            <div class="col-lg-1 "></div>
                                                            <div class="col-lg-8 ">
                                                            <span  class="text-title-home" style="color:#ff9300"><center> ĐẶT LỊCH KHÁM TẠI</center></span>
                                                            <center><h5  style="font-size: 40px;font-family: serif;font-weight: 600; animation: lights 4s 750ms linear infinite;">{{ !empty($datas->name_hospital)?$datas->name_hospital:'' }}</h5></center>                                                     
                                                            <span style="color: #bad1ff;font-size: 20px;"><center>{{ !empty($datas->address)?$datas->address:'' }}</center></span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" pb-0 px-3">
                                        <span  class="text-title-home" style="color:#226c28c9" ><center> Thông tin đăng ký</center></span>

                                        <div class="wrapper" style="display: flex; justify-content: center;">
                                            <form id="frmSendSchedule" method="POST"  autocomplete="off">
                                                @csrf
                                                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                                                <div class="row">
                                                    <div class="form-wrapper col-md-6">
                                                        <label for="">Chuyên khoa khám <span class="request_star">*</span></label>
                                                        <select class="form-control input-sm chzn-select" name="code_specialty" id="code_specialty">
                                                            <option value="">--Chọn khoa khám bệnh--</option>
                                                            @foreach($khoa as $key => $values) 
                                                                <option value="{{$values->code}}">{{$values->name_specialty}}</option>
                                                            @endforeach 
                                                        </select>
                                                    </div>
                                                    <div class="form-wrapper col-md-6">
                                                        <label for="">Số tiền khám <span class="request_star">*</span></label>
                                                        <input placeholder="Nhập số tiền..." id="money" type="text" class="form-control" name="money" value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-wrapper col-md-6">
                                                        <label for="">Họ và tên bệnh nhân <span class="request_star">*</span></label>
                                                        <input placeholder="Nhập tên..." id="c" type="text" class="form-control" name="name" value="" autofocus>
                                                    </div>
                                                    <div class="form-wrapper col-md-6">
                                                        <label for="">Số điện thoại <span class="request_star">*</span></label>
                                                        <input placeholder="Số điện thoại..." id="phone" type="phone" class="form-control" name="phone" value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- <div class="form-wrapper col-md-4">
                                                        <label for="">Số tiền khám <span class="request_star">*</span></label>
                                                        <input placeholder="Nhập số tiền..." id="money" type="text" class="form-control" name="money" value="">
                                                    </div> -->
                                                    <div class="form-wrapper col-md-6">
                                                        <label for="">Số bảo hiểm y tế</label>
                                                        <input placeholder="Nhập bảo hiểm y tế..." id="money" type="text" class="form-control" name="code_insurance" value="">
                                                    </div>
                                                    <div class="form-wrapper col-md-6">
                                                        <label for="">Giới tính <span class="request_star">*</span></label>
                                                        <input type="radio" value="1" name="sex" id="sex" />  <span style="padding-left:5px" >Nam</span>&emsp;
                                                        <input  type="radio" value="2" name="sex" id="sex"  /> <span style="padding-left:5px" >Nữ</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-wrapper col-md-6">
                                                        <label for="">Địa chỉ Email</label>
                                                        <input placeholder="Nhập email..." id="email" type="email" class="form-control" name="email" value="">
                                                    </div>
                                                    <div class="form-wrapper col-md-6">
                                                        <label for="">Ngày sinh <span class="request_star">*</span></label>
                                                        <input placeholder="Số điện thoại..." id="date_of_brith" type="date" class="form-control" name="date_of_brith" value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-wrapper col-md-4">
                                                        <label for="">Tỉnh thành <span class="request_star">*</span></label>
                                                        <select onchange="JS_Schedule.getHuyen(this.value)"  class="form-control input-sm chzn-select" name="code_tinh" id="code_tinh">
                                                            <option value="">--Chọn tỉnh thành--</option>
                                                            @foreach($tinh as $key => $value) 
                                                               <option  value="{{$value->code_tinh}}">{{$value->name}}</option>
                                                             @endforeach 
                                                        </select>
                                                    </div>
                                                    <div id="iss" class="form-wrapper col-md-4">
                                                        <label for="">Quận huyện <span class="request_star">*</span></label>
                                                        <select class="form-control input-sm chzn-select" name="code_huyen" id="code_huyen">
                                                            <option value="">--Chọn quận huyện--</option>
                                                        </select>
                                                    </div>
                                                    <div id="iss_xa" class="form-wrapper col-md-4">
                                                        <label for="">Phường xã <span class="request_star">*</span></label>
                                                        <select class="form-control input-sm chzn-select" name="code_xa" id="code_xa">
                                                            <option value="">--Chọn phường xã--</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-wrapper">
                                                        <label for="">Địa chỉ chi tiết <span class="request_star">*</span></label>
                                                        <input placeholder="Nhập địa chỉ chi tiết..." id="address" type="text" class="form-control" name="address" value="{{ old('birth') }}">
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="form-wrapper">
                                                        <label for="">Xác thực OTP SMS <span class="request_star">*</span></label>
                                                        <div class="col-md-12 " style="display:flex">
                                                            <div class="col-md-3">
                                                                <button type="button" onclick="JS_Register.getOtp()" class=" btn-primary" id="btn_register" style="background-color: #ffae17">
                                                                    {{ __('Lấy OTP SMS') }}
                                                                </button>
                                                            </div>
                                                            <div class="col-md-9" style="padding-left:15px">
                                                                <input placeholder="Nhập mã OTP..." id="otp" type="text" class="form-control" name="otp" value="{{ old('otp') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="form-group" style="display:flex">
                                                    <div class="form-wrapper col-md-6">
                                                        <label for="">Mã cộng tác viên</label>
                                                        @if(isset($data['user_introduce_name']))
                                                        <input style="color:red" disabled onchange="JS_Register.getUser()" placeholder="Mã nhân viên giới thiệu..." id="code_introduce" type="text" class="form-control" name="code_introduce" value="{{isset($data['user_introduce_id']) ? $data['user_introduce_id'] : ''}}">
                                                        @else
                                                        <input style="color:red"  onchange="JS_Register.getUser()" placeholder="Mã nhân viên giới thiệu..." id="code_introduce" type="text" class="form-control" name="code_introduce" value="{{isset($data['user_introduce_id']) ? $data['user_introduce_id'] : ''}}">
                                                        @endif
                                                    </div>
                                                    <div class="form-wrapper col-md-6" id="iss">
                                                        <label for="">Tên cộng tác viên</label>
                                                        <input style="color:red"  disabled placeholder="Tên nhân viên giới thiệu..."  type="text" class="form-control"  value="{{isset($data['user_introduce_name']) ? $data['user_introduce_name'] : ''}}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-wrapper">
                                                        <label for="">Lý do khám <span class="request_star">*</span></label>
                                                        <textarea name="reason" id="reason" class="form-control"  rows="4" cols="50"></textarea>
                                                    </div>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Tôi chấp nhận Điều khoản sử dụng và Chính sách bảo mật. <span class="request_star">*</span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="pt-3 mb-3">
                                                    <button type="button" onclick="JS_Schedule.add()" class=" btn-primary" id="btn_register" style="background-color: slategrey">
                                                        {{ __('Đăng ký') }}
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
        </div>
    </div>
<div class="modal fade" id="editmodal" role="dialog"></div>
<div class="modal " id="addfile" role="dialog"></div>

<div id="dialogconfirm"></div>
    <!-- End Service -->
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_Facilities.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_Schedule.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_Schedule = new JS_Schedule(baseUrl, 'client', 'schedule');
    $(document).ready(function($) {
        JS_Schedule.loadIndex(baseUrl);
    })
</script>
<!-- <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_System_Security.js') }}"></script>
<script>
      var JS_System_Security = new JS_System_Security();
          $(document).ready(function($) {
                 JS_System_Security.security();
      })
</script> -->
@endsection