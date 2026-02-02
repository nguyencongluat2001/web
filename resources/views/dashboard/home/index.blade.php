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
