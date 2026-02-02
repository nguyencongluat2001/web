@extends('client.layouts.index')
@section('body-client')
<style>
    form{
        width:80%;
    }
    .form-control:disabled{
        background-color:#ffffff
    }
    .hiddel{
        display: none;
    }
    .show{
        display: block;
    }

      .scrollbar
    {
      margin-left: 30px;
      /* float: left; */
      height: 300px;
      /* width: 65px; */
      /* background: #F5F5F5; */
      overflow-y: scroll;
      margin-bottom: 25px;
    }

    .force-overflow
    {
      min-height: 400px;
    }

    #wrapper
    {
      text-align: center;
      width: 500px;
      margin: auto;
    }

    /*
    *  STYLE 2
    */

    #style-2::-webkit-scrollbar-track
    {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      border-radius: 10px;
      background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar
    {
      width: 12px;
      background-color: #F5F5F5;
    }

    /* #style-2::-webkit-scrollbar-thumb
    {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
      background-color: #D62929;
    } */
    .tv-lightweight-charts{
      width: 100%;
      padding-right: var(--bs-gutter-x, 0.5rem) !important;
      padding-left: var(--bs-gutter-x,0.5rem)!important;
      margin-right: auto!important;
      margin-left: auto!important;
    }
    /* .table{
        border-color: #670000;
    } */
    .table-responsive.pmd-card.pmd-z-depth{
      height: 100%;
      max-height: 400px;
    }
    #style-1 #table-data thead tr td{
      position: sticky;
      top: 0;
      background: #92241a;
    }

    #frmSendSchedule{
        width: 100%;
    }
    #carouselExampleIndicators input[type=text], input[type=email], input[type=password], input[type=date] {
        padding: 12px 40px;
        display: inline-block;
        border: 1px solid #ccc;
    }
    #carouselExampleIndicators textarea{
        padding: 5px 40px;
        display: inline-block;
        border: 1px solid #ccc;
    }

    /* Set a style for the buttons*/
    #carouselExampleIndicators button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    /* Set a hover effect for the button*/
    #carouselExampleIndicators button:hover {
        opacity: 0.8;
    }

    /* Set extra style for the cancel button*/
    #carouselExampleIndicators .container {
        padding: 16px;
    }

    #carouselExampleIndicators .form-input {
        position: relative;
    }

    #carouselExampleIndicators .form-input i {
        position: absolute;
        left: 24px;
        top: 12px;
        color: gray;
    }
    .message-error{
        display: none;
        color: red;
    }
    .error-input{
        border: 1px solid red;
    }
    .error-icon{
        color: red !important;
    }
    .error-input::placeholder{
        color: red;
    }
    .padding-style{
        padding-top:15px
    }
</style>
<link rel="stylesheet" href="../clients/css/style.css">
    <!-- Start Banner Hero -->
    <div class="bg-light" >
        <div class="banner-vertical-center-index">
            <!-- Start slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner active" >
                     <!-- <div class="list-hispital-home-one pt-5">
                        <section class="banner-bg">
                            <span  class="text-title-home "><center> ĐĂNG KÝ KHÁM NHANH</center></span>
                        </section>
                        
                     </div> -->
                     
                    <!-- End Contact -->
                    <div class="carousel-item active list-hispital-home" >
                        <div class=" d-flex align-items-center">
                            <div class="banner-content col-lg-6 col-10 offset-1 m-lg-auto text-left ">
                                <div class=" g-lg-5 mb-4">
                                    <div class="banner-wrapper w-100" style="background:#fffffffc;color:black">
                                        <div class="row g-lg-5 mb-4">
                                            <div class="banner-wrapper w-100 py-3">
                                                <div class="list-group wrapper pb-0 px-3">
                                                    <a class="col-sm-6 col-lg-12 text-decoration-none text-light">
                                                    <center>
                                                        <div class="d-lg-flex gx-5">
                                                            <div class="col-lg-1">
                                                            </div>
                                                            <div class="col-lg-1 "></div>
                                                            <div class="col-lg-8 ">
                                                            <span  class="text-title-home" style="color:#000000"> Tra cứu kết quả</span> <br>
                                                            <span  style="font-size:15px;color:#577391">Quý khách vui lòng điền đầy đủ thông tin. Chúng tôi sẽ liên hệ lại sớm nhất. <br> <span style="color:red">Lưu ý: Chức năng tra cứu dành cho khách hàng của Medhanoi</span></span>
                                                        </div>
                                                        </center>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wrapper" style="display: flex; justify-content: center;">
                                            <form id="frmSendSchedule" method="POST"  autocomplete="off">
                                                @csrf
                                                <!-- <input type="hidden" id="code" name="code" value="{{ !empty($datas->code)?$datas->code:'' }}"> -->
                                                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" id="type_at_home" name="type_at_home" value="">
                                                <div id="iss_money"></div>
                                                 <div class="row">
                                                    <div class="form-input col-md-12 padding-style">
                                                        <input type="text" class="form-control required" placeholder="Mã tra cứu của bạn" name="sid" id="sid" value="" oninput="inValid(this.id)">
                                                        <i class="fas fa-code phone-icon padding-style"></i>
                                                        <span class="message-error phone-error">Mã tra cứu không được để trống!</span>
                                                    </div>
                                                    <div class="form-input col-md-12 padding-style" >
                                                        <div id="changeName">
                                                            <input type="text" class="form-control required" placeholder="Số điện thoại của bạn" name="phone" id="phone" value="" oninput="inValid(this.id)">
                                                            <i class="fa fa-user-lock uname-icon padding-style"></i>
                                                        </div>
                                                        <span class="message-error uname-error">Số điện thoại của bạn không được để trống!</span>
                                                    </div>
                                                    <center>
                                                    <div class="pt-3 mb-3" style="width:150px">
                                                        <button type="button" onclick="JS_SearchSchedule.getFile()" class=" btn-primary" id="btn_register" style="background-color: #1d93e3;font-family: sans-serif;">
                                                            {{ __('Tra cứu') }}
                                                        </button>
                                                    </div>
                                                    </center>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Banner Hero -->
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="editmodal" role="dialog"></div>
<div class="modal " id="addfile" role="dialog"></div>
<div class="modal " id="show" role="dialog"></div>
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
function inValid(id){
        console.log(id);
        if($("#" + id).val() != ''){
            $('.' + id + '-error').css("display", "none");
            $('.' + id + '-icon').removeClass("error-icon");
        }
    }
$("#frmSendSchedule div.form-input").each(function(key, value){
        $(this,'input').focusout(function(){
            if($(this).find('input').hasClass('required') && $(this).find('input').val() == ''){
                $(this).find('.message-error').css("display", "block");
                $(this).find('input').addClass('error-input');
                $(this).find('i').addClass('error-icon');
            }else if($(this).find('textarea').hasClass('required') && $(this).find('textarea').val() == ''){
                $(this).find('.message-error').css("display", "block");
                $(this).find('input').addClass('error-input');
                $(this).find('i').addClass('error-icon');
            }
        });
    });
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