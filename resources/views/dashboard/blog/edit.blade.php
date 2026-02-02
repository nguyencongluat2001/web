<div class="modal-dialog modal-xl">
    <div class="modal-content card">
        <div class="modal-header">
            <h5 class="modal-title">Cập nhật dự án</h5>
            <span type="button" class="btn btn-sm btn_close" data-bs-dismiss="modal" style="background: #f1f2f2;">
                X
            </span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <form id="frmAdd" role="form" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" id="id" value="{{!empty($data['id'])?$data['id']:''}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label required">Thể loại</label>
                                    <select class="form-control input-sm chzn-select" name="code_category" id="code_category">
                                        <option value=''>-- Chọn thể loại --</option>
                                        @foreach($data['category'] as $item)

                                        <option @if((isset($data['code']) && $data['code']==$item['code_category']) ||
                                            (isset($data['code_category']) && $data['code_category']==$item['code_category'])) selected @endif
                                            value="{{$item['code_category']}}">{{$item['name_category']}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label required">Tiêu đề</label>
                                    <input class="form-control" type="text" value="{{!empty($data['title'])?$data['title']:''}}" name="title" id="title" placeholder="Nhập tiêu đề..." />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nội dung</label>
                                    <textarea class="form-control" type="text" rows="10" cols="30" name="decision" id="decision" placeholder="Nhập nội dung...">{{!empty($data['decision'])?$data['decision']:''}}</textarea>
                                </div>
                            </div>
                            {{-- trạng thái --}}
                            <div class="col-md-6">
                                <div class="row form-group" id="div_hinhthucgiai">
                                    <label class="control-label">Trạng thái</label>
                                    <div>
                                        <input type="checkbox" name="status" id="status" {{(isset($data['status']) && $data['status'] == '1') ? 'checked' : ''}} />
                                        <label for="status">Hoạt động</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id='btn_create' class="btn btn-primary btn-sm" type="button">Cập nhật</button>
                                <button type="button" class="btn btn-default btn-sm btn_close" data-bs-dismiss="modal" style="background: #f1f2f2;">Đóng</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <label class="control-label required">Chọn danh sách ảnh</label>
                    <br>
                    <label for="fileInput" class="label-upload">Chọn ảnh</label>
                    <input type="file" hidden id="fileInput" multiple>
                    <div id="fileList" class="preview-grid">
                        @if(!empty($data['images']))
                            @foreach($data['images'] as $image)
                                <div class="preview-item old-image" data-id="{{$image['id']}}">
                                    <img src="{{ $image['url_image'] }}" alt="Image">
                                    <button type="button" class="btn-remove-old">&times;</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
