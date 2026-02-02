<form id="frmAdd"  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['detail']['id'])?$data['detail']['id']:''}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật bệnh viện, phòng khám</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <div class="modal-body" style="padding:15px">
                <!-- tên -->
                <div class="row form-group">
                    <span class="col-md-3 control-label required">Tên bác sĩ</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['name'])?$data['detail']['name']:''}}" name="name" id="name"
                            placeholder="Nhập tên..." />
                    </div>
                </div>
                 <!-- tên -->
                 <div class="row form-group">
                    <span class="col-md-3 control-label required">Mã bác sĩ</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['code'])?$data['detail']['code']:''}}" name="code" id="code"
                            placeholder="Nhập mã..." />
                    </div>
                </div>
                 <!-- Chuyên khoa -->
                 <div class="row form-group">
                    <span class="col-md-3 control-label required">Chuyên khoa</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['specialtys'])?$data['detail']['specialtys']:''}}" name="specialtys" id="specialtys"
                            placeholder="Nhập chuyên khoa..." />
                    </div>
                </div>
                <!-- Thời gian khám -->
                <div class="row form-group">
                    <span class="col-md-3 control-label required">Thời gian khám</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['time'])?$data['detail']['time']:''}}" name="time" id="time"
                            placeholder="Nhập Thời gian khám..." />
                    </div>
                </div>
                  <!-- Phí khám -->
                  <div class="row form-group">
                    <span class="col-md-3 control-label required">Phí khám</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['money'])?$data['detail']['money']:''}}" name="money" id="money"
                            placeholder="Nhập phí khám..." />
                    </div>
                </div>
                   <!-- profile -->
                   <div class="row form-group">
                    <span class="col-md-3 control-label required">Profile</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['profile'])?$data['detail']['profile']:''}}" name="profile" id="profile"
                            placeholder="Nhập profile..." />
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="col-md-3 control-label required">Chọn ảnh đại diện</span><br>
                    <label for="upload_image" class="label-upload">Chọn ảnh</label>
                    <input type="file" hidden name="upload_image" id="upload_image" onchange="readURL(this)">
                    <br>
                    @if(!empty($data['image']))
                    <img id="show_img" src="{{url('/file-image-client/blogs/')}}/{{$data['image'][0]->name_image}}" alt="Image" style="width:150px">
                    @else
                    <img id="show_img" hidden alt="Image" style="width:150px">
                    @endif
                </div>
                <div>
                   <!-- order -->
                   <div class="row form-group">
                    <span class="col-md-3 control-label required">Thứ tự</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['order'])?$data['detail']['order']:''}}" name="order" id="order"
                            placeholder="Nhập Thứ tự..." />
                    </div>
                </div>
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
