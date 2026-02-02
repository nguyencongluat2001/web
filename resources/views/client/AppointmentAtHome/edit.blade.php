<style>
    form{
        width:100%;
    }
    .hiddel{
        display: none;
    }
    .show{
        display: block;
    }
</style>
<form id="frmAdd" role="form" action="" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($datas->id) ? $datas->id : ''}}">
    <div class="modal-dialog modal-lg">
    <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size:30px;font-family: math;">Thanh toán giữ chỗ cho mã đặt lịch 909822</h5>
                <!-- <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button> -->
            </div>
            <div class="modal-body">
                <label style="font-size:20px;font-family: math;" for="">Thông tin <span class="request_star">*</span></label> <br>
                {{-- Mã --}}
                <!-- <div class="row form-group pt-2" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Mã đặt lịch</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas->code_cate) ? $datas->code_cate : ''}}" name="code_cate" id="code_cate"/>
                    </div>
                </div> -->
                {{-- Mã --}}
                <div class="row form-group pt-2" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Số tiền thanh toán</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas['money']) ? $datas['money'] : ''}}" name="money" id="money"/>
                    </div>
                </div>
                {{-- Tên --}}
                <div class="row form-group pt-2" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Họ tên</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas['name']) ? $datas['name'] : ''}}" name="name" id="name"/>
                    </div>
                </div>
                {{-- điện thoại --}}
                <div class="row form-group pt-2" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Sô điện thoại</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas['phone']) ? $datas['phone'] : ''}}" name="phone" id="phone"/>
                    </div>
                </div>
                {{--  Mô tả --}}
                <div class="row form-group pt-4" id="div_hinhthucgiai">
                    <div class="col-md-12" >
                        <label style="font-size:20px;font-family: math;" for="">Chọn hình thức thanh toán <span class="request_star">*</span></label> <br>
                        
                       
                    </div>
                </div>
                <input type="radio" onchange="JS_Schedule.getTypeBank(this.value)" value="BANK" name="type_bank" id="type_bank"/>  <span style="padding-left:5px" >Chuyển khoản ngân hàng</span><br>
                <!-- <div id="bank"></div> -->
                <div id="bank" class="hiddel">
                    <div class="row" style="background: #ffc686;">
                        <div class="form-wrapper col-md-3 pt-3">
                            <img style="width:100%;" class="card-img " src="../clients/img/qrluatnc.jpg" alt="Card image">
                        </div>
                        <div class="form-wrapper col-md-9 pt-3">
                            <span>Số Tài khoản: 097871279812</span><br>
                            <span>Tên chủ Tài khoản: Công ty Cổ phần Công nghệ Booking</span><br>
                            <span>Ngân Hàng: Ngân hàng Thương mại cổ phần kỹ Thương Việt Nam (techcombank)</span><br>
                            <span>Chi nhánh: Hội sở chính</span><br>
                            <span>Nội dung thanh toán:Tên khách hàng - số điện thoại - mã đặt lịch</span><br>
                        </div>
                    </div>
                </div>
               
                 <input  type="radio" onchange="JS_Schedule.getTypeBank('momo')" value="MOMO" name="type_bank" id="type_bank"/> <span style="padding-left:5px" >Thanh toán ví điện tử MoMo</span>
                 <div id="momo" class="hiddel">
                    <div class="row" style="background:#e00085d9">
                        <div class="form-wrapper col-md-3 pt-3">
                            <img style="width:100%;" class="card-img " src="../clients/img/qrluatnc.jpg" alt="Card image">
                        </div>
                        <div class="form-wrapper col-md-9 pt-3">
                            <span>Số MoMo: 0987276762</span><br>
                            <span>Tên chủ Tài khoản: Công ty Cổ phần Công nghệ Booking</span><br>
                            <span>Nội dung thanh toán:Tên khách hàng - số điện thoại - mã đặt lịch</span><br>
                        </div>
                    </div>
                </div>
                {{--  Mô tả --}}
                <div class="row form-group pt-4" id="div_hinhthucgiai">
                    <div class="col-md-12" >
                        <label style="font-size:20px;font-family: math;" for="">Ảnh xác thực thanh toán thành công <span class="request_star">*</span></label> <br>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="upload_image" class="label-upload">Chọn ảnh</label>
                    <input type="file" hidden name="upload_image" id="upload_image" onchange="readURL(this)">
                    <br>
                    <img id="show_img" hidden alt="Image" style="width:150px">
                </div>
                <div class="modal-footer pt-2">
                    <span id="btupdate">
                        <button style="background:#ffa200" onclick="JS_Schedule.sendPayment()" id='btn_create' type="button">
                            Thanh Toán
                        </button>
                    </span>
                    <button style="background:#70be9e" type="button" data-bs-dismiss="modal">
                        Hủy
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#show_img').attr('src', e.target.result).width(150);
            };
            $("#show_img").removeAttr('hidden');

            reader.readAsDataURL(input.files[0]);
        }
    }
    // CKEDITOR.replace('decision', {
    //     filebrowserBrowseUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
    //     filebrowserUploadUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
    //     filebrowserImageBrowseUrl: 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
    // });
</script>

