<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $datas->detailBlog?->title ?? '' }}</title>
    <link rel="stylesheet" href="{{ url('/clients/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('/clients/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/clients/css/detail.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../clients/img/home.jpg">

    <meta property="og:image" content="@yield('og:image', 'http://cdn0387.cdn4s.com/media/logo/logo-kite-350x.png')" />
    <meta property="og:image:secure_url" content="'@yield('og:image', 'http://cdn0387.cdn4s.com/media/logo/logo-kite-350x.png')" />

</head>

<body>
    <div class="banner-wrapper">
        <div class="banner-wrapper" style="background: white;">
            <div class="project-detail px-2">
                <div class="row">
                    <div class="col-lg-9 pr-md-60">
                        <div id="carouselExampleControls" class="carousel slide slick-slider" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @if(isset($datas->imageBlog) && !empty($datas->imageBlog))
                                @php $k = 1; @endphp
                                @foreach($datas->imageBlog as $value)
                                @if($value->type !== 'video')
                                <div class="project-detail__thumbs-number slick-slide {{ $k == 1 ? 'active' : '' }}" data-bs-target="#carouselExampleControls" data-bs-slide-to="{{ $k }}" aria-current="true">{{ $k }}</div>
                                @php $k++; @endphp
                                @endif
                                @endforeach
                                @endif
                            </div>
                            <div class="carousel-inner project-detail__image">
                                @if(isset($datas->imageBlog) && !empty($datas->imageBlog))
                                @php $i = 1; @endphp
                                @foreach($datas->imageBlog as $value)
                                @if($value->type !== 'video')
                                <div class="project-detail__image-item carousel-item {{ $i == 1 ? 'active' : '' }}">
                                    <img src="{{url('/file-image-client/blogs/')}}/{{ $value->name_image ?? '' }}" class="d-block w-100 img-fluid" alt="...">
                                </div>
                                @php $i++; @endphp
                                @endif
                                @endforeach
                                @endif
                            </div>
                            <button class="carousel-control-prev slick-prev slick-arrow" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next slick-next slick-arrow" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-3 project-content">
                        <div class="back mb-2">
                            <button onclick="window.history.back()"><i class="fas fa-chevron-left fs-13 pe-2"></i> Back</button>
                        </div>
                        <div class="project-detail__thumbs">
                            <div class="project-video" loaded="1">
                                @if(isset($datas->imageBlog[0]) && !empty($datas->imageBlog))
                                @php $v = 0; @endphp
                                @foreach($datas->imageBlog as $value)
                                @php if($v > 0) continue; @endphp
                                @if($value->type === 'video')
                                <video width="100%" height="auto" autoplay muted playsinline loop>
                                    <source src="{{url('/file-image-client/blogs/')}}/{{ $value->name_image ?? '' }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                @php $v++; @endphp
                                @endif
                                @endforeach
                                @endif
                            </div>
                            <div class="project-detail_body">
                                <h2 class="project-detail__title">{{ $datas->detailBlog?->title ?? '' }}</h2>
                                <div class="project-detail__content">
                                    <p class="date_status">{{ $datas?->year ?? '' }}</p>
                                    <div class="text">
                                        <div class="longer-text ps ps--active-y">
                                            <div class="page" title="Page 2">
                                                <div class="section">
                                                    <div class="layoutArea">
                                                        <div class="column">
                                                            {!! $datas->detailBlog?->decision ?? '' !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(isset($relates) && count($relates) > 0)
                            <div class="project-relate" style="width: 70%;margin:auto">
                                <div id="carouselRelates" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        @if(isset($relates) && !empty($relates))
                                        @foreach($relates as $key => $value)
                                        <div data-bs-target="#carouselRelates" data-bs-slide-to="{{ $key }}" class="slick-slide {{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"></div>
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="carousel-inner">
                                        @if(isset($relates) && !empty($relates))
                                        @foreach($relates as $key => $value)
                                        <a href="{{ route('project.reader', ['id' => $value->id]) }}" class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ $value?->url_path ?? '' }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>{{ $value->title }}</h5>
                                                <p>{{ $value->description }}</p>
                                            </div>
                                        </a>
                                        @endforeach
                                        @endif
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRelates" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselRelates" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('clients/js/jquery.min.js') }}"></script>
    <script>
        $(function() {
            const $carousel = $('#carouselExampleControls')
            const $indicators = $('.project-detail__thumbs-number')

            if (!$carousel.length || !$indicators.length) return

            // Khi slide đổi → sync active
            $carousel.on('slid.bs.carousel', function(e) {
                $indicators
                    .removeClass('active')
                    .eq(e.to)
                    .addClass('active')
            })

            // Click số → nhảy slide
            $indicators.on('click', function() {
                const index = $(this).index()
                const carousel = bootstrap.Carousel.getOrCreateInstance(
                    $carousel[0]
                )
                carousel.to(index)
            })
        })
    </script>
</body>

</html>