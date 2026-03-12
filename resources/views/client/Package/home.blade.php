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
                        <div class="list-hispital-home-one pt-5">
                            <section class="banner-bg">
                                <span  class="text-title-home "><center> KHÁM TỔNG QUÁT</center></span>
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
                        <div class="carousel-item active list-hispital-home pt-5">
                            <div class=" row d-flex ">
                                <div class="banner-content col-lg-12 col-12 m-lg-auto text-left ">
                                        <!-- Start Our Work -->
                                        <section class="container">
                                            <!-- <table id="myTable" class="table  table-bordered table-striped table-condensed dataTable no-footer">
                                                <tbody>
                                                    @foreach ($datas as $key => $data)
                                                        <tr>
                                                            <td style="background: #ffffffeb;width:30%;vertical-align: middle;" align="center">
                                                                <a class="pb-5" style="text-decoration: none" href="{{url('/facilities')}}/{{$data->code}}">
                                                                    <img  src="{{url('/file-image-client/avatar-hospital/')}}/{{ !empty($data->avatar)?$data->avatar:'' }}" alt="Image" style="height: 150px;width: 250px;object-fit: cover;">
                                                                    <span style="padding-left:10px;font-size: 30px;font-family: -webkit-body;color: #1d3952;">{{ $key + 1 }}.&nbsp;{{$data->name_hospital}}</span>
                                                                    <span style="padding-left:10px;font-size: 18px;font-family: -webkit-body;color: #ff0000;">({{$data->address}})</span><br>
                                                                </a>
                                                            </td>
                                                        </tr> 
                                                    @endforeach
                                                </tbody>
                                            </table> -->
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
     <!-- Start Banner Hero -->
     <div class="banner-wrapper">
        <div class="banner-vertical-center-index container-fluid">
            <!-- Start slider -->
            <div id="carouselExampleIndicators1" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <!-- <div class="row">
                             <h2 class="h2 text-center col-12 semi-bold-600">Bài viết nổi bật</h2>
                        </div> -->
                        <div class=" row d-flex align-items-center">
                            <div class="banner-content col-lg-10 col-10 offset-1 m-lg-auto text-left py-5 pb-5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End slider -->
        </div>
    </div>
    <!-- End Banner Hero -->
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
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_Package.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_Package = new JS_Package(baseUrl, 'client', 'package');
    $(document).ready(function($) {
        JS_Package.loadIndex(baseUrl);
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