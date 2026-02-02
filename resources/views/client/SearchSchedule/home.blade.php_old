@extends('client.layouts.index')
@section('body-client')
    <!-- Start Banner Hero -->
    <form action="" method="GET" id="frmSearch">
    <input style="display:none" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <div class="banner-wrapper bg-light" >
            <div id="index_banner_facilities" class="banner-vertical-center-index">
            <!-- <div class="banner-vertical-center-index" style="background:#163048d4"> -->
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner active pt-5" >
                        <div class="list-hispital-home-one pt-4">
                            <section class="banner-bg" style="padding-top: 30px">
                                <center>
                                    <span class="text-title-home anime-title" style=" padding-top: 20px;"> TRA CỨU ĐẶT LỊCH</span> <br>
                                    <div class="text-title-home anime-title"> 
                                        <span  class="text-title-home anime-title-span">NHANH CHÓNG - HIỆU QUẢ</span>
                                    </div>
                                </center>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 mx-auto " style="display:flex">
                                            <div class="input-group pt-2 box">
                                                  <input name="search" id="search" style="background:#ffffffb5" type="text" class="input form-control form-control-lg rounded-pill rounded" placeholder="Tìm kiếm theo số điện thoại hoặc mã đặt lịch..." aria-label="Tìm kiếm theo số điện thoại hoặc mã đặt lịch..">
                                            </div>
                                            <span class="input-group-btn pt-2" style="padding-left:15px">
                                                <button onclick="JS_SearchSchedule.loadList()" style="font-size: 25px;border-radius: 20%;width: 50px;height: 100%;;background: #ffc000;" type="button" class=" btn-dark" id="txt_search"><i class="fas fa-search"></i></button>
                                            </span>
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
                                             <div id="table-container"></div>
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
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_SearchSchedule.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_SearchSchedule = new JS_SearchSchedule(baseUrl, 'client', 'searchschedule');
    $(document).ready(function($) {
        JS_SearchSchedule.loadIndex(baseUrl);
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