<form id="frmAdd"  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['detail']['id'])?$data['detail']['id']:''}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật quyền</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <div class="modal-body" style="padding:15px">
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Loại quyền</span>
                    <div class="col-md-8">
                        <select class="form-control input-sm chzn-select" name="category_permision"
                            id="category_permision">
                            <option value=''>-- Chọn mục quyền --</option>
                            @if(!empty($data['detail']['category_permision']))
                                @foreach($data['category'] as $item)
                                    <option 
                                    {{!empty($data['detail']['category_permision'] == $item['code_category']) ? 'selected' :''}}
                                    value="{{$item['code_category']}}">{{$item['name_category']}}</option>
                                @endforeach
                            @else 
                                @foreach($data['category'] as $item)
                                    <option value="{{$item['code_category']}}">{{$item['name_category']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <!-- tên -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Tên quyền</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['name_permision'])?$data['detail']['name_permision']:''}}" name="name_permision" id="name_permision"
                            placeholder="Nhập tên quyền..." />
                    </div>
                </div>
                
                <div class="preview"></div>
                {{-- trạng thái --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Editor Tổng</span>
                    <div class="col-md-8">
                        @if(!empty($data['detail']['current_status']))
                        <input type="checkbox" value="1" name="CV_ADMIN" id="CV_ADMIN" {{($data['detail']['current_status'] == '1') ? 'checked' : ''}}/>
                        <span for="is_checkbox_status">Cấp quyền</span> <br>
                        @else
                        <input type="checkbox" value="1" name="CV_ADMIN" id="CV_ADMIN"/>
                        <span for="is_checkbox_status">Cấp quyền</span> <br>
                        @endif
                    </div>
                </div>
                 <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Editor Pro	</span>
                    <div class="col-md-8">
                        @if(!empty($data['detail']['current_status']))
                        <input type="checkbox" value="1" name="CV_PRO" id="CV_PRO" {{($data['detail']['current_status'] == '1') ? 'checked' : ''}}/>
                        <span for="is_checkbox_status">Cấp quyền</span> <br>
                        @else
                        <input type="checkbox" value="1" name="CV_PRO" id="CV_PRO"/>
                        <span for="is_checkbox_status">Cấp quyền</span> <br>
                        @endif
                    </div>
                </div> <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Editor Pro	</span>
                    <div class="col-md-8">
                        @if(!empty($data['detail']['current_status']))
                        <input type="checkbox" value="1" name="CV_BASIC" id="CV_BASIC" {{($data['detail']['current_status'] == '1') ? 'checked' : ''}}/>
                        <span for="is_checkbox_status">Cấp quyền</span> <br>
                        @else
                        <input type="checkbox" value="1" name="CV_BASIC" id="CV_BASIC"/>
                        <span for="is_checkbox_status">Cấp quyền</span> <br>
                        @endif
                    </div>
                </div>
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Sales Admin</span>
                    <div class="col-md-8">
                        @if(!empty($data['detail']['current_status']))
                        <input type="checkbox" value="1" name="SALE_ADMIN" id="SALE_ADMIN" {{($data['detail']['current_status'] == '1') ? 'checked' : ''}}/>
                        <span for="is_checkbox_status">Cấp quyền</span> <br>
                        @else
                        <input type="checkbox" value="1" name="SALE_ADMIN" id="SALE_ADMIN"/>
                        <span for="is_checkbox_status">Cấp quyền</span> <br>
                        @endif
                    </div>
                </div>
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Sales</span>
                    <div class="col-md-8">
                        @if(!empty($data['detail']['current_status']))
                        <input type="checkbox" value="1" name="SALE_BASIC" id="SALE_BASIC" {{($data['detail']['current_status'] == '1') ? 'checked' : ''}}/>
                        <span for="is_checkbox_status">Cấp quyền</span> <br>
                        @else
                        <input type="checkbox" value="1" name="SALE_BASIC" id="SALE_BASIC"/>
                        <span for="is_checkbox_status">Cấp quyền</span> <br>
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
