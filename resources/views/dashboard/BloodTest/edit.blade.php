<form id="frmAdd"  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['detail']['id'])?$data['detail']['id']:''}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật gói xét nghiệm</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <div class="modal-body" style="padding:15px">
                <!-- tên -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Tên xét nghiệm</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['name'])?$data['detail']['name']:''}}" name="name" id="name"
                            placeholder="Nhập tên xét nghiệm..." />
                    </div>
                </div>
                 <!-- tên -->
                 <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Mã xét nghiệm</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['code'])?$data['detail']['code']:''}}" name="code" id="code"
                            placeholder="Nhập tên xét nghiệm..." />
                    </div>
                </div>
                <!-- hình thức -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Hình thức</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['form'])?$data['detail']['form']:''}}" name="form" id="form"
                            placeholder="Nhập hình thức xét nghiệm..." />
                    </div>
                </div>
                <!-- Giới tính -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Giới tính</span>
                    <div class="col-md-8">
                        <input type="radio" value="1" name="sex" id="sex" {{!empty($data['detail']['sex']) && $data['detail']['sex'] == 1 ? 'checked' : ''}}/>  <span style="padding-left:5px" >Nam</span>&emsp;
                        <input  type="radio" value="2" name="sex" id="sex"  {{!empty($data['detail']['sex']) && $data['detail']['sex'] == 2 ? 'checked' : ''}}/> <span style="padding-left:5px" >Nữ</span>
                    </div>
                </div>
                 <!-- tuổi -->
                 <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">tuổi</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['age'])?$data['detail']['age']:''}}" name="age" id="age"
                            placeholder="Nhập tuổi..." />
                    </div>
                </div>
                <!-- ngày cập nhật -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Ngày cập nhật</span>
                    <div class="col-md-8">
                        <input class="form-control" type="date" value="{{!empty($data['detail']['date_created'])?$data['detail']['date_created']:''}}" name="date_created" id="date_created"/>
                    </div>
                </div>
                <!-- ngày kết thuc -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Ngày kết thúc</span>
                    <div class="col-md-8">
                        <input class="form-control" type="date" value="{{!empty($data['detail']['date_end'])?$data['detail']['date_end']:''}}" name="date_end" id="date_end"/>
                    </div>
                </div>
                 <!-- khuyến mại -->
                 <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">% khuyến mại</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['promotion'])?$data['detail']['promotion']:''}}" name="promotion" id="promotion"
                            placeholder="Nhập tuổi..." />
                    </div>
                </div>
                 <!-- địa chỉ -->
                 <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Địa chỉ</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['address'])?$data['detail']['address']:''}}" name="address" id="address"
                            placeholder="Nhập địa chỉ xét nghiệm..." />
                    </div>
                </div>
                {{-- mô tả --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Mô tả</span>
                    <div class="col-md-8">
                        <textarea name="decision" id="decision" cols="30" rows="10">{!! !empty($data['detail']['decision']) ? $data['detail']['decision'] : '' !!}</textarea>
                    </div>
                </div>
                <div class="preview"></div>
                <div class="modal-footer">
                    <span id="btupdate">
                        <button id='btn_create' class="btn btn-primary btn-sm" type="button">
                            Cập nhật
                        </button>
                    </span>
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">
                        Đóng
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
    CKEDITOR.replace('decision', {
        filebrowserBrowseUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl: 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
    });
</script>
