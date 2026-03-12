@extends('client.layouts.index')
@section('body-client')
<link rel="stylesheet" href="{{URL::asset('assets/datepicker/bootstrap-datepicker.min.css')}}">
<script type="text/javascript" src="{{ URL::asset('assets/datepicker/bootstrap-datepicker.min.js') }}"></script>
<link href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"rel="stylesheet"/>
<link href="style.css" rel="stylesheet" />
<style>
     #map {
        height: 100%;
        width: 100%;
    }
    #frmSendSchedule{
        width: 100%;
    }
    #carouselExampleIndicators input[type=text], input[type=email], input[type=password], input[type=date] {
        padding: 12px 40px;
        display: inline-block;
        border: 1px solid #ccc;
    }
    #carouselExampleIndicators textarea{
        padding: 5px 40px;
        display: inline-block;
        border: 1px solid #ccc;
    }

    /* Set a style for the buttons*/
    #carouselExampleIndicators button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    /* Set a hover effect for the button*/
    #carouselExampleIndicators button:hover {
        opacity: 0.8;
    }

    /* Set extra style for the cancel button*/
    #carouselExampleIndicators .container {
        padding: 16px;
    }

    #carouselExampleIndicators .form-input {
        position: relative;
    }

    #carouselExampleIndicators .form-input i {
        position: absolute;
        left: 24px;
        top: 12px;
        color: gray;
    }
    .message-error{
        display: none;
        color: red;
    }
    .error-input{
        border: 1px solid red;
    }
    .error-icon{
        color: red !important;
    }
    .error-input::placeholder{
        color: red;
    }
    .padding-style{
        padding-top:15px
    }

</style>
<link rel="stylesheet" href="../clients/css/style.css">
<!-- Start Banner Hero -->
<div class="banner-wrapper bg-light">
    <div id="index_banner" class="banner-vertical-center-index">
        <!-- Start slider -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner active pt-5">
                <div class="carousel-item active list-hispital-home">
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
                                                            <img class="card-img-top" src="{{url('/file-image-client/avatar-hospital/')}}/{{ !empty($datas->avatar)?$datas->avatar:'' }}" style="object-fit: cover;height:150px" alt="...">
                                                        </div>
                                                        <div class="col-lg-1 "></div>
                                                        <div class="col-lg-8 ">
                                                            <span class="text-title-home" style="color:#ff9300">
                                                                <center> ĐẶT LỊCH KHÁM TẠI</center>
                                                            </span>
                                                            <center>
                                                                <h5 style="font-size: 40px;font-family: serif;font-weight: 600; animation: lights 4s 750ms linear infinite;">{{ !empty($datas->name_hospital)?$datas->name_hospital:'' }}</h5>
                                                            </center>
                                                            <span style="color: #bad1ff;font-size: 20px;">
                                                                <center>{{ !empty($datas->address)?$datas->address:'' }}</center>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" pb-0 px-3">
                                        <span class="text-title-home" style="color:#226c28c9">
                                            <center> Thông tin đăng ký</center>
                                        </span>

                                        <div class="wrapper" style="display: flex; justify-content: center;">
                                            <form id="frmSendSchedule" method="POST" autocomplete="off">
                                                @csrf
                                                <input type="hidden" id="code_hospital" name="code_hospital" value="{{ !empty($datas->code)?$datas->code:'' }}">
                                                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                                                @if(!empty($physician) && $physician != '')
                                                   <!-- <div class="row padding-style">
                                                        <div class="form-input col-md-6">
                                                            <select onchange="JS_Schedule.getMoney(this.value)" class="form-control input-sm chzn-select" name="code_specialty" id="code_specialty">
                                                                <option value="">--Chọn khoa khám bệnh--</option>
                                                                @foreach($khoa as $key => $values)
                                                                <option value="{{$values['code']}}" {{($values['status'] == '2') ? 'selected' : ''}}>{{$values['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-input col-md-6" id="moneys">
                                                            <span>Số tiền khám: <span>
                                                            <input style="font-size: 25px;font-weight: 500;color: #ff9400;" type="hidden" id="money" class="form-control" name="money" value="{{!empty($money)?$money:'' }}">
                                                            <span><span style="font-size: 25px;font-weight: 500;color: #ff9400;">{{!empty($moneyConvert)?$moneyConvert:'' }}</span> VND</span>
                                                        </div>
                                                    </div> -->
                                                    <div class="team-member col-md-12 d-lg-flex mt-3 pb-3" style="background: white;">
                                                        <div class="col-md-3">
                                                            <center>
                                                            <img style="width:200px;height:200px;object-fit: cover;" class="team-member-img img-fluid rounded-circle p-4" src="{{url('/file-image-client/avatar-hospital/')}}/{{ !empty($physician['image'])?$physician['image']:'' }}" alt="Card image">
                                                            </center>
                                                        </div>
                                                        <div class="col-md-8" style="padding: 15px;">
                                                            <ul class="team-member-caption list-unstyled pt-4">
                                                                <li class="name_cg" style="font-size: 20px;font-weight: 700;color: #ff9f00;">{{$physician['name']}}</li>
                                                                <li>Chuyên khoa: <span style="color:#38526f">{{$physician['specialtys']}}</span></li>
                                                                <li>Thời gian khám: <span style="color:#38526f">{{$physician['time']}}</span></li>
                                                                <li>Giá khám: <span style="color: #0090ff;font-weight: 600;">{{ !empty($physician['money']) ? number_format($physician['money'],0, '', ',') : '' }}</span> VND</li>
                                                                <li>Thông tin: <span style="color:#38526f">{{$physician['profile']}}</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="money" class="form-control" name="money" value="{{!empty($physician['money'])?$physician['money']:'' }}">
                                                    <input type="hidden" id="code_physician" class="form-control" name="code_physician" value="{{!empty($physician['code'])?$physician['code']:'' }}">
                                                    <input type="hidden" id="code_specialty" class="form-control" name="code_specialty" value="{{!empty($physician['specialtys'])?$physician['specialtys']:'' }}">
                                                @else
                                                    <div class="row padding-style">
                                                        <div class="form-input col-md-6">
                                                            <select onchange="JS_Schedule.getMoney(this.value)" class="form-control input-sm chzn-select" name="code_specialty" id="code_specialty">
                                                                <option value="">--Chọn khoa khám bệnh--</option>
                                                                @foreach($khoa as $key => $values)
                                                                <option value="{{$values['code']}}" {{($values['status'] == '2') ? 'selected' : ''}}>{{$values['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-input col-md-6" id="moneys">
                                                            <span>Số tiền khám: <span>
                                                            <input style="font-size: 25px;font-weight: 500;color: #ff9400;" type="hidden" id="money" class="form-control" name="money" value="{{!empty($money)?$money:'' }}">
                                                            <span><span style="font-size: 25px;font-weight: 500;color: #ff9400;">{{!empty($moneyConvert)?$moneyConvert:'' }}</span> VND</span>
                                                        </div>
                                                    </div>
                                                @endif
                                                <!-- <div class="row padding-style">
                                                    <div class="form-input col-md-6">
                                                        <select onchange="JS_Schedule.getMoney(this.value)" class="form-control input-sm chzn-select" name="code_specialty" id="code_specialty">
                                                            <option value="">--Chọn khoa khám bệnh--</option>
                                                            @foreach($khoa as $key => $values)
                                                            <option value="{{$values['code']}}" {{($values['status'] == '2') ? 'selected' : ''}}>{{$values['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-input col-md-6" id="moneys">
                                                        <span>Số tiền khám: <span>
                                                        <input style="font-size: 25px;font-weight: 500;color: #ff9400;" type="hidden" id="money" class="form-control" name="money" value="{{!empty($money)?$money:'' }}">
                                                        <span><span style="font-size: 25px;font-weight: 500;color: #ff9400;">{{!empty($moneyConvert)?$moneyConvert:'' }}</span> VND</span>
                                                    </div>
                                                </div> -->
                                                <div class="row mt-3 ">
                                                    <div class="form-input col-md-6 padding-style">
                                                        <input type="text" class="form-control required" placeholder="Họ và tên bệnh nhân..." name="name" id="name" oninput="inValid(this.id)">
                                                        <i class="fa fa-user name-icon padding-style"></i>
                                                        <span class="message-error name-error">Họ và tên bệnh nhân không được để trống!</span>
                                                    </div>
                                                    <div class="form-input col-md-6 padding-style">
                                                        <input type="text" class="form-control required" placeholder="Số điện thoại..." name="phone" id="phone" oninput="inValid(this.id)">
                                                        <i class="fas fa-phone phone-icon padding-style"></i>
                                                        <span class="message-error phone-error">Số điện thoại không được để trống!</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="form-input col-md-6 padding-style">
                                                        <input type="text" class="form-control" placeholder="Số bảo hiểm y tế..." name="code_insurance" id="code_insurance" oninput="inValid(this.id)">
                                                        <!-- <i class="fas fa-book-medical code_insurance-icon padding-style"></i> -->
                                                        <!-- <span class="message-error code_insurance-error">Số bảo hiểm y tế không được để trống!</span> -->
                                                    </div>
                                                    <div class="form-wrapper col-md-6 padding-style">
                                                        <input type="radio" value="1" name="sex" id="sex" /> <span style="padding-left:5px">Nam</span>&emsp;
                                                        <input type="radio" value="2" name="sex" id="sex" /> <span style="padding-left:5px">Nữ</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="form-input col-md-6 padding-style">
                                                        <input type="email" class="form-control" placeholder="Địa chỉ Email..." name="email" id="email"  oninput="inValid(this.id)">
                                                        <i class="fas fa-envelope padding-style"></i>
                                                    </div>
                                                    <div class="form-input col-md-6 padding-style">
                                                        <input type="text" class="form-control required datepicker" placeholder="Năm sinh..." name="date_of_brith" id="date_of_brith"  oninput="inValid(this.id)">
                                                        <i class="fa fa-calendar-alt date_of_brith-icon padding-style"></i>
                                                        <span class="message-error date_of_brith-error">Năm sinh không được để trống!</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="form-input col-md-4 padding-style">
                                                        <select onchange="JS_Schedule.getHuyen(this.value)" class="form-control input-sm chzn-select" name="code_tinh" id="code_tinh">
                                                            <option value="">--Chọn tỉnh thành--</option>
                                                            @foreach($tinh as $key => $value)
                                                            <option value="{{$value->code_tinh}}">{{$value->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div id="iss" class="form-input col-md-4 padding-style">
                                                        <select class="form-control input-sm chzn-select" name="code_huyen" id="code_huyen">
                                                            <option value="">--Chọn quận huyện--</option>
                                                        </select>
                                                    </div>
                                                    <div id="iss_xa" class="form-input col-md-4 padding-style">
                                                        <select class="form-control input-sm chzn-select" name="code_xa" id="code_xa">
                                                            <option value="">--Chọn phường xã--</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="form-input col-md-12 padding-style">
                                                        <textarea style="height:80px" class="form-control required" placeholder="Địa chỉ chi tiết ..." name="address" id="address" oninput="inValid(this.id)"rows="4" cols="50"></textarea>
                                                        <i class="fas fa-map-marker-alt address-icon padding-style"></i>
                                                        <span class="message-error address-error">Địa chỉ chi tiết không được để trống!</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="form-input col-md-6 padding-style">
                                                    <!-- onfocus="(this.type='date')"
                                                            onblur="(this.type='text')" -->
                                                        <label for="">Ngày khám</label>
                                                        <input type="date" class="form-control required" placeholder="Ngày khám..." name="date_sampling" id="date_sampling" oninput="inValid(this.id)">
                                                        <!-- <i class="fa fa-calendar-alt uname-icon padding-style"></i> -->
                                                        <span class="message-error uname-error">Ngày khám không được để trống!</span>
                                                    </div>
                                                    <div class="form-input col-md-6 padding-style">
                                                        <label for="">Giờ khám mong muốn</label>
                                                        <select style="color:#757e87" class="form-control input-sm chzn-select required" name="hour_sampling" id="hour_sampling">
                                                            <option  value=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chọn giờ khám  </option>
                                                            <!-- <option value="05h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;05 giờ 30 phút</option>
                                                            <option value="06h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;06 giờ 00 phút</option>
                                                            <option value="06h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;06 giờ 30 phút</option>
                                                            <option value="07h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;07 giờ 00 phút</option>
                                                            <option value="07h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;07 giờ 30 phút</option> -->
                                                            <option value="08h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;08 giờ 00 phút</option>
                                                            <option value="08h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;08 giờ 30 phút</option>
                                                            <option value="09h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;09 giờ 00 phút</option>
                                                            <option value="09h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;00 giờ 30 phút</option>
                                                            <option value="10h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10 giờ 00 phút</option>
                                                            <option value="10h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10 giờ 30 phút</option>
                                                            <option value="11h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11 giờ 00 phút</option>
                                                            <option value="11h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11 giờ 30 phút</option>
                                                            <option value="13h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;13 giờ 30 phút</option>
                                                            <option value="14h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;14 giờ 00 phút</option>
                                                            <option value="14h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;14 giờ 30 phút</option>
                                                            <option value="15h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;15 giờ 00 phút</option>
                                                            <option value="15h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;15 giờ 30 phút</option>
                                                            <option value="16h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16 giờ 00 phút (Ngoài giờ hành chính)</option>
                                                            <option value="16h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16 giờ 30 phút (Ngoài giờ hành chính)</option>
                                                            <option value="17h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17 giờ 00 phút (Ngoài giờ hành chính)</option>
                                                            <option value="17h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17 giờ 30 phút (Ngoài giờ hành chính)</option>
                                                            <option value="18h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18 giờ 00 phút (Ngoài giờ hành chính)</option>
                                                            <option value="17h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17 giờ 30 phút (Ngoài giờ hành chính)</option>
                                                            <option value="18h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18 giờ 00 phút (Ngoài giờ hành chính)</option>
                                                            <option value="18h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18 giờ 30 phút (Ngoài giờ hành chính)</option>
                                                            <option value="19h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;19 giờ 00 phút (Ngoài giờ hành chính)</option>
                                                            <option value="19h30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;19 giờ 30 phút (Ngoài giờ hành chính)</option>
                                                            <option value="20h00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20 giờ 00 phút (Ngoài giờ hành chính)</option>
                                                        </select>
                                                        <!-- <i class="fa fa-hourglass-half uname-icon padding-style"></i> -->
                                                        <span class="message-error uname-error">Giờ lấy mẫu không được để trống!</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="form-input col-md-6 padding-style">
                                                        @if(isset($user_introduce_name))
                                                        <input style="color:red" disabled onchange="JS_Schedule.getUser()" placeholder="Mã nhân viên giới thiệu..." id="code_introduce" type="text" class="form-control" name="code_introduce" value="{{isset($user_introduce_id) ? $user_introduce_id : ''}}">
                                                        @else
                                                        <input style="color:red" onchange="JS_Schedule.getUser()" placeholder="Mã nhân viên giới thiệu..." id="code_introduce" type="text" class="form-control" name="code_introduce" value="{{isset($user_introduce_id) ? $user_introduce_id : ''}}">
                                                        @endif
                                                        <i class="fas fa-id-card code_introduce-icon padding-style"></i>
                                                    </div>
                                                    <div class="form-input col-md-6 padding-style" id="iss">
                                                        <input style="color:red" id="user_introduce_name" name="user_introduce_name" disabled placeholder="Tên nhân viên giới thiệu..." type="text" class="form-control" value="{{isset($user_introduce_name) ? $user_introduce_name : ''}}">
                                                        <i class="fa fa-user-cog user_introduce_name-icon padding-style"></i>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="form-input">
                                                        <textarea name="reason" id="reason" class="form-control" rows="4" cols="50" placeholder="Lý do khám..."></textarea>
                                                        <i class="fas fa-keyboard reason-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="form-input col-md-12">
                                                       <span style="color:#ff3232">Sau khi đặt lịch , nhân viên sẽ tư vấn cụ thể cho khách hàng đặt lịch qua số điện thoại hoặc zalo!</span>
                                                    </div>
                                                </div>
                                                <div class="pt-3 mb-3">
                                                    <button type="button" onclick="JS_Schedule.add()" class=" btn-primary" id="btn_register" style="background-color: slategrey">
                                                        {{ __('Đăng ký') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <br>
                                        <center>
                                            <span style="font-size:20px;font-family: serif;">{{ !empty($datas->name_hospital)?$datas->name_hospital:'' }} trên bản đồ</span>
                                        </center>
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
<center>
    <iframe style="width:70%;height:300px" src="https://medhanoi.com/mapReport" title="W3Schools Free Online Web Tutorials"></iframe>
</center>
<br>

<div class="modal fade" id="editmodal" role="dialog"></div>
<div class="modal " id="addfile" role="dialog"></div>

<div id="dialogconfirm"></div>
<!-- End Service -->
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_Facilities.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_Schedule.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    function inValid(id){
        console.log(id);
        if($("#" + id).val() != ''){
            $('.' + id + '-error').css("display", "none");
            $('.' + id + '-icon').removeClass("error-icon");
        }
    }
    $("#frmSendSchedule div.form-input").each(function(key, value){
        $(this,'input').focusout(function(){
            if($(this).find('input').hasClass('required') && $(this).find('input').val() == ''){
                $(this).find('.message-error').css("display", "block");
                $(this).find('input').addClass('error-input');
                $(this).find('i').addClass('error-icon');
            }else if($(this).find('textarea').hasClass('required') && $(this).find('textarea').val() == ''){
                $(this).find('.message-error').css("display", "block");
                $(this).find('input').addClass('error-input');
                $(this).find('i').addClass('error-icon');
            }
        });
    });

    var baseUrl = "{{ url('') }}";
    var JS_Schedule = new JS_Schedule(baseUrl, 'client', 'schedule');
    $(document).ready(function($) {
        JS_Schedule.loadIndex(baseUrl);
    })
</script>
<!-- <script type="text/javascript" src="{{ URL::asset('dist/js/backend/pages/JS_System_Security.js') }}"></script>
<script>
      var JS_System_Security = new JS_System_Security();
          $(document).ready(function($) {
                 JS_System_Security.security();
      })
</script> -->
@endsection