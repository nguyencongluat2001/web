@extends('client.layouts.index')
@section('body-client')
<link rel="stylesheet" href="../clients/css/style.css">
    <!-- Start Banner Hero -->
    <form action="" method="GET" id="frmHospital">
    <input style="display:none" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <div class="banner-wrapper" >
            <!-- <div class="banner-vertical-center-index" style="background:#163048d4"> -->
                 <!-- Start Contact -->
                <section class="container py-5" style="background: #ffffffc4;">
                    <div class="row pb-4">
                        <div class="col-lg-8">
                            <div class="contact row mb-4">
                                <div class="team-image">
                                    <img src="{{url('/clients/img/home.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- Start Contact Form -->
                        <div class="col-lg-4 ">
                            <div class="split-content">
                                <p class="small-text">Please let us know how we can help via:</p>

                                <h3>KITE Architecture</h3>

                                <p>
                                64 Ngo Quyen, Ha Dong District, Hanoi, Vietnam<br>
                                (+84) 982 179 361<br>
                                <a href="mailto:hoangducanh84@gmail.com">hoangducanh84@gmail.com</a>
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