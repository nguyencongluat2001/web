@php
use Carbon\Carbon;
@endphp
<title>{{ $datas['blogDetail']->title }}</title>

<style>
    #content-reader iframe  {
        width: 100% !important;
    }
    #content-reader img{
        width:100% !important;
    }
    @media (max-width: 768px){
        .content-reader img {
            width: 100%;
        }
        #carouselExampleIndicators .list-hispital-home .d-lg-flex{
            padding: 10px;
        }
        #carouselExampleIndicators .list-hispital-home .d-lg-flex img{
            padding-right: 0 !important;
        }
        .list-group .col-sm-6{
            width: 100%;
        }
    }
    @media (max-width: 991px){
        .list-group .col-sm-6{
            width: 100%;
        }
        #carouselExampleIndicators .banner-content.col-md-8{
            width: 100% !important;
        }
    }
</style>
<div class="banner-wrapper">
    @php Carbon::setLocale('vi');$now = Carbon::now(); $created_at = Carbon::create($datas['blogDetail']->created_at) @endphp

    <div class="container banner-wrapper" style="background: white;">
        <div id="index_banner_detail" class="banner-vertical-center-index">
            <!-- Start slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner active" >
                    <!-- End Contact -->
                    <div class="carousel-item active list-hispital-home" >
                        <div class=" row d-flex align-items-center">
                            <div class="banner-content col-lg-12 col-md-8 m-lg-auto text-left ">
                                <div class="row g-lg-5 mb-4">
                                    <div class="banner-wrapper w-100" style="background: #ffffff;">
                                    <div align="right">
                                        <a href="javascript:;" onclick="reply()">
                                             <i style="font-size: 25px;padding: 10px;color:#2f2f2f" class="fas fa-reply"></i>
                                        </a>
                                    </div>
                                        <div class="card-header pb-0 p-0 pt-3">
                                            <div class="">
                                                <ul class="list-group">
                                                    <div  class="col-sm-6 col-lg-12 text-decoration-none">
                                                        <div class="pb-3 d-lg-flex gx-5 col-md-11" style="margin: auto;">
                                                            <div class="col-lg-3 ">
                                                            @if((isset($datas['type_blog']) && $datas['type_blog'] == 'VIP'))
                                                                <h1 style="position: absolute;">
                                                                    <img  src="{{url('/clients/img/vip.png')}}" alt="Image" style="height: 50px;width: 32px;object-fit: cover;">
                                                                </h1>
                                                                @endif
                                                                <img class="card-img-top" src="{{url('/file-image-client/blogs/')}}/{{ !empty($datas['blogImage']->name_image)?$datas['blogImage']->name_image:'' }}" style="height: 200px;object-fit: cover;padding-right:10px" alt="...">
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <h5 style="padding-top:10px;color:#000951;font-size: 30px;font-family: serif;font-weight: 600;">{{ $datas['blogDetail']->title }}</h5>
                                                                <p style="color: #006849;">Thời gian: {{$created_at->diffForHumans($now)}} ({{!empty($created_at) ? date('H:i', strtotime($created_at)) : ''}}  {{!empty($created_at) ? date('d/m/Y', strtotime($created_at)) : ''}})</p>
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
        <div class="banner-vertical-center-work d-flex justify-content-center align-items-center" >
        <div class="banner-content col-lg-11 col-11 m-lg-auto text-left content-reader" id="content-reader">
            <div style="color:#264451; width: 100%;" class="light-300 text-justify">
               {!! $datas['blogDetail']->decision !!}
            </div>
        </div>
    </div>
    </div>
    <!-- End Service -->
</div>
<script>
    function reply(){
        $(".tab1").show();
        $(".reader").html('');
        $(".reader").hide();
    }
</script>