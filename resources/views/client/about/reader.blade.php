<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $datas->detailBlog?->title ?? '' }}</title>
    <link rel="stylesheet" href="{{ url('/clients/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('/clients/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="{{ url('/clients/css/detail.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../clients/img/home.jpg">
    <link rel="stylesheet" href="https://unpkg.com/photoswipe@5/dist/photoswipe.css">

    <meta property="og:image" content="@yield('og:image', 'http://cdn0387.cdn4s.com/media/logo/logo-kite-350x.png')" />
    <meta property="og:image:secure_url" content="'@yield('og:image', 'http://cdn0387.cdn4s.com/media/logo/logo-kite-350x.png')" />

</head>
<style>
    .hero-menu a {
        display: inline-block;
        padding: 12px 12px;;
        background: rgba(255, 255, 255, 0.55);
        color: #000000ff;
        text-decoration: none;
        font-size: 22px;
        /* font-family: 'Patrick Hand', cursive; */
        font-family: 'auto';
        border-radius: 6px;
        transition: all 0.3s ease;
    }
</style>

<body>
    <div class="banner-wrapper">
        <div class="banner-wrapper" style="background: white;">
            <div class="project-detail px-2">
                <div class="row mx-0">
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
                            <div class="carousel-inner project-detail__image pswp-gallery" id="gallery">
                                @if(isset($datas->imageBlog) && !empty($datas->imageBlog))
                                @php $i = 1; @endphp
                                @foreach($datas->imageBlog as $value)
                                @if($value->type !== 'video')
                                <div class="project-detail__image-item carousel-item {{ $i == 1 ? 'active' : '' }}">
                                    <!-- <img src="{{url('/file-image-client/blogs/')}}/{{ $value->name_image ?? '' }}" class="d-block w-100 img-fluid" alt="..."> -->
                                    <a href="{{ url('/file-image-client/blogs/'.$value->name_image) }}"
                                        data-pswp-width="2400"
                                        data-pswp-height="1600"
                                        target="_blank">
                                            <img src="{{ url('/file-image-client/blogs/'.$value->name_image) }}"
                                                class="d-block w-100 img-fluid"
                                                style="cursor: zoom-in;">
                                    </a>

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
                        <div class="hero-menu web-nav">
                            <a href="/client/home/about">Giới thiệu</a>
                            <a href="/client/project/index">Dự án</a>
                            <a href="/contact">Liên hệ</a>
                        </div>
                    </div>

                    <div class="col-lg-3 project-content">
                        <div class="back mb-2">
                            <button onclick="window.history.back()"><i class="fas fa-chevron-left fs-13 pe-2"></i> Back</button>
                        </div>
                        <div class="project-detail__thumbs bbb_main_container">
                            <div class="project-video" loaded="1">
                                @if(isset($video))
                                <iframe controls src="{{$video ?? '' }}" frameborder="0"></iframe>
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
                            <div class="hero-menu mobile-nav">
                                <a href="/client/home/about">Giới thiệu</a>
                                <a href="/client/project/index">Dự án</a>
                                <a href="/contact">Liên hệ</a>
                            </div>
                            <div class="project-relate">
                                <div class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                <div class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></div>
                                <div class="owl-carousel owl-theme bbb_viewed_slider">
                                    @if(isset($relates) && !empty($relates))
                                    @foreach($relates as $key => $value)
                                    <a class="owl-item" href="{{ route('project.reader', ['id' => $value->id]) }}">
                                        <div class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="bbb_viewed_image">
                                                <img
                                                    src="{{ $value?->url_path ?? '' }}"
                                                    width="100%"
                                                    alt="">
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('clients/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
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
    <script type="module">
        import PhotoSwipeLightbox from 'https://unpkg.com/photoswipe@5/dist/photoswipe-lightbox.esm.js';

        const lightbox = new PhotoSwipeLightbox({
            gallery: '#gallery',
            children: 'a',
            pswpModule: () => import('https://unpkg.com/photoswipe@5/dist/photoswipe.esm.js'),
            showHideAnimationType: 'zoom',
            bgOpacity: 0.95
        });
        lightbox.init();
    </script>

    <script>
        $(document).ready(function() {
            if ($('.bbb_viewed_slider').length) {
                var viewedSlider = $('.bbb_viewed_slider');

                viewedSlider.owlCarousel({
                    loop: true,
                    margin: 5,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    nav: false,
                    dots: false,
                    items: 3,
                    responsive: {
                        0: {
                            items: 1
                        },
                        480: {
                            items: 2
                        },
                        768: {
                            items: 3
                        }
                    }
                });

                if ($('.bbb_viewed_prev').length) {
                    var prev = $('.bbb_viewed_prev');
                    prev.on('click', function() {
                        viewedSlider.trigger('prev.owl.carousel');
                    });
                }

                if ($('.bbb_viewed_next').length) {
                    var next = $('.bbb_viewed_next');
                    next.on('click', function() {
                        viewedSlider.trigger('next.owl.carousel');
                    });
                }
            }
        });
    </script>
</body>

</html>