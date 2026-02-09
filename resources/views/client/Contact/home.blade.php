<style>
    @media only screen 
        and (min-width: 834px) 
        and (max-width: 1366px) {
            
        .apad{
            width: 100% !important;
        }
        /* .project-detail__thumbs {
            height: auto;
        }

        .project-detail_body {
            height: auto;
            max-height: 420px;
        }
        .project-content{
            padding-left:0px
        }
        .project-detail__content{
            height: 300px;
        } */
    }
</style>
<title>Liên hệ</title>
@extends('client.layouts.index')
@section('body-client')
<link rel="stylesheet" href="../clients/css/style.css">
    <!-- Start Banner Hero -->
    <form action="" method="GET" id="frmHospital">
    <input style="display:none" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <div class="banner-wrapper" >
            <!-- <div class="banner-vertical-center-index" style="background:#163048d4"> -->
                 <!-- Start Contact -->
                <section class="container py-5" style="background: #ffffffc4;width: 80%;">
                    <div class="row pb-4">
                        <div class="col-lg-7 apad">
                            <div class="contact row mb-4">
                                <div class="team-image">
                                    <img src="{{url('/clients/img/home.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- Start Contact Form -->
                        <div class="col-lg-5 apad">
                            <div class="split-content">
                                <p class="small-text">{{ __('client.contact.help_text') }}</p>

                                <h3>{{ __('client.contact.company_name') }}</h3>

                                <p>{{ __('client.contact.address') }}<br>
                                (+84) 982 179 361<br>
                                <a href="mailto:{{ __('client.contact.email') }}">{{ __('client.contact.email') }}</a>
                                </p>
                            </div>
                        </div>
                        <!-- End Contact Form -->
                    </div>
                </section>
                <!-- End Contact -->
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
<script src='../assets/js/jquery.js'></script>
<!-- <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_System_Security.js') }}"></script>
<script>
      var JS_System_Security = new JS_System_Security();
          $(document).ready(function($) {
                 JS_System_Security.security();
      })
</script> -->
@endsection