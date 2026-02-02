@php
use Carbon\Carbon;
@endphp

@extends('client.layouts.index')
@section('body-client')
<title>HƯỚNG DẪN ĐẦU TƯ A-Z</title>
<!-- tra cứu cổ phiếu -->
<style>
    .tab1 {
        max-height: 800px;
        overflow-y: scroll;
        text-align: justify;
        padding: 10px;
    }

    .tab1::-webkit-scrollbar {
        width: 1px;
    }

    .tab1::-webkit-scrollbar-thumb {
        background: #731b1bde;
        border-radius: 0.2rem;
    }

    .tab1 iframe {
        width: 100%;
    }

    .row {
        /* flex-wrap: unset; */
    }

    .tab2 {
        padding: 10px 10px 10px 0;
        text-align: justify;
    }

    .tab2 h5 {
        text-transform: uppercase;
    }

    .service-tag {
        font-size: 20px;
    }

    .showHideAll {
        padding: 1rem;
    }

    .showHideAll .showAll,
    .showHideAll .hideAll {
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #77837a;
        padding: 5px 1rem;
        color: #fff;
        cursor: pointer;
    }

    a {
        cursor: pointer;
    }

    .treeview-animated-items #title {
        color: #000 !important;
        text-decoration: none;
    }

    .blogReader {
        max-height: 100px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }

    @media (max-width: 450px) {
        .service-wrapper {
            padding-top: 1rem !important;
        }

        h2 {
            font-size: 30px;
        }

        .treeview-animated {
            margin-top: 0 !important;
            margin-right: 0 !important;
            margin-left: 0 !important;
        }

        .showHideAll {
            padding: 1rem;
        }

        .showHideAll .showAll,
        .showHideAll .hideAll {
            width: 100%;
            display: block;
        }
    }



    .list-unstyled {
        padding-left: 0;
        list-style: none;
    }

    ul.components {
        padding: 0;
    }

    .collapse:not(.show) {
        display: none;
    }

    .list-unstyled .dropdown-toggle::after {
        display: none;
    }

    .submenu-child {
        background-color: #fff;
        margin-bottom: 1rem;
        padding-bottom: 5px;
    }
</style>
<div class="banner-wrapper">
    <section class="container">
        <div class="card" style="background-color: #b56c6cb5;">
            <div class="row home_index_child">
                <div class="col-md-9">
                    <div class="tab1" style="background: white">
                        @if(isset($blogs))
                        @foreach($blogs as $blog)
                        @php
                        Carbon::setLocale('vi');$now = Carbon::now();
                        $created_at = Carbon::create($blog->created_at);
                        @endphp
                        <div class="col-sm-6 col-lg-12 text-decoration-none {{ $blog->code_category }}">
                            <div class="pb-3 d-lg-flex gx-5">
                                <!-- display: flex;align-items: center;justify-content: center; -->
                                <div class="col-lg-3 " style="align-items: right;justify-content: right;position: relative;">
                                    <a href="javascript:;" onclick="reader('{{ $blog->id }}')">
                                        @if((isset($blog['type_blog']) && $blog['type_blog'] == 'VIP'))
                                        <h1 style="position: absolute;right:0">
                                            <img src="{{url('/clients/img/vip.png')}}" alt="Image" style="height: 60px;width: 50px;object-fit: cover;">
                                        </h1>
                                        @endif
                                        <img class="card-img-top" src="{{url('/file-image-client/blogs/')}}/{{ !empty($blog->imageBlog[0]->name_image)?$blog->imageBlog[0]->name_image:'' }}" style="height: 170px;width: 100%;object-fit: cover;" alt="...">
                                    </a>
                                </div>
                                <div style="width:20px"></div>
                                <div class="col-lg-7">
                                    <!-- <div class="card-body"> -->
                                    <a href="javascript:;" onclick="reader('{{ $blog->id }}')">
                                        <h5 class="card-title light-600 text-dark">{{ $blog->detailBlog->title }}</h5>
                                    </a>
                                    <i>{{$created_at->diffForHumans($now)}} ({{!empty($created_at) ? date('H:i', strtotime($created_at)) : ''}}  {{!empty($created_at) ? date('d/m/Y', strtotime($created_at)) : ''}})</i>
                                    <p class="light-300">
                                    <div class="blogReader">{!! $blog->detailBlog->decision !!}</div>
                                    </p>
                                    <a href="javascript:;" onclick="reader('{{ $blog->id }}')">
                                        <span class="text-decoration-none light-300 btn rounded-pill" style="background: #32870b;color: #ffffff;">
                                            Xem chi tiết
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-bottom: 1rem;">
                        @endforeach
                        @endif
                    </div>
                    <div class="reader"></div>
                </div>
                <div class="col-md-3">
                    <div class="container ps-0 pe-0">
                        <div class="treeview-animated w-20 border">
                            <ul class="list-unstyled components m-3">
                                @if(isset($datas) && count($datas) > 0)
                                @foreach($datas as $key => $data)
                                @php $id = $data['id']; @endphp
                                <li class="active">
                                    <a href="javascript:;" type="button" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle btn btn-light mb-2 d-flex align-items-baseline" style="width: 100%;outline: none;box-shadow: none;white-space: unset;text-align: justify;" onclick="list('{{$id}}')">
                                        <i class="fas fa-book"></i>
                                        <p class="ms-2 mb-0">{{ $data->name_category }}</p>
                                    </a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_System_Security.js') }}"></script>
<!-- <script src="{{ URL::asset('assets/js/treelist.js') }}"></script> -->
<script src="{{ URL::asset('assets/js/popper.js') }}"></script>
<script src="{{ URL::asset('clients/js/bootstrap.min.js') }}"></script>
<script>
    $(".showAll").click(function() {
        $(".list-unstyled").addClass('show');
        $(".fas.fa-book").addClass('fa-book-open');
    })
    $(".hideAll").click(function() {
        $(".list-unstyled").removeClass('show');
        $(".fas.fa-book").removeClass('fa-book-open');
    })

    var baseUrl = "{{url('')}}";

    function list(id) {
        $.ajax({
            url: baseUrl + '/client/des/list',
            type: "GET",
            data: {
                id: id
            },
            dataType: 'JSON',
            success: function(arrResult) {
                $(".tab1").html(arrResult['content']);
                $(".tab1").show();
                $(".reader").hide();
            }
        });
    }
    function reader(id) {
        $.ajax({
            url: baseUrl + '/client/des/reader',
            type: "GET",
            data: {
                id: id
            },
            success: function(arrResult) {
                $(".reader").html(arrResult);
                $(".reader").show();
                $(".tab1").hide();
            }
        });
    }
</script>
<script type="text/javascript">
    NclLib.menuActive('.link-des');
    // var JS_System_Security = new JS_System_Security();
    //     $(document).ready(function($) {
    //         JS_System_Security.security();
    //     })
    NclLib.loadding();
</script>
<script>
    function toggleIcon(_this) {
        $(_this).find('i').toggleClass('fa-book-open', 'fa-book')
    }
</script>
@endsection