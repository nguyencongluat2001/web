@extends('client.layouts.index')
@section('body-client')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<!-- Start Banner Hero -->
<br>
<div class="banner-wrapper bg-light" >
        <div id="index_banner" class="banner-vertical-center-index">
            <div class="carousel-inner active pt-5" >
                <div class="banner-content col-lg-8 col-10 offset-1 m-lg-auto text-left ">
                    <div class="container-fluid pt-5"style="background: white;">
                        <div class="row"  >
                            <form action="" method="POST" id="frmIndications">
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                <section class="content-wrapper">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row form-group">
                                                <!-- <div class="col-md-3">
                                                    <button class="btn btn-success shadow-sm" id="btn_add" type="button"data-toggle="tooltip"
                                                        data-original-title="Thêm danh mục"><i class="fas fa-plus"></i></button>
                                                    {{-- <button class="btn btn-warning shadow-sm" id="btn_edit" type="button"data-toggle="tooltip"
                                                        data-original-title="SỬa danh mục"><i class="far fa-edit"></i></button> --}}
                                                    <button class="btn btn-danger shadow-sm" id="btn_delete" type="button"data-toggle="tooltip"
                                                        data-original-title="Xóa danh mục"><i class="fas fa-trash-alt"></i></button>
                                                </div> -->
                                                {{-- @endif --}}
                                                <!-- <div class="input-group" style="width:80%;height:10%">
                                                    <input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm mã, mã ống nghiệm, tên - sđt khách hàng...">
                                                </div>
                                                <button style="width:60px" id="txt_search" name="txt_search" type="button" class="btn btn-dark"><i class="fas fa-search"></i></button> -->
                                            </div>
                                            <!-- Màn hình danh sách -->
                                            <span style="font-size:30px;font-family: initial;color:#3e3e99">Báo cáo doanh thu</span> <br>
                                            <div id="total"></div>
                                            <canvas id="myChart" style="width:100%;max-width:950px"></canvas>
                                        </div>
                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal " id="show" role="dialog"></div>
    <!-- End Service -->
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_AppointmentAtHome.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script>
    var myClass = this;
    var baseUrl = "{{ url('') }}";
    NclLib.loadding();
    var urlPath = baseUrl + '/client/appointmentathome/report';
    var data = '';
    $.ajax({
        url: urlPath,
        type: "GET",
        // cache: true,
        data: data,
        success: function (arrResult) {
            var html = `<span style="font-size:20px;font-family: initial;">Tổng : <span style="font-size:20px;font-family: initial; font-weight: 600;color:#f5b500">`+ arrResult.total +`</span> </span>VND <br>`
            $("#total").html(html);

            var yValues = arrResult.datas.dataMoney;
            var xValues = ["1", "2", "3", "4", "5","6","7","8","9","10","11","12"];
            // var yValues = [15500000, 49000000, 44000000, 24000000, 15000000, 55000000, 46530000, 4400000, 24006000, 158900000,54500005, 49865755];
            var barColors = ["orange", "orange","orange","orange","orange","orange", "orange","orange","orange","orange","orange", "orange"];

            new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                legend: {display: false},
                title: {
                display: true,
                text: "Tính tổng doanh thu theo tháng / giá trị VND"
                }
            }
            });
        }
    });
    



</script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_AppointmentAtHome = new JS_AppointmentAtHome(baseUrl, 'client', 'appointmentathome');
    $(document).ready(function($) {
        JS_AppointmentAtHome.loadIndex(baseUrl);
    })
</script>
@endsection