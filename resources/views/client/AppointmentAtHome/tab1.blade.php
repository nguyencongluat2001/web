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
        <div id="index_banner_detail" class="banner-vertical-center-index">
            <!-- Start slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner active pt-5" >
                     <div class="list-hispital-home-one pt-5">
                        <section class="banner-bg">
                            <span  class="text-title-home "><center>XÉT NGHIỆM TẠI NHÀ</center></span>
                        </section>
                     </div>
                    <!-- End Contact -->
                    <div class="carousel-item active list-hispital-home" >
                        <div class=" row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left ">
                                <div class="row g-lg-5 mb-4">
                                    <div class="banner-wrapper w-100 pt-5" style="background:#ffffffcf">
                                        <div class="pb-0 px-3">
                                            <div class="">
                                                <ul class="list-group">
                                                    <div  class="col-sm-6 col-lg-12 text-decoration-none">
                                                        <div class="pb-3 d-lg-flex gx-5">
                                                            <div class="col-lg-12">
                                                                <h5 style="color:#6c0000;font-size: 25px;font-family: serif;font-weight: 600;">{{$datas[0]['name']}}</h5>
                                                                <span style="font-size:20px;padding-left:15px"><i style="color:#3cb9ff" class="fas fa-map-marker-alt"></i> Hà Nội</span>
                                                                <span style="font-size:20px;padding-left:15px"><i style="color:#3cb9ff" class="fas fa-dollar-sign"></i> Giá gói: {{$total}} ₫</span> <br> <br>
                                                                <div class="text-center">
                                                                    <a href="{{url('/appointmentathome/')}}/{{$datas[0]['code']}}"  class="btn rounded-pill btn-success text-light px-4 light-300">Đặt lịch</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
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
    <div class="banner-vertical-center-work container d-flex justify-content-center align-items-center">
        <div class="banner-content col-lg-10 col-10 m-lg-auto text-left">
            <div style="color:#264451" class="light-300">
            <div class="carousel-item active">
                    <div class=" row d-flex ">
                        <div class="banner-content col-lg-12 col-12 m-lg-auto text-left ">
                                <!-- Start Contact -->
                                <section class="container" style="background: #ffffffc4;">
                                    <div class="row pb-4">
                                        <div class="col-lg-4" style="padding: 20px;background: #080a21;color: white;border-radius: 2%;">
                                            <div class="contact row mb-4" >
                                                <div class="contact-icon col-lg-3 col-3">
                                                    <div class="mb-2 text-center border rounded text-secondary">
                                                        <i style="color:#ffba29"class="fas fa-teeth"></i>
                                                    </div>
                                                </div>
                                                <ul class="contact-info list-unstyled col-lg-9 col-9  light-300">
                                                    <li class="h5 mb-0">Hình thức thực hiện</li>
                                                    <li style="color: #8ae9ff !important;font-size: 14px;font-family: serif;" class="text-muted">{{$datas[0]['form']}}</li>
                                                </ul>
                                            </div>
                                            <div class="contact row mb-4">
                                                <div class="contact-icon col-lg-3 col-3">
                                                    <div class="border mb-2 text-center border rounded text-secondary">
                                                        <!-- <i class='bx bx-laptop display-6' ></i> -->
                                                        <i style="color:#ffba29"class="fab fa-superpowers"></i>
                                                    </div>
                                                </div>
                                                <ul class="contact-info list-unstyled col-lg-9 col-9 light-300">
                                                    <li class="h5 mb-0">Giới tính</li>
                                                    <li style="color: #8ae9ff !important;font-size: 14px;font-family: serif;" class="text-muted">{{isset($datas[0]['sex']) ? 'Nam':'Nữ'}}</li>
                                                </ul>
                                            </div>
                                            <div class="contact row mb-4">
                                                <div class="contact-icon col-lg-3 col-3">
                                                    <div class="border mb-2 text-center border rounded text-secondary">
                                                        <!-- <i class='bx bx-money display-6'></i> -->
                                                        <i style="color:#ffba29"class="fas fa-universal-access"></i>
                                                    </div>
                                                </div>
                                                <ul class="contact-info list-unstyled col-lg-9 col-9 light-300">
                                                    <li class="h5 mb-0">Độ tuổi</li>
                                                    <li style="color: #8ae9ff !important;font-size: 14px;font-family: serif;" class="text-muted">{{$datas[0]['age']}}</li>
                                                </ul>
                                            </div>
                                            <div class="contact row mb-4">
                                                <div class="contact-icon col-lg-3 col-3">
                                                    <div class="border mb-2 text-center border rounded text-secondary">
                                                        <i style="color:#ffba29"class="fas fas fa-university"></i>
                                                    </div>
                                                </div>
                                                <ul class="contact-info list-unstyled col-lg-9 col-9 light-300">
                                                    <li class="h5 mb-0">Tỉnh thành</li>
                                                    <li style="color: #8ae9ff !important;font-size: 14px;font-family: serif;" class="text-muted">Hà Nội</li>
                                                </ul>
                                            </div>
                                            <div class="contact row mb-4">
                                                <div class="contact-icon col-lg-3 col-3">
                                                    <div class="border mb-2 text-center border rounded text-secondary">
                                                        <i style="color:#ffba29"class="fas fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                                <ul class="contact-info list-unstyled col-lg-9 col-9 light-300">
                                                    <li class="h5 mb-0">Tời gian áp dụng</li>
                                                    <li style="color: #8ae9ff !important;font-size: 14px;font-family: serif;" class="text-muted">{{$datas[0]['date_created']}} đến {{$datas[0]['date_end']}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Start Contact Form -->
                                        <div class="col-lg-8 " style="background: #8ebdad0d;border-radius: 2%;">
                                        {!! $datas[0]['decision'] !!} 
                                        </div>
                                        <!-- End Contact Form -->
                                    </div>
                                </section>
                                <!-- End Contact -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-vertical-center-work container d-flex justify-content-center align-items-center">
        <div class="banner-content col-lg-10 col-10 m-lg-auto text-left">
            <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
                <thead>
                    <tr style="background: #ffa71e;">
                        <td align="center"><input type="checkbox" name="chk_all_item_id"
                                onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                        <td align="center"><b>STT</b></td>
                        <td align="center"><b>Tên xét nghiệm</b></td>
                        <td align="center"><b>Giá chỉ số xét nghiệm</b></td>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($arr_price as $key => $data)
                        <tr>
                            <td style="padding-top: 20px;vertical-align: middle;"align="center"><input type="checkbox" name="chk_item_id"
                                    value="{{ $data['id'] }}"></td>
                            <td style="padding-top: 20px;vertical-align: middle;"align="center">{{ $key + 1 }}
                            <td style="padding-top: 20px;white-space: inherit;vertical-align: middle;" ondblclick="" onclick="{select_row(this);}">
                            {{$data['name']}}
                            </td>
                            <td align="center" style="padding-top: 20px;white-space: inherit;vertical-align: middle;" ondblclick="" onclick="{select_row(this);}">
                            {{$data['price']}} VND
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Service -->
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_AppointmentAtHome.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_AppointmentAtHome = new JS_AppointmentAtHome(baseUrl, 'client', 'appointmentathome');
    $(document).ready(function($) {
        JS_AppointmentAtHome.loadIndex(baseUrl);
    })
</script>
@endsection