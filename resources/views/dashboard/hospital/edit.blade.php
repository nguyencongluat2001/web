<form id="frmAdd"  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['id'])?$data['id']:''}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title">Thêm About, Contact</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <div class="modal-body" style="padding:15px">
                <!-- tên -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Loại</span>
                    <div class="col-md-8">
                        <select class="form-control input-sm chzn-select" name="code"
                            id="code">
                            <option value=''>-- Chọn loại --</option>
                            <option @if(isset($data['code']) && $data['code'] == 'ABOUNT') selected @endif 
                             value='ABOUNT'>About
                            </option>
                            <option @if(isset($data['code']) && $data['code'] == 'CONTACT') selected @endif 
                             value='CONTACT'>Contact</option>
                        </select>
                    </div>
                </div>
                {{-- mô tả --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nội dung VN</label>
                        <textarea class="form-control" type="text" rows="10" cols="30" name="decision" id="decision" placeholder="Nhập nội dung...">{{!empty($data['decision'])?$data['decision']:''}}</textarea>
                    </div>
                </div>
                 <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nội dung EN</label>
                        <textarea class="form-control" type="text" rows="10" cols="30" name="decision_en" id="decision_en" placeholder="Nhập nội dung...">{{!empty($data['decision_en'])?$data['decision_en']:''}}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="col-md-3 control-label required">Chọn ảnh đại diện</span><br>
                    <label for="upload_image" class="label-upload">Chọn ảnh</label>
                    <input type="file" hidden name="upload_image" id="upload_image" onchange="readURL(this)">
                    <br>
                    @if(!empty($data['avatar']))
                    <img id="show_img" src="{{url('/file-image-client/avatar-abount/')}}/{{$data['avatar']}}" alt="Image" style="width:150px">
                    @else
                    <img id="show_img" hidden alt="Image" style="width:150px">
                    @endif
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
    CKEDITOR.replace('decision_en', {
        filebrowserBrowseUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl: 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
    });
</script>
