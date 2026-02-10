<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link href="{{ @asset('/clients/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ @asset('/clients/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ @asset('/clients/css/custom.css') }}">

    <script src="{{ @asset('/clients/js/jquery.min.js') }}"></script>
    <script src="{{ @asset('/clients/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="../clients/img/home.jpg">
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('og:url','https://fintopdata.vn')">
    <meta property="fb:app_id" content="2115022521881483">

    <meta property="og:image" content="@yield('og:image', 'http://cdn0387.cdn4s.com/media/logo/logo-kite-350x.png')" />
    <meta property="og:image:secure_url" content="'@yield('og:image', 'http://cdn0387.cdn4s.com/media/logo/logo-kite-350x.png')" />

    <meta property="og:title" content="@yield('og:title','Danh sách sản phẩm')">
    <meta property="og:description" content="@yield('og:title','Danh sách sản phẩm')">
</head>
<style>
    body {
        margin: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.6;
        color: #000;
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 1px;
        transition: opacity 3000ms linear 0s;
    }
</style>

<body>
    @include('client.layouts.menu', [
    'menuActive' => 'project',
    'showFilter' => true
    ])
    <!-- Start Banner Hero -->
    <section class="w-100 section-project">
        <div class="row d-flex align-items-center py-5">
            <div class="col-lg-12 text-start mt-5 px-4">
                @if(isset($blogs) && count($blogs) > 0)
                <div class="row">
                    @php
                    $basePath = url("file-image-client/blogs") . "/";
                    @endphp
                    @foreach($blogs as $blog)
                    <div class="product-item mb-4" data-code_category="{{ $blog->code_category ?? '' }}"  data-year="{{ $blog->detailBlog?->year ?? '' }}">
                        <a href="{{ route('project.reader', ['id' => $blog->id]) }}" class="image-link">
                            <div class="inner-image">
                                <img src="{{ $basePath . ($blog->fileBlog[0]?->name_image ?? '') }}" alt="{{ $blog->detailBlog?->title }}" class="img-fluid mb-3">
                            </div>
                            <div class="inner-content">
                                <h4 class="product-title">{{ $blog->detailBlog?->title }}</h4>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                <p>Không có dữ liệu nào.</p>
                @endif
            </div>
        </div>
    </section>


    <script>
        $(document).ready(function() {
            $('.typology .dropdown-item').on('click', function(e) {
                e.preventDefault()
                $("#dropdownTypology").text($(this).text());

                const code = $(this).attr('href').replace('#', '')
                $('.product-item[data-code_category]').hide()
                $('.product-item[data-code_category="' + code + '"]').show()
            })
            $('.year .dropdown-item').on('click', function(e) {
                e.preventDefault()
                $("#dropdownYear").text($(this).text());

                const year = $(this).attr('href').replace('#', '')
                $('.product-item[data-year]').hide()
                $('.product-item[data-year="' + year + '"]').show()
            })
        })
    </script>
    <!-- End Banner Hero -->
</body>

</html>