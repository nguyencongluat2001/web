@extends('client.layouts.index')
@section('body-client')
<style>
    .team-card {
        background: #fff;
        padding: 24px 40px;
    }

    .team-image {
        width: 260px;          /* kiểm soát size */
        height: 340px;         /* chiều cao cố định */
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
        text-transform: uppercase;
    }

    .team-title {
        font-size: 11px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    /* Hover tinh tế */
    .team-card:hover img {
        filter: grayscale(0%);
        transition: 0.3s;
    }

</style>
    <!-- Start Banner Hero -->
    <section class="w-100">
        <div class="container">
            <div class="row d-flex align-items-center py-5">
                <div class="col-lg-12 text-start" >
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
                                    <div class="team-role">Graduated from Construction Architecture Faculty – Hanoi Architectural University</div>
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
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_Home.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_Facilities.js') }}"></script>
<script src='../assets/js/jquery.js'></script>

<script  type="text/javascript">
    $(document).ready(function() {
        var placeholderText = '<?= $dataSearch ?? "" ?>';
        var arrData = placeholderText.split('!~!');
        $('#myInput').placeholderTypewriter({text: arrData});  
    })
</script>
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_SearchSchedule.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_SearchSchedule = new JS_SearchSchedule(baseUrl, 'client', 'searchschedule');
    $(document).ready(function($) {
        JS_SearchSchedule.loadIndex(baseUrl);
    })
</script>
@endsection
