@extends('client.layouts.index')
@section('body-client')
<br>
<br>
    <div class=" bg-light pt-5" >
        <div id="" class="banner-vertical-center-index">
            <div class="carousel-inner active" >
                <div class="banner-content col-lg-8 col-10 offset-1 m-lg-auto text-left ">
                    <div class="container-fluid pt-5"style="background: white;">
                        <div class="row"  >
                            <form action="" method="POST" id="frmIndications">
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                <section class="content-wrapper">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row form-group">
                                            {{-- @if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'MANAGE' || Auth::user()->role == 'STAFF') --}}
                                                <!-- <div class="col-md-3">
                                                    <button class="btn btn-success shadow-sm" id="btn_add" type="button"data-toggle="tooltip"
                                                        data-original-title="Thêm danh mục"><i class="fas fa-plus"></i></button>
                                                    {{-- <button class="btn btn-warning shadow-sm" id="btn_edit" type="button"data-toggle="tooltip"
                                                        data-original-title="SỬa danh mục"><i class="far fa-edit"></i></button> --}}
                                                    <button class="btn btn-danger shadow-sm" id="btn_delete" type="button"data-toggle="tooltip"
                                                        data-original-title="Xóa danh mục"><i class="fas fa-trash-alt"></i></button>
                                                </div> -->
                                                {{-- @endif --}}
                                                <div style="display:flex">
                                                    <div class="col-md-3" style="">
                                                        <input class="form-control input-sm" style="height:45px;font-size: 13px;" type="date"
                                                            id="fromDate" name="fromDate" value="<?php echo (new DateTime())->format('Y-m-d'); ?>" min="2010-01-01"
                                                            max="2030-12-31">
                                                    </div>
                                                    <div style="margin-top:12px ;font-size: 13px; color:#555555;paddingh-left:10px">
                                                    &nbsp;<i class="fas fa-long-arrow-alt-right"></i>&nbsp;
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input class="form-control input-sm" style="height:45px;font-size: 13px;" type="date"
                                                            id="toDate" name="toDate" value="<?php echo (new DateTime())->format('Y-m-d'); ?>" min="2010-01-01" max="2030-12-31">
                                                    </div>
                                                </div>
                                                @if(!empty($_SESSION['email']) && $_SESSION['email'] == 'lehoaison21@gmail.com')
                                                <br><br><br>
                                                <div style="display:flex">
                                                    <div class="col-md-6" style="width:210px">
                                                        <select onchange="JS_listIndications.loadList()" class="form-control input-sm chzn-select" name="type" id="type">
                                                            <option value='CA_NHAN'> Cá nhân </option>
                                                            <option value='BAC_SI'>Có mã bác sĩ </option>
                                                            <option value='TAT_CA'> Tất cả </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                @else
                                                <br><br><br>
                                                <div style="display:flex">
                                                    <div class="col-md-6" style="width:210px">
                                                        <select onchange="JS_listIndications.loadList()" class="form-control input-sm chzn-select" name="type" id="type">
                                                            <option value='CA_NHAN'> Cá nhân </option>
                                                            <option value='BAC_SI'>Có mã bác sĩ </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                @endif
                                                <br><br><br>
                                                <div style="display:flex">
                                                    <div class="col-md-3">
                                                        <input id="search" name="search" type="text" class="form-control">
                                                    </div>&nbsp;
                                                    <div class="col-md-3">
                                                        <button style="width:45px;height:38px" id="txt_search" name="txt_search" type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Màn hình danh sách -->
                                            <div class="row" id="table-container" style="padding-top:10px"></div>
                                        </div>
                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editmodal" role="dialog"></div>
    <div class="modal " id="addmodal" role="dialog"></div>
    <div class="modal " id="addfile" role="dialog"></div>
    <script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_listIndications.js') }}"></script>
    <div id="dialogconfirm"></div>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = '{{ url('') }}';
        var JS_listIndications = new JS_listIndications(baseUrl, 'client', 'appointmentathome');
        jQuery(document).ready(function($) {
            JS_listIndications.loadIndex(baseUrl);
        })
    </script>
    <script  type="text/javascript">
    $(document).ready(function() {
        var placeholderText = ['Tìm kiếm theo mã','Tìm kiếm mã ống nghiệm','Tìm tên - sđt khách hàng'];
        $('#search').placeholderTypewriter({text: placeholderText});  
    })
</script>
@endsection

