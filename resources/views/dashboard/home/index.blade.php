@extends('dashboard.layouts.index')
@section('body')
<style>
        .tv-lightweight-charts{
            margin-left: 300px !important;
            margin-bottom:300px !important;
    }
</style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_Home.js') }}"></script>
    <!-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> -->
    {{-- <link  href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" /> --}}
    <form action="" method="GET" id="frmHome_index">
        <main class="main-content position-relative border-radius-lg ">
            <div class="container-fluid py-4">
            
            <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4" id="frmLoadlist_list">
                    <div class="card ">
                        <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Doanh thu</h6>
                        </div>
                        <div class="row form-group" style="text-align: center;">
                                <div class="col-md-3">
                                    <select onchange="chart(this.value)" class="form-control input-sm chzn-select" name="year"
                                        id="year">
                                        @php 
                                        $year = date('Y');
                                        @endphp
                                        <option value="{{$year}}">{{$year}}</option>
                                        <!-- <option value="2024">2024</option>
                                        <option value="2025">2025</option> -->
                                    </select>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- content -->
            <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8">
                <div class="row">
                     <canvas id="myChart" style="width:100%;max-width:950px"></canvas>
                </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100">
                        <!-- <div style="display:flex">
                            <div class="col-md-6">
                                <input type="text" class="form-control datepicker" name="fromdate" id="fromdate" placeholder="Từ ngày">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control datepicker" name="todate" id="todate" placeholder="Đến ngày">
                            </div>
                        </div> -->
                       
                        <div class="input-group py-3" style="width:100%;height:10%">
                            <!-- <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span> -->
                            <input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm theo mã ctv...">
                        </div>
                        <div style="padding-top:20px">
                            <center><button style="width:100px;" id="txt_search" name="txt_search" type="button" class="btn btn-dark "><i class="fas fa-search"></i></button></center>

                        </div>
                        <div class="card-header pb-0 p-3 pt-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Doanh thu cá nhân</h6> 
                            </div>
                            <div id="iss"></div>
                            <!-- <div class="col-6 text-end">
                            <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                            </div> -->
                        </div>
                        </div>
                        <div class="card-body p-3 pb-0">
                            <div id="iss_money">
                                <!-- <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark font-weight-bold text-sm">Nguyen Van A</h6>
                                            <span class="text-xs">#YE12</span>
                                        </div>
                                        <div class="d-flex align-items-center text-sm">
                                            Doanh thu: <span style="color: #ff7539;font-weight: 600;">18,950,00 </span> VND
                                        </div>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </form>
    
    <div class="modal fade" id="editmodal" role="dialog"></div>
    <div class="modal " id="addfile" role="dialog"></div>

    <div id="dialogconfirm"></div>
    @section('js')

    <script>
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
    </script>
    <script>
        
        this.year = $("#year").val();
        var myClass = this;
        var baseUrl = "{{ url('') }}";
        NclLib.loadding();
        var urlPath = baseUrl + '/system/home/loadList';
        var data = '';
        var data = '_token=' + $("#_token").val();
        data += '&year=' + this.year;
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
        function chart(){
            this.year = $("#year").val();
            var myClass = this;
            var baseUrl = "{{ url('') }}";
            NclLib.loadding();
            var urlPath = baseUrl + '/system/home/loadList';
            var data = '';
            var data = '_token=' + $("#_token").val();
            data += '&year=' + this.year;
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
        }
    </script>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = '{{ url('') }}';
        var JS_Home = new JS_Home(baseUrl, 'system', 'home');
        $(document).ready(function($) {
            JS_Home.loadIndex(baseUrl);
        })
    </script>
@endsection
@endsection
