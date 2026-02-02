@extends('client.layouts.index')
@section('body-client')
<link rel="stylesheet" href="../clients/css/style.css">
    <!-- Start Banner Hero -->
    <form action="" method="GET" id="frmHospital">
    <input style="display:none" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <div class="banner-wrapper bg-light" >
            <div id="index_banner_facilities" class="banner-vertical-center-index">
            <!-- <div class="banner-vertical-center-index" style="background:#163048d4"> -->
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner active pt-5" >
                        <div class="list-hispital-home-one pt-4">
                            <section class="banner-bg">
                                <span  class="text-title-home "><center> ĐÁNH GIÁ SỬ DỤNG DỊCH VỤ</center></span>
                            </section>
                        </div>
                        <div class="carousel-item active list-hispital-home">
                            <div class=" row d-flex ">
                                <div class="banner-content col-lg-12 col-12 m-lg-auto text-left ">
                                        <!-- Start Contact -->
                                        <section class="container py-5" style="background: #ffffffc4;">
                                            <div class="row pb-4">
                                                <div class="col-lg-4">
                                                    <div class="contact row mb-4">
                                                        <div class="contact-icon col-lg-3 col-3">
                                                            <div class="py-3 mb-2 text-center border rounded text-secondary">
                                                                <i class='display-6 bx bx-news'></i>
                                                            </div>
                                                        </div>
                                                        <ul class="contact-info list-unstyled col-lg-9 col-9  light-300">
                                                            <li class="h5 mb-0">Liên hệ qua phương tiện truyền thông</li>
                                                            <li class="text-muted">Mr. Hoài Sơn</li>
                                                            <li class="text-muted">010-020-0340</li>
                                                        </ul>
                                                    </div>
                                                    <div class="contact row mb-4">
                                                        <div class="contact-icon col-lg-3 col-3">
                                                            <div class="border py-3 mb-2 text-center border rounded text-secondary">
                                                                <i class='bx bx-laptop display-6' ></i>
                                                            </div>
                                                        </div>
                                                        <ul class="contact-info list-unstyled col-lg-9 col-9 light-300">
                                                            <li class="h5 mb-0">Liên hệ kỹ thuật</li>
                                                            <li class="text-muted">Mr. luatnc</li>
                                                            <li class="text-muted">010-020-0340</li>
                                                        </ul>
                                                    </div>
                                                    <div class="contact row mb-4">
                                                        <div class="contact-icon col-lg-3 col-3">
                                                            <div class="border py-3 mb-2 text-center border rounded text-secondary">
                                                                <i class='bx bx-money display-6'></i>
                                                            </div>
                                                        </div>
                                                        <ul class="contact-info list-unstyled col-lg-9 col-9 light-300">
                                                            <li class="h5 mb-0">Liên hệ thanh toán</li>
                                                            <li class="text-muted">Mr. </li>
                                                            <li class="text-muted">010-020-0340</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- Start Contact Form -->
                                                <div class="col-lg-8 ">
                                                <form id="frmSendSchedule" method="POST"  autocomplete="off">
                                                    @csrf
                                                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                                                    <div class="row">
                                                        <div class="form-wrapper col-md-6">
                                                            <label for="">Họ và tên<span class="request_star">*</span></label>
                                                            <input placeholder="Nhập tên..." id="name" type="text" class="form-control" name="name" value="" autofocus>
                                                        </div>
                                                        <div class="form-wrapper col-md-6">
                                                            <label for="">Số điện thoại <span class="request_star">*</span></label>
                                                            <input placeholder="Số điện thoại..." id="phone" type="phone" class="form-control" name="phone" value="">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="form-wrapper col-md-6">
                                                            <label for="">Địa chỉ Email</label>
                                                            <input placeholder="Nhập email..." id="email" type="email" class="form-control" name="email" value="">
                                                        </div>
                                                        <div class="form-wrapper col-md-6">
                                                            <label for="">Công ty</label>
                                                            <input id="company" type="text" class="form-control" name="company" value="">
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row">
                                                        <div class="form-wrapper">
                                                            <label for="">Địa chỉ</label>
                                                            <input placeholder="Nhập địa chỉ..." id="address" type="text" class="form-control" name="address" value="{{ old('birth') }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-wrapper">
                                                            <label for="">Nội dung <span class="request_star">*</span></label>
                                                            <textarea placeholder="Nhập nội dung..." name="reason" id="reason" class="form-control"  rows="4" cols="50"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="pt-3 mb-3">
                                                        <button type="button" onclick="JS_Schedule.add()" class=" btn-primary" id="btn_register" style="background-color: #ffaa00">
                                                            {{ __('Gửi đánh giá') }}
                                                        </button>
                                                    </div>
                                                </form>
                                                </div>
                                                <!-- End Contact Form -->
                                            </div>
                                        </section>
                                        <!-- End Contact -->
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
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_Contact.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_Contact = new JS_Contact(baseUrl, 'client', 'contact');
    $(document).ready(function($) {
        JS_Contact.loadIndex(baseUrl);
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