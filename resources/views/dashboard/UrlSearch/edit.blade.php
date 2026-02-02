<form id="frmAdd"  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['detail']['id'])?$data['detail']['id']:''}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật url</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <div class="modal-body" style="padding:15px">
                <!-- tên -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Tên</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['name'])?$data['detail']['name']:''}}" name="name" id="name"
                            placeholder="Nhập tên..." />
                    </div>
                </div>
                 <!-- tên -->
                 <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Url</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['url'])?$data['detail']['url']:''}}" name="url" id="url"
                            placeholder="Nhập mã..." />
                    </div>
                </div>
                {{-- mô tả --}}
                <!-- <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Mô tả</span>
                    <div class="col-md-8">
                        <textarea name="decision" id="decision" cols="30" rows="10">{!! !empty($data['detail']['decision']) ? $data['detail']['decision'] : '' !!}</textarea>
                    </div>
                </div> -->
                <!-- <div class="preview"></div> -->
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
