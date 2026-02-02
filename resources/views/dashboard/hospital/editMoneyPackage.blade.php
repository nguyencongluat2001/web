<form id="frmMoneyPackage"  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['detail']['id'])?$data['detail']['id']:''}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title">Cấu hình giá khám các khoa</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <div class="modal-body" style="padding:15px">
                <!-- tên -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Tên bệnh viện</span>
                    <div class="col-md-8">
                        <input disabled class="form-control" type="text" value="{{!empty($data['detail']['name_hospital'])?$data['detail']['name_hospital']:''}}" name="name_hospital" id="name_hospital"
                            placeholder="Nhập tên bệnh viện..." />
                    </div>
                </div>
                 <!-- tên -->
                 <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Mã bệnh viện</span>
                    <div class="col-md-8">
                        <input disabled class="form-control" type="text" value="{{!empty($data['detail']['code'])?$data['detail']['code']:''}}" name="code" id="code"
                            placeholder="Nhập tên bệnh viện..." />
                    </div>
                </div>
                 <!-- địa chỉ -->
                 <div class="row form-group" id="div_hinhthucgiai">
                    <span  class="col-md-3 control-label required">Địa chỉ</span>
                    <div class="col-md-8">
                        <input disabled class="form-control" type="text" value="{{!empty($data['detail']['address'])?$data['detail']['address']:''}}" name="address" id="address"
                            placeholder="Nhập địa chỉ bệnh viện..." />
                    </div>
                </div>
                <!-- Chọn chuyên khoa  -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required" >Giá khám</span>
                    <div class="col-md-8">
                        @foreach($data['arrSpecialty_list'] as $item)
                        <span class="col-md-3 control-label required" >{{$item['name']}}</span>
                            <div class="col-md-8">
                                <input class="form-control" type="text" value="{{!empty($item['money'])?$item['money']:''}}" name="{{$item['code']}}" id="{{$item['code']}}"/>
                            </div> <br>
                        @endforeach
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
