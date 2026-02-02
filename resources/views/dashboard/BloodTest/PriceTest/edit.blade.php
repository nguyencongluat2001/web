<form id="frmAdd"  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($detail['id'])?$detail['id']:''}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật giá chỉ số</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <div class="modal-body" style="padding:15px">
                <!-- tên -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-4 control-label required">Mã Gói xét nghiệm</span>
                    <div class="col-md-8">
                        <select class="form-control input-sm chzn-select" name="code_blood"
                            id="code_blood">
                            <option value=''>-- Chọn mã Gói --</option>
                            @if(!empty($arr_list))
                                @foreach($arr_list as $item)
                                    <option @if((isset($arr_list) && isset($detail['code_blood'])) && $item['code'] == $detail['code_blood'])) selected @endif
                                    value="{{$item['code']}}">{{$item['name']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-4 control-label required">Tên xét nghiệm chỉ số</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($detail['name'])?$detail['name']:''}}" name="name" id="name"/>
                    </div>
                </div>
                 <!-- tên -->
                 <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-4 control-label required">Mã xét nghiệm chỉ số</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($detail['code'])?$detail['code']:''}}" name="code" id="code"/>
                    </div>
                </div>
                 <!-- khuyến mại -->
                 <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-4 control-label required">Giá chỉ số</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($detail['price'])?$detail['price']:''}}" name="price" id="price"/>
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
