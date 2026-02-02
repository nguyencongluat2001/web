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
</head>

<body>
    <div class="banner-wrapper">
        <div class="banner-wrapper" style="background: white;">
            <div class="project-detail px-2">
                <div class="row">
                    <div class="col-lg-9 pr-md-60">
                        <div id="carouselExampleControls" class="carousel slide slick-slider" data-bs-ride="carousel">
                            <div class="carousel-inner project-detail__image">
                                @if(isset($datas->imageBlog) && !empty($datas->imageBlog))
                                @foreach($datas->imageBlog as $key => $value)
                                <div class="project-detail__image-item carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{url('/file-image-client/blogs/')}}/{{ $value->name_image ?? '' }}" class="d-block w-100 img-fluid" alt="...">
                                </div>
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
                        <div class="back mb-5 pb-5">
                            <button onclick="window.history.back()"><i class="fas fa-chevron-left fs-13 pe-2"></i> Back</button>
                        </div>
                        <div class="project-detail__thumbs">
                            <div class="slider-thumbs mb-0 slick-initialized slick-slider mb-5" loaded="1">
                                <div class="slick-list draggable">
                                    <div class="carousel-indicators slick-track">
                                        @if(isset($datas->imageBlog) && !empty($datas->imageBlog))
                                        @foreach($datas->imageBlog as $key => $value)
                                        <div class="project-detail__thumbs-number slick-slide {{ $key == 0 ? 'active' : '' }}" data-bs-target="#carouselExampleControls" data-bs-slide-to="{{ $key }}" aria-current="true">{{ $key + 1 }}</div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <h2 class="project-detail__title">{{ $datas->detailBlog?->title ?? '' }}</h2>
                            <div class="project-detail__content">
                                <p class="date_status">{{ $datas->detailBlog?->created_at ? date('Y', strtotime($datas->detailBlog->created_at)) : '' }}</p>
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