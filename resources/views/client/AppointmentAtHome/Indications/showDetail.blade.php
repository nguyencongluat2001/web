<style>
.form-control:disabled{
    background-color:#ffffff
}
</style>
<div class="modal-dialog modal-lg">
    <div class="modal-content card">
        <div class="modal-header">
            <h5 class="modal-title">Thông tin đặt lịch 
                @if($datas['type_at_home'] == 'XET_NGHIEM')
                xét nghiệm
                @else
                truyền dịch
                @endif</h5>
                <span>Mã đặt lịch: <span style="color:#ffa000;font-weight:600">{{!empty($datas['code']) ? $datas['code'] : ''}}</span></span>
                
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
                        <div class="form-wrapper col-md-4">
                            <label for="">Họ và tên bệnh nhân</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['name']) ? $datas['name'] : ''}}" autofocus>
                        </div>
                        <div class="form-wrapper col-md-4">
                            <label for="">Số điện thoại</label>
                            <input disabled type="phone" class="form-control" value="{{!empty($datas['phone']) ? $datas['phone'] : ''}}">
                        </div>
                        <div class="form-wrapper col-md-4">
                            <label for="">Giới tính</label> <br>
                            <input disabled type="text" class="form-control" value="{{$datas['sex'] == 1 ? 'Nam' : 'Nữ'}}">
                        </div>
                    </div>
                    
                    @if($datas['type_at_home'] == 'XET_NGHIEM')
                    <!-- <div class="row">
                        <div class="form-wrapper col-md-12">
                            <label for="">Loại</label> <br>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['type']) ? $datas['type'] : ''}} - {{!empty($datas['money']) ? $datas['money'] : '0'}} VND">
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="form-wrapper col-md-12">
                            <label for="">Mã bệnh nhân trên ống nghiệm</label> <br>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['code_patient']) ? $datas['code_patient'] : ''}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-wrapper col-md-4">
                            <label for="">Ngày sinh</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['date_birthday']) ? $datas['date_birthday'] : ''}}" autofocus>
                        </div>
                        <div class="form-wrapper col-md-4">
                            <label for="">Mã bác sĩ</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['code_doctor']) ? $datas['code_doctor'] : ''}}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-wrapper col-md-12">
                            <label for="">Chỉ số xét nghiệm</label> <br>
                        </div>
                    </div>
                    <table id="myTable" class="table  table-bordered table-striped table-condensed dataTable no-footer">
                        <thead>
                            <tr>
                                <td align="center"><b>Tên gói - chỉ số</b></td>
                                <td align="center"><b>Giá</b></td>
                            </tr>
                        </thead>
                        <tbody id="body_data">
                                @foreach ($price as $key => $values)
                                    <tr>
                                        <td style="white-space: inherit;vertical-align: middle;" >{{ isset($values['name']) ? $values['name'] : '' }} - ( {{ isset($values['code']) ? $values['code'] : '' }} )</td>
                                        <td style="white-space: inherit;vertical-align: middle;" align="center">{{ isset($values['price']) ? $values['price'] : '' }} VND</td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="row">
                        <div class="form-wrapper col-md-12">
                            <label for="">Hình thức</label> <br>
                            <input disabled type="text" class="form-control" value="Truyền dịch tại nhà">
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="form-wrapper col-md-6">
                            <label for="">Ngày lấy mẫu ( Tháng - Ngày - Năm)</label> <br>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['date_sampling']) ? $datas['date_sampling'] : ''}}">
                        </div>
                        <div class="form-wrapper col-md-6">
                            <label for="">Giờ lấy mẫu</label> <br>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['hour_sampling']) ? $datas['hour_sampling'] : ''}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-wrapper">
                            <label for="">Địa chỉ chi tiết</label>
                            <input disabled type="text" class="form-control" value="{{!empty($datas['address']) ? $datas['address'] : ''}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-wrapper">
                            <label for="">Triệu chứng lâm sàng</label>
                            <textarea disabled name="reason" id="reason" class="form-control"  rows="3" cols="30">{{!empty($datas['reason']) ? $datas['reason'] : ''}}</textarea>
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