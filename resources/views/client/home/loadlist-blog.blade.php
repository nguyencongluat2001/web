@php
use Carbon\Carbon;
@endphp
<style>
     .blogReader {
        width: 100%;
        max-height: 100px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }
</style>
<div class="row justify-content-center pb-4">
            <div class="col-lg-12">
                <div class="worksingle-slide-footer row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class='bx bxs-chevron-left bx-sm text-dark'></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                @foreach ($datas as $key => $data)
                                    @php Carbon::setLocale('vi');$now = Carbon::now(); $created_at = Carbon::create($data->created_at) @endphp
                                    <a onclick="JS_Home.blogReader('{{$data->id}}')" class="col-sm-6 col-lg-3 text-decoration-none" style="padding-bottom: 10px;">
                                        <div class="service-work overflow-hidden card m-sm-0">
                                            <img class="card-img-top" style="height: 150px;width: 300px;object-fit: cover;" src="{{url('/file-image-client/blogs/')}}/{{ !empty($data->imageBlog[0]->name_image)?$data->imageBlog[0]->name_image:'' }}" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title light-300 text-dark">{{ $data->detailBlog->title }}</h5>
                                                <span>{{(isset($data['cate_name']) ? $data['cate_name'] . ' - ' : '') . $created_at->diffForHumans($now)}}</span>
                                                <!-- <div class="card-title light-300 blogReader">
                                                {!! $data->detailBlog->decision !!}
                                                </div> -->
                                                <br>
                                                <span class="text-decoration-none text-primary light-300">
                                                    Đọc thêm <i class='bx bxs-hand-right ms-1'></i>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <!-- <div class="carousel-item">
                                <div class="row">
                                    @foreach ($datas as $key => $data)
                                        @php Carbon::setLocale('vi');$now = Carbon::now(); $created_at = Carbon::create($data->created_at) @endphp
                                        <a href="work-single.html" class="col-sm-6 col-lg-3 text-decoration-none">
                                            <div class="service-work overflow-hidden card m-sm-0">
                                                <img class="card-img-top" style="height: 150px;width: 300px;object-fit: cover;" src="{{url('/file-image-client/blogs/')}}/{{ !empty($data->imageBlog[0]->name_image)?$data->imageBlog[0]->name_image:'' }}" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title light-300 text-dark">{{ $data->detailBlog->title }}</h5>
                                                    <span>{{(isset($data['cate_name']) ? $data['cate_name'] . ' - ' : '') . $created_at->diffForHumans($now)}}</span>
                                                    <br>
                                                    <span class="text-decoration-none text-primary light-300">
                                                        Đọc thêm <i class='bx bxs-hand-right ms-1'></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div> -->

                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Start Controls-->
                    <div class="col-1 align-self-center text-end">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class='bx bxs-chevron-right bx-sm text-dark'></i>
                        </a>
                    </div>
                    <!--End Controls-->

                </div>
            </div>
        </div><!-- End Slider -->

