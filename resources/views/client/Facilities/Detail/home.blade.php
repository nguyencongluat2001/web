@extends('client.layouts.index')
@section('body-client')
    <!-- Start Banner Hero -->
    <div class="banner-wrapper bg-light" >
        <div id="index_banner_detail" class="banner-vertical-center-index">
            <!-- Start slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner active pt-5" >
                     <div class="list-hispital-home-one pt-5">
                        <section class="banner-bg">
                                <center>
                                    <span class="text-title-home anime-title" style=" padding-top: 20px;"> ĐẶT LỊCH KHÁM NHANH</span> <br>
                                    <div class="text-title-home anime-title"> 
                                        <span  class="text-title-home anime-title-span">TẠI CÁC TUYẾN TRUNG ƯƠNG</span>
                                    </div>
                                </center>
                            <!-- <span  class="text-title-home "><center> ĐẶT LỊCH KHÁM NHANH <br>TẠI CÁC TUYẾN TRUNG ƯƠNG</center></span> -->
                        </section>
                     </div>
                    <!-- End Contact -->
                    <div class="carousel-item active list-hispital-home pt-5" >
                        <div class=" row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left ">
                                <div class="row g-lg-5 mb-4">
                                    <div class="banner-wrapper w-100 py-5" style="background:#11334445">
                                        <div class="card-header pb-0 px-3">
                                            <div class="">
                                                <ul class="list-group">
                                                    <div  class="col-sm-6 col-lg-12 text-decoration-none">
                                                        <div class="pb-3 d-lg-flex gx-5">
                                                            <div class="col-lg-4 ">
                                                                <img class="card-img-top" src="{{url('/file-image-client/avatar-hospital/')}}/{{ !empty($datas->avatar)?$datas->avatar:'' }}" style="height: 150px;object-fit: cover;" alt="...">
                                                            </div>
                                                            <div class="col-lg-1 "></div>
                                                            <div class="col-lg-7 ">
                                                                <h5 style="color:#ffd877;font-size: 40px;font-family: serif;font-weight: 600;">{{ !empty($datas->name_hospital)?$datas->name_hospital:'' }}</h5>
                                                                <span style="color:#11222a;font-size:20px">{{!empty($datas->address)?$datas->address:'' }}</span> <br> <br>
                                                                <a href="{{url('/schedule')}}/{{$datas->code}}"  class="btn rounded-pill btn-success text-light px-4 light-300">Đặt lịch khám</a>
                                                             
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
    <!-- Start Service -->
<section class="service-wrapper py-3">
    <div class="service-tag py-5 popular-specialties">
        <!-- <div class="col-md-12">
            <h2 class="h2 text-center col-12 py-2">Bác sĩ nổi bật</h2>
        </div> -->
        <div class="pt-2 py-5 pb-3 d-lg-flex align-items-center gx-5" style="padding:10%">
            <div class="col-lg-12 row align-items-center">
               @foreach ($SystemClinics as $key => $data)
                <div class="team-member col-md-12 d-lg-flex mt-3 pb-3" style="background: white;">
                    <div class="col-md-3">
                        <center>
                        <img style="width:200px;height:200px;object-fit: cover;" class="team-member-img img-fluid rounded-circle p-4" src="{{url('/file-image-client/avatar-hospital/')}}/{{ !empty($data['image'])?$data['image']:'' }}" alt="Card image">
                        </center>
                    </div>
                    <div class="col-md-8">
                        <ul class="team-member-caption list-unstyled pt-4" style="padding:15px">
                            <li class="name_cg" style="font-size: 20px;font-weight: 700;color: #ff9f00;">{{$data['name']}}</li>
                            <li>Chuyên khoa: <span style="color:#38526f">{{$data['specialtys']}}</span></li>
                            <li>Thời gian khám: <span style="color:#38526f">{{$data['time']}}</span></li>
                            <li>Giá khám: <span style="color: #0090ff;font-weight: 600;">{{ !empty($data['money']) ? number_format($data['money'],0, '', ',') : '' }}</span> VND</li>
                            <li>Thông tin: <span style="color:#38526f">{{$data['profile']}}</span></li>
                        </ul>
                        <!-- <span style="background:#90a9cd;font-weight: 600;" class="btn btn-outline-light rounded-pill">Đặt lịch khám</span> -->
                        <center>
                        <a style="background:#90a9cd;font-weight: 600;" href="{{url('/scheduleStage')}}/{{$datas->code}}/{{$data['code']}}"  class="btn rounded-pill btn-success text-light px-4 light-300">Đặt lịch khám</a>

                        </center>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Start chart -->
    <div class="banner-vertical-center-work container d-flex justify-content-center align-items-center">
        <div class="banner-content col-lg-10 col-10 m-lg-auto text-left">
            <div style="color:#264451" class="light-300">
                    {!! $datas->decision !!} 
            </div>
        </div>
    </div>
    <!-- End Service -->
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_Facilities.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_Facilities = new JS_Facilities(baseUrl, 'client', 'facilities');
    $(document).ready(function($) {
        JS_Facilities.loadIndex(baseUrl);
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