<form id="frmAdd"  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['detail']['id'])?$data['detail']['id']:''}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật chuyên khoa</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <div class="modal-body" style="padding:15px">
                <!-- tên -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Tên chuyên khoa</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['name_specialty'])?$data['detail']['name_specialty']:''}}" name="name_specialty" id="name_specialty"
                            placeholder="Nhập tên bệnh viện..." />
                    </div>
                </div>
                 <!-- tên -->
                 <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Mã chuyên khoa</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['code'])?$data['detail']['code']:''}}" name="code" id="code"
                            placeholder="Nhập mã chuyên khoa..." />
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="col-md-3 control-label required">Chọn ảnh đại diện</span><br>
                    <label for="upload_image" class="label-upload">Chọn ảnh</label>
                    <input type="file" hidden name="upload_image" id="upload_image" onchange="readURL(this)">
                    <br>
                    @if(!empty($data['image']))
                    <img id="show_img" src="{{url('/file-image-client/avatar-specialty/')}}/{{$data['image'][0]->name_image}}" alt="Image" style="width:150px">
                    @else
                    <img id="show_img" hidden alt="Image" style="width:150px">
                    @endif
                </div>
                
                {{-- mô tả --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Mô tả</span>
                    <div class="col-md-8">
                        <textarea name="decision" id="decision" cols="30" rows="10">{!! !empty($data['detail']['decision']) ? $data['detail']['decision'] : '' !!}</textarea>
                    </div>
                </div>
                <div class="preview"></div>
                 <!-- tên -->
                 <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Số thứ tự</span>
                    <div class="col-md-8">
                        <input class="form-control" type="number" value="{{!empty($data['detail']['order'])?$data['detail']['order']:''}}" name="order" id="order"
                            placeholder="Nhập số thứ tự..." />
                    </div>
                </div>
                {{-- trạng thái --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Trạng thái</span>
                    <div class="col-md-8">
                        @if(!empty($data['detail']['current_status']))
                        <input type="checkbox" value="1" name="is_checkbox_status" id="c" {{($data['detail']['current_status'] == '1') ? 'checked' : ''}}/>
                        <span for="is_checkbox_status">Hoạt động</span> <br>
                        @else
                        <input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/>
                        <span for="is_checkbox_status">Hoạt động</span> <br>
                        @endif
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
