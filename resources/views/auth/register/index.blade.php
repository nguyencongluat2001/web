@extends('client.layouts.index')

@section('body-client')
<link rel="stylesheet" href="../clients/css/style.css">

<style>
    .hidden {
        display: none;
    }

    .show {
        display: block;
    }

    .swal2-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 20px;
        color: #690000;
    }
    .form-wrapper ,.checkbox{
        color:#ffffff;
    }
    .form-control{
        color:#ffffff;
    }
</style>
<div class=" mt-2 mb-2 "style="padding-top:4%; background-image: url('/clients/img/thdog-photo.jpg');background-size: cover;">
    <div class="row justify-content-center" >
        <div class="col-md-10 mt-3">
            <div class="">
                <form id="frmRegister">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                    <div id="tab1-register">@include('auth.register.tab1')</div>
                    <div id="tab2-register"></div>
                    <div id="tab3-register"></div>
                    <div id="tab4-register"></div>
                </form>
            </div>
            <div class="col-md-12">
            @include('auth.register.step')
        </div>
        </div>
        
    </div>
</div>
<link rel="stylesheet" href="../assets/css/sweetalert2.min.css" />
<div class="modal" id="model_otp" style="" role="dialog"></div>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_Register.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = '{{ url('') }}';
    var JS_Register = new JS_Register(baseUrl, 'register', 'send-otp');
    $(document).ready(function($) {
        JS_Register.loadIndex(baseUrl);
    })
</script>
@endsection