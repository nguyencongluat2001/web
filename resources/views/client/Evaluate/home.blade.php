@extends('client.layouts.index')
@section('body-client')
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>

    <!-- Start Banner Hero -->
    <form action="" method="GET" id="frmHospital">
    <input style="display:none" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <div class="banner-wrapper bg-light" >
            <div id="index_banner_facilities" class="banner-vertical-center-index">
            <!-- <div class="banner-vertical-center-index" style="background:#163048d4"> -->
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner active pt-4" >
                        <div class="list-hispital-home-one pt-5 text">
                            <section class="banner-bg">
                                <span  class="text-title-home "><center> BỆNH VIỆN PHÒNG KHÁM <br>TẠI CÁC TUYẾN TRUNG ƯƠNG</center></span>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4 mx-auto " style="display:flex">
                                            <div class="input-group pt-2 box">
                                                  <input id="myInput" onkeyup="myFunction()"style="background:#ffffffb5" type="text" class="input form-control form-control-lg rounded-pill rounded" placeholder="Từ kiếm tên bệnh viện..." aria-label="Từ kiếm tên bệnh viện..">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- <div class="carousel-item active list-hispital-home pt-5">
                            <div class=" row d-flex align-items-center">
                                <div class="banner-content col-lg-10 col-10 offset-1 m-lg-auto text-left ">
                                        <section class="container">
                                            <div class="row gx-lg-5">
                                                 <div class="row" id="table-container" style="padding-top:10px">
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="carousel-item active list-hispital-home pt-5">
                            <div class=" row d-flex ">
                                <div class="banner-content col-lg-12 col-12 m-lg-auto text-left ">
                                        <!-- Start Our Work -->
                                        <section class="container">
                                            <table id="myTable" class="table  table-bordered table-striped table-condensed dataTable no-footer">
                                                <tbody>
                                                    @foreach ($datas as $key => $data)
                                                        <tr>
                                                            <td style="background: #ffffffeb;width:30%;vertical-align: middle;" align="center">
                                                                <a class="pb-5" style="text-decoration: none" href="{{url('/facilities')}}/{{$data->code}}">
                                                                    <img  src="{{url('/file-image-client/avatar-hospital/')}}/{{ !empty($data->avatar)?$data->avatar:'' }}" alt="Image" style="height: 150px;width: 250px;object-fit: cover;">
                                                                    <span style="padding-left:10px;font-size: 30px;font-family: -webkit-body;color: #1d3952;">{{ $key + 1 }}.&nbsp;{{$data->name_hospital}}</span>
                                                                    <span style="padding-left:10px;font-size: 18px;font-family: -webkit-body;color: #ff0000;">({{$data->address}})</span><br>
                                                                    <!-- <a  href="{{url('/facilities')}}/{{$data->code}}">
                                                                        <span style="background: #32870b;color: #ffffff;" class="btn btn-outline-light rounded-pill">Xem chi tiết</span>
                                                                    </a> -->
                                                                </a>
                                                            </td>
                                                            <!-- <td style="background: #ffffffeb;width:70%;vertical-align: middle;" align="center">
                                                                <span style="padding-left:10px;font-size: 40px;font-family: -webkit-body;color: #1d3952;">{{ $key + 1 }}.&nbsp;{{$data->name_hospital}}</span> <br>
                                                                <span style="padding-left:10px;font-size: 20px;font-family: -webkit-body;color: #1d3952;"><i style="color:#8b0000" class="fas fa-hotel"></i> Địa chỉ: {{$data->address}}</span><br>
                                                                <a  href="{{url('/facilities')}}/{{$data->code}}">
                                                                    <span style="background: #32870b;color: #ffffff;" class="btn btn-outline-light rounded-pill">Xem chi tiết</span>
                                                                </a>
                                                            </td> -->
                                                            
                                                        </tr> 
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </section>
                                        <!-- End Our Work -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<div class="modal" id="reader" role="dialog"></div>
<!-- End Recent Work -->
<script>

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_Evaluate.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_Evaluate = new JS_Evaluate(baseUrl, 'client', 'evaluate');
    $(document).ready(function($) {
        JS_Evaluate.loadIndex(baseUrl);
    })
</script>
<!-- <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_System_Security.js') }}"></script>
<script>
      var JS_System_Security = new JS_System_Security();
          $(document).ready(function($) {
                 JS_System_Security.security();
      })
</script> -->
@endsection