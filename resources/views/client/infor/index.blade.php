@extends('client.layouts.index')
@section('body-client')
<link rel="stylesheet" href="../clients/css/style.css">
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\JS_InforClient.js') }}"></script>

<style>
    form{
        width: 100%; 
        padding-left: 0px;
    }
    /* .form-control{
        color:#fff079;
    } */
  button:before {
    background: none ;
   }

</style>
<section class="container" style="padding-top:90px">
    <div class=" pb-3 d-lg-flex gx-5 ">
        <div class="col-lg-12">
            <form action="" method="POST" id="frmLoadlist_infor">
                @csrf
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="role" id="role" value="{{ isset($datas->role) ? $datas->role : '' }}">
                <input type="hidden" name="id" id="id" value="{{ isset($datas->id) ? $datas->id : '' }}">
                <div class="home_index_vnindex pt-1 pb-3" style="background:#f3f3f3 !important;border-radius:0px !important">
                    <!-- phần giới thiệu FIn top -->
                    <div class="home_index_child" style="background:#f4f4f4 !important">
                        <div class="col-lg-12" style="padding:10px;">
                            <div class="row">
                                <div class="col-md-12" style="color: black;">
                                    <!-- <div class="card-header">
                                        <button class="btn btn-primary btn-sm ms-auto">Đổi mật khẩu</button>
                                    </div> -->
                                   {{-- @if(!empty($data) && $_SESSION["email"] == $data['email']) --}}
                                    <span id='btn_changePass'>
                                        <button class="btn rounded-pill px-4 btn-outline-warning" type="button">
                                            Đổi mật khẩu
                                        </button>
                                    </span>
                                    <button type="button" class="btn rounded-pill px-4 btn-outline-primary" onclick="JS_InforClient.updateCustomer()" type="button">
                                        Cập nhật
                                    </button>
                                    <!-- <a type="button" class="btn rounded-pill px-4 btn-outline-warning" style="color:black;" href="{{ url('client/upgradeAcc/index') }}"></i>Nâng cấp tài khoản</a> -->

                                    {{-- @endif --}}
                                    <div class="card-body">
                                        <p class="text-uppercase text-sm">Thông tin tài khoản</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Tên</p>
                                                    <input class="form-control" type="text" name="name" value="{{isset($datas->name) ? $datas->name : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Địa chỉ Email</p>
                                                    <input class="form-control" type="email" name="email" value="{{isset($datas->email) ? $datas->email : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pt-2">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Ngày sinh</p>
                                                    <input class="form-control" type="date" name="dateBirth" value="{{isset($datas->dateBirth) ? $datas->dateBirth : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pt-2">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Số điện thoại</p>
                                                    <input class="form-control" type="text" name="phone" value="{{isset($datas->phone) ? $datas->phone : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <hr class="horizontal dark pt-1"> -->
                                        <!-- <p class="text-uppercase text-sm">Thông tin liên lạc</p> -->
                                        <div class="row">
                                            <div class="col-md-12 pt-2">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Địa chỉ</p>
                                                    <input class="form-control" type="text" name="address" value="{{isset($datas->address) ? $datas->address : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Công ty</p>
                                                    <input class="form-control" type="text" name="company" value="{{isset($datas->user_infor->company) ? $datas->user_infor->company : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Chức vụ</p>
                                                    <input class="form-control" type="text" name="position" value="{{isset($datas->user_infor->position) ? $datas->user_infor->position : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Gia nhập ngày</p>
                                                    <input class="form-control" type="date" name="date_join" value="{{isset($datas->user_infor->date_join) ? $datas->user_infor->date_join : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <hr class="horizontal dark">
                                        <p class="text-uppercase text-sm">About me</p>
                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">About me</label>
                                            <input class="form-control" type="text" value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.">
                                            </div>
                                        </div>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="card card-profile">
                                        <div class=" justify-content-center" style="--bs-gutter-x: 1.5rem;
                                                                                    --bs-gutter-y: 0;
                                                                                    display: flex;
                                                                                    flex-wrap: wrap;
                                                                                    margin-top: calc(var(--bs-gutter-y) * -1);
                                                                                    margin-right: none !important;
                                                                                    margin-left: calc(var(--bs-gutter-x)/ -2);">
                                            <div class="col-4 col-lg-4 order-lg-2">
                                                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                                    <a href="javascript:;">
                                                        <img src="{{url('file-image/avatar')}}/{{$datas->avatar}}" style="height: 140px;width: 150px;object-fit: cover;border-radius:50%">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="text-center mt-4">
                                                <h5>
                                                    {{isset($datas->name) ? $datas->name : ''}}
                                                </h5>
                                                <div>
                                                    <i class="ni location_pin mr-2"></i>Ngày đăng ký: {{isset($datas->date_update_vip) ? $datas->date_update_vip : ''}}
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="../clients/js/jquery.min.js"></script>
<div class="modal fade" id="editmodal" role="dialog"></div>
<div class="modal " id="editPassmodal" role="dialog" style=" width: 100%;height: 100%;background: #0000007d; background-repeat:no-repeat;background-size: cover;"></div>

<div id="dialogconfirm"></div>
<script type="text/javascript">
    var baseUrl = '{{ url('') }}';
    var JS_InforClient = new JS_InforClient(baseUrl, 'client', 'infor');
    $(document).ready(function($) {
        JS_InforClient.loadIndex(baseUrl);
    })
</script>
@endsection