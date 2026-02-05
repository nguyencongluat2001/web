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
                    <h2>ABOUT</h2>

                    <div class="about-info">
                        <h3>ZICZAC Architecture</h3>
                        <p>64 Ngo Quyen, Ha Dong District, Hanoi, Vietnam</p>
                        <p>(+84) 982179361</p>
                        <p>
                            <a href="mailto:hoangducanh84@gmail.com">
                                hoangducanh84@gmail.com
                            </a>
                        </p>
                    </div>

                    <div class="about-content">
                        <h4><strong>About us</strong></h4>
                        <p>
                            ZICZAC Architecture was founded by four Architects with the same passion
                            and architectural ideas.
                        </p>
                        <p>
                            ZICZAC - “The ZICZAC flying in the wind” - A symbol of softness, peace but
                            full of intense energy, of the aspiration to freedom but still held on
                            by the standards and standards.
                        </p>
                        <p>
                            That balance is the spirit of ZICZAC Architecture on the goal towards a
                            harmonizing people with nature in the continuous movement of life.
                        </p>

                        <h4><strong>Philosophy</strong></h4>
                        <p>
                            The ability to adapt and balance itself with the living environment is
                            the decisive factor for the existence and development of everything in
                            nature, including man.
                        </p>
                        <p>
                            Design philosophy of ZICZAC Architecture:
                            <em>“Balanced architecture to adapt to nature”.</em>
                        </p>
                        <p>
                            ZICZAC Architecture pursues energy sustainability and green standards to
                            solve the problems of Tropical Architecture.
                        </p>
                    </div>
                </section>
                <!-- section -->

                <div class="col-lg-12 text-start">
                    <div class="row g-lg-5 mb-4">
                        @foreach ($datas as $key => $data)
                        <div class="col-md-4 mb-4">
                            <div class="team-card">
                                <div class="team-image">
                                    <img src="{{url('/clients/img/home.jpg')}}" alt="{{ $data->name }}">
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