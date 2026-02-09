<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT</title>
    <link href="{{ @asset('/clients/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ @asset('/clients/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src='{{ @asset("clients/js/jquery.min.js") }}'></script>
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

    .team-card {
        background: #fff;
    }

    .team-image {
        width: 100%;
        height: 340px;
        aspect-ratio: 3 / 4;
        overflow: hidden;
        margin-bottom: 16px;
    }

    .team-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: grayscale(100%);
    }

    /* TEXT */
    .team-name {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 6px;
        color: #000;
    }

    .team-role {
        font-size: 11px;
        letter-spacing: 1px;
        margin-bottom: 4px;
        /* text-transform: uppercase; */
        font-family: Arial, Helvetica, sans-serif;
    }

    .team-title {
        font-size: 11px;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-family: Arial, Helvetica, sans-serif;
    }

    /* Hover tinh tế */
    .team-card:hover img {
        filter: grayscale(0%);
        transition: 0.3s;
    }

    .about {
        /* margin: 60px auto; */
        font-family: Arial, Helvetica, sans-serif;
        color: #111;
        letter-spacing: 1px;
    }

    .about h2 {
        font-size: 22px;
        margin-bottom: 30px;
    }

    .about-info h3 {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .about-info p {
        margin: 4px 0;
        font-size: 13px;
    }

    .about-content h4 {
        margin-top: 30px;
        font-size: 14px;
        /* text-transform: uppercase; */
        font-family: Arial, Helvetica, sans-serif;
    }

    .about-content p {
        font-size: 13px;
        line-height: 1.7;
        margin-bottom: 12px;
        font-family: Arial, Helvetica, sans-serif;
    }

    /* -------- Mobile nhỏ -------- */

    @media (max-width: 1920px and min-width: 1141px) {

        /* .nav-logo-mobile{
            width: 80%%;
        } */
        .container {
            max-width: 1024px;
        }
    }
</style>

<body>
    @include('client.layouts.menu', [
    'menuActive' => 'about',
    'showFilter' => false
    ])
    <!-- Start Banner Hero -->
    <section class="w-100">
        <div class="container">
            <div class="row d-flex align-items-center py-5">
                <!-- section -->
                <section class="about">
                    <h2>{{ __('client.about.title') }}</h2>

                    <div class="about-info">
                        <h3>ZICZAC Architecture</h3>
                        <p>{{ __('client.about.about_info.address') }}</p>
                        <p>(+84) 982179361</p>
                        <p>
                            <a href="mailto:hoangducanh84@gmail.com">
                                hoangducanh84@gmail.com
                            </a>
                        </p>
                    </div>

                    <div class="about-content">
                        <h4><strong>{{ __('client.about.about_us.title') }}</strong></h4>
                        <p>{!! __('client.about.about_us.segment_1') !!}</p>
                        <p>{!! __('client.about.about_us.segment_2') !!}</p>
                        <p>{!! __('client.about.about_us.segment_3') !!}</p>

                        <h4><strong>{{ __('client.about.philosophy.title') }}</strong></h4>
                        <p>{!! __('client.about.philosophy.segment_1') !!}</p>
                        <p>{!! __('client.about.philosophy.segment_2') !!}</p>
                        <p>{!! __('client.about.philosophy.segment_3') !!}</p>
                    </div>
                </section>
                <!-- section -->

                <div class="col-lg-12 text-start">
                    <div class="row g-lg-5 mb-4">
                        @foreach ($datas as $key => $data)
                        <div class="col-md-4 mb-4">
                            <div class="team-card">
                                <div class="team-image">
                                    <img src="{{ url('/file-image/avatar/'.$data->avatar) }}" alt="{{ $data->name }}">
                                </div>

                                <div class="team-info text-center">
                                    <h4 class="team-name">{{ $data->name }}</h4>
                                    <div class="team-role">CO-FOUNDER</div>
                                    <div class="team-role">LEAD ARCHITECT</div>
                                </div>
                                <div>{!! $data->decision !!}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Hero -->

    </script>
    <!-- End Service -->
    <script src='{{ @asset("clients/js/jquery.min.js") }}'></script>
    <script src='{{ @asset("assets/js/placeholderTypewriter.js") }}'></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_Home.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_Facilities.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var placeholderText = '<?= $dataSearch ?? "" ?>';
            var arrData = placeholderText.split('!~!');
            $('#myInput').placeholderTypewriter({
                text: arrData
            });
        })
    </script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_SearchSchedule.js') }}"></script>
</body>

</html>