<style>
.form-control:disabled{
    background-color:#ffffff
}
</style>
<div class="modal-dialog modal-lg">
    <div class="modal-content card">
        <div class="modal-header">
            <h5 class="modal-title">Thông tin đặt lịch khách hàng</h5>
            <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                X
            </button>
        </div>
        <div class="modal-body">
             <!-- <div class="wrapper" style="display: flex; justify-content: center;"> -->
                <form id="" method="POST"  autocomplete="off">
                    @csrf
                    <input type="hidden" id="code_hospital" name="code_hospital" value="{{ !empty($datas->code)?$datas->code:'' }}">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="form-wrapper col-md-6">
                            <label for="">Chuyên khoa khám</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['code_specialty']) ? $datas['code_specialty'] : ''}}">
                        </div>
                        <div class="form-wrapper col-md-6">
                            <label for="">Số tiền khám</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['money']) ? $datas['money'] : ''}} VND">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-wrapper col-md-6">
                            <label for="">Họ và tên bệnh nhân</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['name']) ? $datas['name'] : ''}}" autofocus>
                        </div>
                        <div class="form-wrapper col-md-6">
                            <label for="">Số điện thoại</label>
                            <input disabled type="phone" class="form-control" value="{{!empty($datas['phone']) ? $datas['phone'] : ''}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-wrapper col-md-6">
                            <label for="">Số bảo hiểm y tế</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['code_insurance']) ? $datas['code_insurance'] : ''}}">
                        </div>
                        <div class="form-wrapper col-md-6">
                            <label for="">Giới tính</label> <br>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['sex'] == 1) ? 'nam' : 'nữ'}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-wrapper col-md-6">
                            <label for="">Địa chỉ Email</label>
                            <input disabled type="email" class="form-control" value="{{!empty($datas['email']) ? $datas['email'] : ''}}">
                        </div>
                        <div class="form-wrapper col-md-6">
                            <label for="">Ngày sinh</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['date_of_brith']) ? $datas['date_of_brith'] : ''}}">
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="form-wrapper col-md-4">
                            <label for="">Tỉnh thành</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['code_tinh']) ? $datas['code_tinh'] : ''}}">
                        </div>
                        <div id="iss" class="form-wrapper col-md-4">
                            <label for="">Quận huyện</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['code_huyen']) ? $datas['code_huyen'] : ''}}">
                        </div>
                        <div id="iss_xa" class="form-wrapper col-md-4">
                            <label for="">Phường xã</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['code_xa']) ? $datas['code_xa'] : ''}}">
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="form-wrapper">
                            <label for="">Địa chỉ chi tiết</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['address']) ? $datas['address'] : ''}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-wrapper col-md-6">
                            <label for="">Mã cộng tác viên</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['code_introduce']) ? $datas['code_introduce'] : ''}}">
                        </div>
                        <div class="form-wrapper col-md-6">
                            <label for="">Tên cộng tác viên</label>
                            <input disabled type="text" class="form-control" name="date_of_brith" value="{{!empty($datas['name_insurance']) ? $datas['name_insurance'] : ''}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-wrapper">
                            <label for="">Lý do khám</label>
                            <textarea disabled name="reason" id="reason" class="form-control"  rows="3" cols="30">{{!empty($datas['reason']) ? $datas['reason'] : ''}}</textarea>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="form-wrapper col-md-6">
                            <label for="">Ảnh giao dịch thành công đến: 
                                <!-- @if($datas['type_payment'] == 'BANK') -->
                                <span style="color:#2831c7">Ngân hàng</span>
                                <!-- @else
                                <span style="color:#dc0088">MoMo</span>
                                @endif -->
                            </label>
                            @if(!empty($datas['name_image']))
                            <img class="form-control" id="show_img" src="{{url('/file-image-client/schedule/')}}/{{$datas['name_image']}}" alt="Image" style="width:200px">
                            @endif
                        </div>
                    </div>
                    <div class="pt-5 mb-3">
                        <button style="background:#ffd900" type="button" class="btn btn-sm" data-bs-dismiss="modal">
                            Đóng
                        </button>
                    </div>
                </form>
            <!-- </div> -->
        </div>
    </div>
</div>